<?php

namespace App\Entities;

use Carbon\Carbon;

class Employee
{
    public int $employeeId;
    public int $projectId;
    public Carbon $dateFrom;
    public Carbon $dateTo;

    public float $deferenceInDays;

    public function __construct(string $employeeId, string $projectId, string $dateFrom, string $dateTo)
    {
        $this->employeeId = (int) $employeeId;
        $this->projectId = (int) $projectId;
        $this->dateFrom =  Carbon::parse(trim($dateFrom));

        if (trim($dateTo) == null || trim($dateTo) == "NULL" || empty(trim($dateTo))) {
            $this->dateTo = Carbon::today();
        } else {
            $this->dateTo = Carbon::parse(trim($dateTo));
        }

        $this->deferenceInDays = $this->dateFrom->diffInDays($this->dateTo);
    }
}

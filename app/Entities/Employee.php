<?php

namespace App\Entities;

use Carbon\Carbon;

class Employee
{
    public int $EmpID;
    public int $ProjectID;
    public Carbon $DateFrom;
    public Carbon $DateTo;

    public float $DeferenceInDays;

    public function __construct(string $EmpID, string $ProjectID, string $DateFrom, string $DateTo)
    {
        $this->EmpID = (int) $EmpID;
        $this->ProjectID = (int) $ProjectID;
        $this->DateFrom =  Carbon::parse(trim($DateFrom));

        if (trim($DateTo) == null || trim($DateTo) == "NULL" || empty(trim($DateTo))) {
            $this->DateTo = Carbon::today();
        } else {
            $this->DateTo = Carbon::parse(trim($DateTo));
        }

        $this->DeferenceInDays = $this->DateFrom->diffInDays($this->DateTo);
    }
}

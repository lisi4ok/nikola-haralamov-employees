<?php

namespace App\Http\Controllers;

use App\Entities\Employee;
use App\Http\Requests\CsvUploadRequest;
use League\Csv\Reader;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function upload(CsvUploadRequest $request)
    {
        $file = $request->file('csvFile');
        $header = ['employeeId', 'projectId', 'dateFrom', 'dateTo'];
        $reader = Reader::createFromPath($file->getRealPath())->mapHeader($header);
        $data = [];
        foreach ($reader as $item) {
            $data[] = new Employee(...$item);
        }

        $data = collect($data)->groupBy('projectId');

        return response()->json([
            'html' => view('upload', ['data' => $data])->render(),
        ]);
    }
}

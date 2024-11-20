<?php


namespace App\Http\Controllers;

use App\Entities\Employee;
use App\Http\Requests\CsvUploadRequest;
use Illuminate\Http\Request;
use League\Csv\Reader;


class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function upload(Request $request)
    {
        $file = $request->file('csvFile');
        $header = ['EmpID', 'ProjectID', 'DateFrom', 'DateTo'];
        $reader = Reader::createFromPath($file->getRealPath())->mapHeader($header);
        $data = [];
        foreach ($reader as $item) {
            $data[] = new Employee(...$item);
        }

        $data = collect($data)->groupBy('ProjectID');

        return response()->json([
            'html' => view('upload', ['data' => $data])->render(),
        ]);
    }
}

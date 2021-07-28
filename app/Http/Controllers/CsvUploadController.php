<?php

namespace App\Http\Controllers;

use App\Jobs\CsvProcess;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CsvUploadController extends Controller
{
    public function upload()
    {
        return view('csv-upload');
    }

    public function store(Request $request)
    {
        $data = array_map('str_getcsv', file($request->file('csv')->getRealPath()));
        unset($data[0]);
        CsvProcess::dispatch($data);

        return redirect()->back()->with('success', 'CSV file uploaded successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Jobs\CsvProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class CsvUploadController extends Controller
{
    public function upload()
    {
        $batch = null;
        if(request('batch')) {
            $batch = Bus::findBatch(request('batch'));
        }

        return view('csv-upload', compact('batch'));
    }

    public function store(Request $request)
    {
        $data = array_map('str_getcsv', file($request->file('csv')->getRealPath()));
        unset($data[0]);
        $chunked = array_chunk($data, 100);

        $jobs = [];
        foreach ($chunked as $chunk) {
            $jobs[] = new CsvProcess($chunk);
        }
        $batch = Bus::batch($jobs)->dispatch();

        return redirect('/csv-upload?batch='. $batch->id);
    }
}

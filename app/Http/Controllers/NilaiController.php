<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Nilai;

class NilaiController extends Controller
{
    public function importexcel(Request $request)
    {
        Excel::import(new \App\Imports\NilaiImport,$request->file('data_nilai'));
        return redirect()->back()->with('sukses','Data berhasil di import');
    }
}


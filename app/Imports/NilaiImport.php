<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Nilai;
use App\Siswa;
use App\Kelas;

class NilaiImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
    	//dd($collection);
        foreach ($collection as $key => $row) {
        	if($key >= 3){

        		Nilai::create([
	                'siswa_id' => $row[1],
                    'kelas_id' => $row[2],
                    'jenis_kelamin' => $row[3],
	        		'tahun_ajaran' => $row[4],
	        		'nilai_fisika' => $row[5],
                    'nilai_pkn' => $row[6],
	        		'nilai_bjepang' => $row[7],
                    'nilai_binggris' => $row[8],
	        		'nilai_mtk' => $row[9],
                    'nilai_bindo' => $row[10],
	        		'nilai_kejuruan' => $row[11],
        		]);
        	}
        }   

    }
}

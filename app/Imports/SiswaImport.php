<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Siswa;

class SiswaImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
    	//dd($collection);
        foreach ($collection as $key => $row) {
        	if($key >= 2){
        		$tanggal_lahir = ($row[6] - 25569) * 86400;
        		Siswa::create([
	        		'nis' => $row[1],
                    'nisn' => $row[2],
                    'nama_depan' => $row[3],
	        		'nama_belakang' => ' ',
	        		'jenis_kelamin' => $row[4],
                    'tempat_lahir' => $row[5],
	        		'agama' => $row[7],
                    'nama_orangtua' => $row[8],
	        		'alamat' => $row[9],
                    'kelurahan' => $row[10],
	        		'tanggal_lahir' => gmdate('Y-m-d',$tanggal_lahir),
        		]);
        	}
        }   
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table ='kelas';
    protected $fillable = ['nama_kelas'];

    public function siswa()
    {
    	return $this->hasOne(Siswa::class);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class);
    }

    public function tahunajaran()
    {
    	return $this->belongsTo(Tahunajaran::class);
    }

}

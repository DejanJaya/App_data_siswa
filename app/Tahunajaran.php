<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahunajaran extends Model
{
    protected $table ='tahun_ajaran';
    protected $fillable = ['tahun_ajaran'];

    public function kelas()
    {
    	return $this->hasOne(Kelas::class);
    }

     public function mapel()
    {
    	return $this->hasOne(Mapel::class);
    }
}

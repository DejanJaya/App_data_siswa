<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table ='nilai';
    protected $fillable = ['siswa_id','kelas_id','tahun_ajaran','nilai_fisika','nilai_pkn','nilai_bjepang','nilai_binggris','nilai_mtk','nilai_bindo','nilai_kejuruan'];


    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

}

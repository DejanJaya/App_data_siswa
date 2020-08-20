<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Siswa extends Model
{
    protected $table ='siswa';
    protected $fillable = ['nis','nisn','nama_depan','nama_belakang','jenis_kelamin','tempat_lahir','tanggal_lahir','agama','nama_orangtua','alamat','kelurahan','avatar','user_id','kelas_id'];

    public function getAvatar()
    {
    	if(!$this->avatar){
    		return asset('images/default.jpg');
    	}

    	return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
    	//return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
        return $this->belongsToMany(Mapel::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    //function ratarata
    public function rataRataNilai()
    {
        if($this->mapel->isNotEmpty()){
        $total = 0;
        $hitung = 0;
        foreach ($this->mapel as $mapel) {
            $total += $mapel->pivot->nilai;
            $hitung++;
        }
            return ($total/$hitung);
        }
            return 0;
        
        
    }

    public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['avatar' => 'default.jpg']);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Siswa;
use App\User;
use App\Mapel;
use App\Kelas;
use App\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_siswa = Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->paginate(10);
        }else{
            $data_siswa = Siswa::all();
        }
    	
    	return view('siswa.index',['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {   
        $this->validate($request,[
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpeg,png'
        ]);

        //insert table users
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('12345');
        $user->remember_token = Str::random(60);
        $user->save();

         //insert table siswa
        $request->request->add(['user_id' => $user->id ]);
        $siswa = Siswa::create($request->all());

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save(); 
        }
    	return redirect('/siswa')->with('sukses','Data berhasil diinput');
    }

    public function edit(Siswa $siswa)
    {
    	

    	return view('siswa/edit',['siswa' => $siswa]);
    }

    public function update(Request $request,Siswa $siswa)
    {
        
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save(); 
        }
        return redirect('/siswa')->with('sukses','Data berhasil diupdate');
    }

    public function delete(Siswa $siswa)
    {
        
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses','Data berhasil dihapus');
    }

    public function profile(Siswa $siswa)
    {
        
        $matapelajaran = Mapel::all();

        //Menyiapkan data untuk chart
        $categories = [];
        $data = [];

        foreach ($matapelajaran as $mp) {
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
            $categories[] = $mp->nama;
            $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
            }
        }
        

        return view('siswa.profile',['siswa' => $siswa,'matapelajaran' => $matapelajaran,'categories' => $categories,'data' => $data]);
    }

    public function analisisData()
    {
        $siswa = Siswa::selectRaw("count(*) as total, kelurahan")->groupBy('kelurahan')->get();
        $categori = [];
        $data = [];


        foreach ($siswa as $value) { 
        $categori[] = $value->kelurahan;
        $data[] = $value->total/202;
        }


        return view('analisis.index',['siswa' => $siswa,'categori' => $categori,'data' => $data]);
    }

    public function analisisNilai()
    {

        $nilai1 = Nilai::selectRaw('AVG(nilai_fisika) average')
                ->where('tahun_ajaran','=','2015/2016')
                ->groupBy('kelas_id')->get();
        $nilai2 = Nilai::selectRaw('AVG(nilai_pkn) average')
                ->where('tahun_ajaran','=','2015/2016')
                ->groupBy('kelas_id')->get();
        $nilai3 = Nilai::selectRaw('AVG(nilai_bjepang) average')
                ->where('tahun_ajaran','=','2015/2016')
                ->groupBy('kelas_id')->get();
        $nilai4 = Nilai::selectRaw('AVG(nilai_binggris) average')
                ->where('tahun_ajaran','=','2015/2016')
                ->groupBy('kelas_id')->get();
        $nilai5 = Nilai::selectRaw('AVG(nilai_mtk) average')
                ->where('tahun_ajaran','=','2015/2016')
                ->groupBy('kelas_id')->get();
        $nilai6 = Nilai::selectRaw('AVG(nilai_bindo) average')
                ->where('tahun_ajaran','=','2015/2016')
                ->groupBy('kelas_id')->get();
        $nilai7 = Nilai::selectRaw('AVG(nilai_kejuruan) average')
                ->where('tahun_ajaran','=','2015/2016')
                ->groupBy('kelas_id')->get();
        //dd($nilai7);
       // $categori = [];
        $data = [];



        return view('analisis_nilai.analisis20152016',['nilai1' => $nilai1,'data' => $data]);
    }

    public function analisisNilai1617()
    {

        $siswa = Nilai::selectRaw("nilai_fisika")->get();
        $categori = [];
        $data = [];


        foreach ($siswa as $value) { 
        $categori[] = $value->nilai_fisika;
        //$data[] = $value->total;
        }

        return view('analisis_nilai.analisis20162017',['siswa' => $siswa,'categori' => $categori,'data' => $data]);
    }

    public function analisisNilai1718()
    {

        $siswa = Nilai::selectRaw("nilai_fisika")->get();
        $categori = [];
        $data = [];


        foreach ($siswa as $value) { 
        $categori[] = $value->nilai_fisika;
        //$data[] = $value->total;
        }

        return view('analisis_nilai.analisis20172018',['siswa' => $siswa,'categori' => $categori,'data' => $data]);
    }

    public function analisisNilai1819()
    {

        $siswa = Nilai::selectRaw("nilai_fisika")->get();
        $categori = [];
        $data = [];


        foreach ($siswa as $value) { 
        $categori[] = $value->nilai_fisika;
        //$data[] = $value->total;
        }

        return view('analisis_nilai.analisis20182019',['siswa' => $siswa,'categori' => $categori,'data' => $data]);
    }

    public function addnilai(Request $request, $idsiswa)
    {
        $siswa = Siswa::find($idsiswa);
        // if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
        //     return redirect('siswa/profile/'.$idsiswa)->with('error','Data mata pelajaran sudah ada');
        // }

        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);
        //$siswa->mapel()->attach($request->mapel,['tahun_ajaran' => $request->tahun_ajaran]);

        return redirect('siswa/profile/'.$idsiswa)->with('sukses','Data nilai berhasil dimasukkan');
    }

    public function datanilai(Siswa $siswa)
    {
        
        $nilai= Nilai::all();
        
        
        return view('nilai.index',['siswa' => $siswa,'nilai' => $nilai]);
    }

    public function deletenilai(Siswa $siswa,$idmapel)
    {
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses','Data nilai berhasil dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

    public function exportPdf()
    {
        $siswa = Siswa::all();
        $pdf = PDF::loadView('export.siswapdf',['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }

    public function getdatasiswa()
    {
        $siswa = Siswa::select('siswa.*');

        return \DataTables::eloquent($siswa)
        ->addColumn('nama_lengkap',function($s){
            return $s->nama_depan.' '.$s->nama_belakang;
        })
        ->addColumn('rata2_nilai',function($s){
            return $s->rataRataNilai();
        })
        ->addColumn('aksi',function($s){
            return '<a href="/siswa/profile/'.$s->id.'" class="btn btn-warning btn-sm">profil</a><a href="/siswa/delete/'.$s->id.'"" class="btn btn-danger btn-sm" siswa-id="$s->id">Delete</a>';
        })
        ->rawColumns(['nama_lengkap','rata2_nilai','aksi'])
        ->toJson();
    }

    public function profilsaya()
    {
        $siswa = auth()->user()->siswa;
        return view('siswa.profilsaya',compact(['siswa']));
    }

    public function importexcel(Request $request)
    {
        Excel::import(new \App\Imports\SiswaImport,$request->file('data_siswa'));
        return redirect()->back()->with('sukses','Data berhasil di import');
    }

}

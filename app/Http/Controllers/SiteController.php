<?php

namespace App\Http\Controllers;

use App\Mail\NotifPendaftaranSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Siswa;
use App\Post;

class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::all();
    	return view('sites.home',compact(['posts']));
    }

    public function about()
    {
    	return view('sites.about');
    }

     public function register()
    {
    	return view('sites.register');
    }

    public function postregister(Request $request)
    {
        // input pendaftaran sebagai user dulu
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id ]);
        $siswa = Siswa::create($request->all());


            \Mail::to($user->email)->send(new NotifPendaftaranSiswa);

        return redirect('/')->with('sukses','Data pendaftaran berhasil dikirim');
    }

    public function singlepost($slug)
    {
        $post = Post::where('slug','=',$slug)->first();
        return view('sites.singlepost',compact(['post']));
    }

}

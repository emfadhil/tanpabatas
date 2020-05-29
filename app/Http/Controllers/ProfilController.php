<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Member;
use App\Posting;
use App\Kategori;
use Validator,File,Redirect,Response;
use Illuminate\Support\Facades\Hash;
class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_profil = DB::table('users')->get();
        return view('profil.index',compact('ar_profil') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Member::where('id', $id)->get();
        return view ('profil.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate(
            // mendefinisikan rule validasi data
            [
                'alamat' => 'required',
                'telp' => 'max:45|required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ],
            // menampilkan pesan error jika salah input
            [
                'alamat.required' => 'Email masih kosong',
                'telp.required' => 'Telepon masih kosong',
                'foto.image' => 'Hanya gamabr berformat jpg,jpeg atau png',
                'foto.max' => 'Maksimal upload kurang dari 2MB'
                
                ]
            );
            
            //ambil isi kolom foto untuk hapus fisik file fotonya atau sekedar ambil nama filenya
        $foto = DB::table('users')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
            $fileName = $f->foto;
        }
        
        if(!empty($request->foto)){//proses upload file
            
            $filefoto = $request->name.'.'.$request->foto->extension();  
            $request->foto->move(public_path('img/member/'), $filefoto);
        }
        else{ //tidak ada upload file
            $filefoto = $fileName;
        }
        DB::table('users')->where('id',$id)->update(
            [ 
                
                'alamat'=>$request->alamat,
                'telp'=>$request->telp,
                'foto'=>$filefoto,     
                ]);
                //landing page
                return redirect('/profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

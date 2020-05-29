<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Posting;
use App\Kategori;
use App\Member;
use Validator,File,Redirect,Response;
class PostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_posting = DB::table('posting')
        ->join('kategori', 'kategori.id', '=', 'posting.kategori_id')
        ->join('users', 'users.id', '=', 'posting.users_id')
        ->select('posting.*', 'kategori.nama as kat','users.name as us')
        ->get();
        return view('posting.index', compact('ar_posting'));
    }

    public function postingAktif()
    {
        $ar_posting = DB::table('posting')
        ->join('kategori', 'kategori.id', '=', 'posting.kategori_id')
        ->select('posting.*', 'kategori.nama as kat')
        ->get();
        return view('posting.beranda', compact('ar_posting'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //hanya u/ tampilkan form insert data
        return view ('posting.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate(
            // mendefinisikan rule validasi data
            [
                'namaTempat'=>'required|unique:posting|max:45',
                'ftempat'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'latitude'=>'required|unique:posting|max:45',
                'longitude'=>'required|unique:posting|max:45',
                'kategori_id'=>'required',
                'fparkir'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'kparkir'=>'max:120',
                'fgb'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'kgb'=>'max:120',
                'fpj'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'kpj'=>'max:120',
                'fbm'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'kbm'=>'max:120',
                'fpintu'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'kpintu'=>'max:120',
                'frt'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'krt'=>'max:120',
                'flift'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'klift'=>'max:120',
                'ftoilet'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'ktoilet'=>'max:120'
            ],
            // menampilkan pesan error jika salah input
            [
                'namaTempat.required'=>'Nama tempat masih kosong',
                'namaTempat.unique'=>'Nama tempat ini sudah ada',
                'namaTempat.max'=>'Maksimal 120 karakter',
                'ftempat.image'=>'Harus berformat jpg, jpeg, atau png',
                'ftempat.max'=>'Maksimal file berukuran 2048kb',
                'latitude.required'=>'Latitude belum terdeteksi',
                'latitude.unique'=>'Tag lokasi sudah ada',
                'longitude.required'=>'Longitude belum terdeteksi',
                'longitude.unique'=>'Tag lokasi sudah ada',
                'kategori_id.required'=>'Harap pilih kategori',                
                'fparkir.image'=>'Harus berformat jpg, jpeg, atau png',
                'fparkir.max'=>'Maksimal file berukuran 2048kb',
                'kparkir.max'=>'Maksimal 120 karakter',
                'fgb.image'=>'Harus berformat jpg, jpeg, atau png',
                'fgb.max'=>'Maksimal file berukuran 2048kb',
                'kgb.max'=>'Maksimal 120 karakter',
                'fpj.image'=>'Harus berformat jpg, jpeg, atau png',
                'fpj.max'=>'Maksimal file berukuran 2048kb',
                'kpj.max'=>'Maksimal 120 karakter',
                'fbm.image'=>'Harus berformat jpg, jpeg, atau png',
                'fbm.max'=>'Maksimal file berukuran 2048kb',
                'kbm.max'=>'Maksimal 120 karakter',
                'fpintu.image'=>'Harus berformat jpg, jpeg, atau png',
                'fpintu.max'=>'Maksimal file berukuran 2048kb',
                'kpintu.max'=>'Maksimal 120 karakter',
                'frt.image'=>'Harus berformat jpg, jpeg, atau png',
                'frt.max'=>'Maksimal file berukuran 2048kb',
                'krt.max'=>'Maksimal 120 karakter',
                'flift.image'=>'Harus berformat jpg, jpeg, atau png',
                'flift.max'=>'Maksimal file berukuran 2048kb',
                'klift.max'=>'Maksimal 120 karakter',
                'ftoilet.image'=>'Harus berformat jpg, jpeg, atau png',
                'ftoilet.max'=>'Maksimal file berukuran 2048kb',
                'ktoilet.max'=>'Maksimal 120 karakter'
            ]
            );

        if(!empty($request->ftempat)){//proses upload file
            
            $filetempat = $request->latitude.'.'.$request->ftempat->extension();  
            $request->ftempat->move(public_path('img/posting/'), $filetempat);
        }
        else{ //tidak ada upload file
            $filetempat = '';
        }
        if(!empty($request->fparkir)){//proses upload file
            
            $fileparkir = $request->latitude.'.'.$request->fparkir->extension();  
            $request->fparkir->move(public_path('img/posting/detail/parkiran/'), $fileparkir);
        }
        else{ //tidak ada upload file
            $fileparkir = '';
        }
        if(!empty($request->fgb)){//proses upload file
            
            $filegb = $request->latitude.'.'.$request->fgb->extension();  
            $request->fgb->move(public_path('img/posting/detail/gb/'), $filegb);
        }
        else{ //tidak ada upload file
            $filegb = '';
        }
        if(!empty($request->fpj)){//proses upload file
            
            $filepj = $request->latitude.'.'.$request->fpj->extension();  
            $request->fpj->move(public_path('img/posting/detail/pj/'), $filepj);
        }
        else{ //tidak ada upload file
            $filepj = '';
        }
        if(!empty($request->fbm)){//proses upload file
            
            $filebm = $request->latitude.'.'.$request->fbm->extension();  
            $request->fbm->move(public_path('img/posting/detail/bm/'), $filebm);
        }
        else{ //tidak ada upload file
            $filebm = '';
        }
        if(!empty($request->fpintu)){//proses upload file
            
            $filepintu = $request->latitude.'.'.$request->fpintu->extension();  
            $request->fpintu->move(public_path('img/posting/detail/pintu/'), $filepintu);
        }
        else{ //tidak ada upload file
            $filepintu = '';
        }
        if(!empty($request->frt)){//proses upload file
            
            $filert = $request->latitude.'.'.$request->frt->extension();  
            $request->frt->move(public_path('img/posting/detail/rt/'), $filert);
        }
        else{ //tidak ada upload file
            $filert = '';
        }
        if(!empty($request->flift)){//proses upload file
            
            $filelift = $request->latitude.'.'.$request->flift->extension();  
            $request->flift->move(public_path('img/posting/detail/lift/'), $filelift);
        }
        else{ //tidak ada upload file
            $filelift = '';
        }
        if(!empty($request->ftoilet)){//proses upload file
            
            $filetoilet = $request->latitude.'.'.$request->ftoilet->extension();  
            $request->ftoilet->move(public_path('img/posting/detail/toilet/'), $filetoilet);
        }
        else{ //tidak ada upload file
            $filetoilet = '';
        }
        
        DB::table('posting')->insert(
            [ 
                'namaTempat'=>$request->namaTempat,
                'ftempat'=>$filetempat,
                'latitude'=>$request->latitude,
                'longitude'=>$request->longitude,
                'tumbs'=> 0,
                'status'=>'moderasi',
                'kategori_id'=>$request->kategori_id,
                'users_id'=>$request->users_id,
                'fparkir'=>$fileparkir,
                'kparkir'=>$request->kparkir,
                'fgb'=>$filegb,
                'kgb'=>$request->kgb,
                'fpj'=>$filepj,
                'kpj'=>$request->kpj,
                'fbm'=>$filebm,
                'kbm'=>$request->kbm,
                'fpintu'=>$filepintu,
                'kpintu'=>$request->kpintu,
                'frt'=>$filert,
                'krt'=>$request->krt,
                'flift'=>$filelift,
                'klift'=>$request->klift,
                'ftoilet'=>$filetoilet,
                'ktoilet'=>$request->ktoilet,     
            ]);
            //landing page
            return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_posting = DB::table('posting')->where('id','=', $id)->get(); 
        return view('posting.show', compact('ar_posting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // ambil 1 baris data yg mau diedit
         $data = Posting::where('id', $id)->get();
         return view ('posting.form_edit', compact('data'));
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
                'namaTempat'=>'required|max:45',
                'ftempat'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'kategori_id'=>'required',
                'fparkir'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'kparkir'=>'max:120',
                'fgb'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'kgb'=>'max:120',
                'fpj'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'kpj'=>'max:120',
                'fbm'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'kbm'=>'max:120',
                'fpintu'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'kpintu'=>'max:120',
                'frt'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'krt'=>'max:120',
                'flift'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'klift'=>'max:120',
                'ftoilet'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'ktoilet'=>'max:120'
            ],
            // menampilkan pesan error jika salah input
            [
                'namaTempat.required'=>'Nama tempat masih kosong',
                'namaTempat.max'=>'Maksimal 120 karakter',
                'ftempat.image'=>'Harus berformat jpg, jpeg, atau png',
                'ftempat.max'=>'Maksimal file berukuran 2048kb',
                'kategori_id.required'=>'Harap pilih kategori',                
                'fparkir.image'=>'Harus berformat jpg, jpeg, atau png',
                'fparkir.max'=>'Maksimal file berukuran 2048kb',
                'kparkir.max'=>'Maksimal 120 karakter',
                'fgb.image'=>'Harus berformat jpg, jpeg, atau png',
                'fgb.max'=>'Maksimal file berukuran 2048kb',
                'kgb.max'=>'Maksimal 120 karakter',
                'fpj.image'=>'Harus berformat jpg, jpeg, atau png',
                'fpj.max'=>'Maksimal file berukuran 2048kb',
                'kpj.max'=>'Maksimal 120 karakter',
                'fbm.image'=>'Harus berformat jpg, jpeg, atau png',
                'fbm.max'=>'Maksimal file berukuran 2048kb',
                'kbm.max'=>'Maksimal 120 karakter',
                'fpintu.image'=>'Harus berformat jpg, jpeg, atau png',
                'fpintu.max'=>'Maksimal file berukuran 2048kb',
                'kpintu.max'=>'Maksimal 120 karakter',
                'frt.image'=>'Harus berformat jpg, jpeg, atau png',
                'frt.max'=>'Maksimal file berukuran 2048kb',
                'krt.max'=>'Maksimal 120 karakter',
                'flift.image'=>'Harus berformat jpg, jpeg, atau png',
                'flift.max'=>'Maksimal file berukuran 2048kb',
                'klift.max'=>'Maksimal 120 karakter',
                'ftoilet.image'=>'Harus berformat jpg, jpeg, atau png',
                'ftoilet.max'=>'Maksimal file berukuran 2048kb',
                'ktoilet.max'=>'Maksimal 120 karakter'
            ]
            );

            // ambil nama foto di masing2 field
            $ambilFoto = DB::table('posting')->where('id',$id)->get();
            foreach($ambilFoto as $ambil){
                $dapat = $ambil->ftempat;
                $dapatbm = $ambil->fbm;
                $dapatgb = $ambil->fgb;
                $dapatlift = $ambil->flift;
                $dapatparkir = $ambil->fparkir;
                $dapatpintu = $ambil->fpintu;
                $dapatpj = $ambil->fpj;
                $dapatrt = $ambil->frt;
                $dapattoilet = $ambil->ftoilet;

                // pusat tama jika ada update foto
                $getlat = $ambil->latitude;
            }

            // ftempat
            if(!empty($request->ftempat)){
                //hapus fisik file foto lama di folder img/anggota
                File::delete(public_path('img/posting/'.$dapat));
                
                //proses upload file foto baru
                $filetempat = $getlat.'.'.$request->ftempat->extension();  
                $request->ftempat->move(public_path('img/posting/'), $filetempat);
            }
            else{ //tidak ganti foto, nama file tetap foto yg lama
                $filetempat = $dapat;
            }
            
            // fparkir
            if(!empty($request->fparkir)){
                //hapus fisik file foto lama di folder img/anggota
                File::delete(public_path('img/posting/detail/parkiran/'.$dapatparkir));
                
                //proses upload file foto baru
                $fileparkir = $getlat.'.'.$request->fparkir->extension();  
                $request->fparkir->move(public_path('img/posting/detail/parkiran/'), $fileparkir);
            }
            else{ //tidak ganti foto, nama file tetap foto yg lama
                $fileparkir = $dapatparkir;
            }

            // fgb
            if(!empty($request->fgb)){
                //hapus fisik file foto lama di folder img/anggota
                File::delete(public_path('img/posting/detail/gb/'.$dapatgb));
                
                //proses upload file foto baru
                $filegb = $getlat.'.'.$request->fgb->extension();  
                $request->fgb->move(public_path('img/posting/detail/gb/'), $filegb);
            }
            else{ //tidak ganti foto, nama file tetap foto yg lama
                $filegb = $dapatgb;
            }

            // fpj
            if(!empty($request->fpj)){
                //hapus fisik file foto lama di folder img/anggota
                File::delete(public_path('img/posting/detail/pj/'.$dapatpj));
                
                //proses upload file foto baru
                $filepj = $getlat.'.'.$request->fpj->extension();  
                $request->fpj->move(public_path('img/posting/detail/pj/'), $filepj);
            }
            else{ //tidak ganti foto, nama file tetap foto yg lama
                $filepj = $dapatpj;
            }
        
            // fbm
            if(!empty($request->fbm)){
                //hapus fisik file foto lama di folder img/anggota
                File::delete(public_path('img/posting/detail/bm/'.$dapatbm));
                
                //proses upload file foto baru
                $filebm = $getlat.'.'.$request->fbm->extension();  
                $request->fbm->move(public_path('img/posting/detail/bm/'), $filebm);
            }
            else{ //tidak ganti foto, nama file tetap foto yg lama
                $filebm = $dapatbm;
            }

            // fpintu
            if(!empty($request->fpintu)){
                //hapus fisik file foto lama di folder img/anggota
                File::delete(public_path('img/posting/detail/pintu/'.$dapatpintu));
                
                //proses upload file foto baru
                $filepintu = $getlat.'.'.$request->fpintu->extension();  
                $request->fpintu->move(public_path('img/posting/detail/pintu/'), $filepintu);
            }
            else{ //tidak ganti foto, nama file tetap foto yg lama
                $filepintu = $dapatpintu;
            }
            
            // frt
            if(!empty($request->frt)){
                //hapus fisik file foto lama di folder img/anggota
                File::delete(public_path('img/posting/detail/rt/'.$dapatrt));
                
                //proses upload file foto baru
                $filert = $getlat.'.'.$request->frt->extension();  
                $request->frt->move(public_path('img/posting/detail/rt/'), $filert);
            }
            else{ //tidak ganti foto, nama file tetap foto yg lama
                $filert = $dapatrt;
            }

            // flift
            if(!empty($request->flift)){
                //hapus fisik file foto lama di folder img/anggota
                File::delete(public_path('img/posting/detail/lift/'.$dapatlift));
                
                //proses upload file foto baru
                $filelift = $getlat.'.'.$request->flift->extension();  
                $request->flift->move(public_path('img/posting/detail/lift/'), $filelift);
            }
            else{ //tidak ganti foto, nama file tetap foto yg lama
                $filelift = $dapatlift;
            }
        
            // ftoilet
            if(!empty($request->ftoilet)){
                //hapus fisik file foto lama di folder img/anggota
                File::delete(public_path('img/posting/detail/toilet/'.$dapattoilet));
                
                //proses upload file foto baru
                $filetoilet = $getlat.'.'.$request->ftoilet->extension();  
                $request->ftoilet->move(public_path('img/posting/detail/toilet/'), $filetoilet);
            }
            else{ //tidak ganti foto, nama file tetap foto yg lama
                $filetoilet = $dapattoilet;
            }
        
        DB::table('posting')->where('id',$id)->update(
            [ 
                'namaTempat'=>$request->namaTempat,
                'ftempat'=>$filetempat,
                'tumbs'=> 0,
                'status'=>$request->status,
                'kategori_id'=>$request->kategori_id,
                'users_id'=>$request->users_id,
                'fparkir'=>$fileparkir,
                'kparkir'=>$request->kparkir,
                'fgb'=>$filegb,
                'kgb'=>$request->kgb,
                'fpj'=>$filepj,
                'kpj'=>$request->kpj,
                'fbm'=>$filebm,
                'kbm'=>$request->kbm,
                'fpintu'=>$filepintu,
                'kpintu'=>$request->kpintu,
                'frt'=>$filert,
                'krt'=>$request->krt,
                'flift'=>$filelift,
                'klift'=>$request->klift,
                'ftoilet'=>$filetoilet,
                'ktoilet'=>$request->ktoilet,     
            ]);
            //landing page
            return redirect('/posting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //ftempat
        $ft = DB::table('posting')->select('ftempat')
                ->where('id',$id)->get();
        foreach($ft as $f){
            $namaFileTempat = $f->ftempat;
        }
        //hapus fisik file di folder img/posting
        File::delete(public_path('img/posting/'.$namaFileTempat));

        //fbm
        $ffbm = DB::table('posting')->select('fbm')
                ->where('id',$id)->get();
        foreach($ffbm as $fffbm){
            $namaFilebm = $fffbm->fbm;
        }
        //hapus fisik file di folder img/posting
        File::delete(public_path('img/posting/detail/bm/'.$namaFilebm));

        //gb
        $ffgb = DB::table('posting')->select('fgb')
                ->where('id',$id)->get();
        foreach($ffgb as $fffgb){
            $namaFilegb = $fffgb->fgb;
        }
        //hapus fisik file di folder img/posting
        File::delete(public_path('img/posting/detail/gb/'.$namaFilegb));
        
        //lift
        $fflift = DB::table('posting')->select('flift')
                ->where('id',$id)->get();
        foreach($fflift as $ffflift){
            $namaFilelift = $ffflift->flift;
        }
        //hapus fisik file di folder img/posting
        File::delete(public_path('img/posting/detail/lift/'.$namaFilelift));

        //parkir
        $ffparkir = DB::table('posting')->select('fparkir')
                ->where('id',$id)->get();
        foreach($ffparkir as $fffparkir){
            $namaFileparkir = $fffparkir->fparkir;
        }
        //hapus fisik file di folder img/posting
        File::delete(public_path('img/posting/detail/parkiran/'.$namaFileparkir));

        //pintu
        $ffpintu = DB::table('posting')->select('fpintu')
                ->where('id',$id)->get();
        foreach($ffpintu as $fffpintu){
            $namaFilepintu = $fffpintu->fpintu;
        }
        //hapus fisik file di folder img/posting
        File::delete(public_path('img/posting/detail/pintu/'.$namaFilepintu));

        //pj
        $ffpj = DB::table('posting')->select('fpj')
                ->where('id',$id)->get();
        foreach($ffpj as $fffpj){
            $namaFilepj = $fffpj->fpj;
        }
        //hapus fisik file di folder img/posting
        File::delete(public_path('img/posting/detail/pj/'.$namaFilepj));

        //rt
        $ffrt = DB::table('posting')->select('frt')
                ->where('id',$id)->get();
        foreach($ffrt as $fffrt){
            $namaFilert = $fffrt->frt;
        }
        //hapus fisik file di folder img/posting
        File::delete(public_path('img/posting/detail/rt/'.$namaFilert));

        //toilet
        $fftoilet = DB::table('posting')->select('ftoilet')
                ->where('id',$id)->get();
        foreach($fftoilet as $ffftoilet){
            $namaFiletoilet = $ffftoilet->ftoilet;
        }
        //hapus fisik file di folder img/posting
        File::delete(public_path('img/posting/detail/toilet/'.$namaFiletoilet));

        DB::table('posting')->where('id',$id)->delete();
            // landing page
            return redirect('/posting');
    }

    public function search(Request $request){
        $search = $request->get('search');
        $ar_posting = DB::table('posting')
        ->join('kategori', 'kategori.id', '=', 'posting.kategori_id')
        ->select('posting.*', 'kategori.nama as kat')
        ->where('namaTempat', 'like', '%' .$search. '%')->paginate(5);
        return view('posting.beranda', ['ar_posting'=>$ar_posting]);
    }

    public function nonaktif(Request $request, $id)
	{
        // merubah status jadi nonaktif
		DB::table('posting')->where('id',$id)->update(
        [
			'status' => 'nonaktif',
		]);
		// alihkan halaman ke halaman posting
        return redirect('/posting');
    }

    // merubah status jadi aktif
    public function aktif(Request $request, $id)
	{
        
		DB::table('posting')->where('id',$id)->update(
        [
			'status' => 'aktif',
		]);
		// alihkan halaman ke halaman posting
        return redirect('/posting');
    }

}

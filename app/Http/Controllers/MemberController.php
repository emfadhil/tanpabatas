<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Member;
use Validator,File,Redirect,Response;
//export excel
use App\Exports\MemberExport;
use Maatwebsite\Excel\Facades\Excel;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_member = DB::table('users')->get();
        return view('member.index', compact('ar_member') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.form');
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
                'name' => 'required|max:45|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'alamat' => 'required',
                'telp' => 'max:45|required',
                'status' => 'required',
                'role' => 'required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ],
            // menampilkan pesan error jika salah input
            [
                'name.required' => 'Nama harus diisi',
                'email.unique' => 'Email udah ada',
                'name.max' => 'Maksimal 45 karakter',
                'email.required' => 'Email masih kosong',
                'email.email' => 'Harap Masukan email',
                'email.unique' => 'Email udah ada',
                'password.required' => 'Password masih kosng',
                'alamat.required' => 'Email masih kosong',
                'telp.required' => 'Telepon masih kosong',
                'status.required' => 'status masih kosng',
                'role.required' => 'Role masih kosng',
                'foto.image' => 'Hanya gamabr berformat jpg,jpeg atau png',
                'foto.max' => 'Maksimal upload kurang dari 2MB'
                
            ]
            );

        if(!empty($request->foto)){//proses upload file
           
            $fileName = $request->name.'.'.$request->foto->extension();  
            $request->foto->move(public_path('img/member/'), $fileName);
        }
        else{ //tidak ada upload file
            $fileName = '';
        }
        DB::table('users')->insert(
            [ 
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'alamat'=>$request->alamat,
                'telp'=>$request->telp,
                'status'=>$request->status,
                'role'=>$request->role,
                'foto'=>$fileName,     
                ]);
                //landing page
                return redirect('/member');
            }
            
            /**
             * Display the specified resource.
             *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_member = DB::table('users')->where('id','=', $id)->get(); 
        return view('member.show', compact('ar_member'));
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
        return view ('member.form_edit', compact('data'));
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
                'role' => 'required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ],
            // menampilkan pesan error jika salah input
            [
                'alamat.required' => 'Email masih kosong',
                'telp.required' => 'Telepon masih kosong',
                'role.required' => 'Role masih kosng',
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
                'role'=>$request->role,
                'foto'=>$filefoto,     
                ]);
                //landing page
                return redirect('/member');
            }
            
            /**
             * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //ambil isi kolom cover lalu hapus file covernya
        $foto = DB::table('users')->select('foto')
                ->where('id',$id)->get();
        foreach($foto as $f){
            $namaFile = $f->foto;
        }
        //hapus fisik file di folder img/buku
        File::delete(public_path('img/member/'.$namaFile));

        DB::table('users')->where('id',$id)->delete();
            // landing page
            return redirect('/member');
    }
    //membuat function excel
    public function memberExcel(){
        return Excel::download(new MemberExport, 'Data_Member.xlsx');
    }

    public function nonaktif(Request $request, $id)
	{
        // merubah status jadi nonaktif
		DB::table('users')->where('id',$id)->update(
        [
			'status' => 'nonaktif',
		]);
		// alihkan halaman ke halaman member
        return redirect('/member');
    }

    // merubah status jadi aktif
    public function aktif(Request $request, $id)
	{
        
		DB::table('users')->where('id',$id)->update(
        [
			'status' => 'aktif',
		]);
		// alihkan halaman ke halaman member
        return redirect('/member');
    }
}

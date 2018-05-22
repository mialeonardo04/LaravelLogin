<?php

namespace App\Http\Controllers;

use App\Teacher;
use DB;
use Illuminate\Http\Request;
use Exception;
use App\Post;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers=Teacher::paginate(3);
        return view('teacher.home',['teachers'=>$teachers]);
    }

    public function cetakTeacher(){
        $teacher = Teacher::all();
        return view('teacher.print',['teachers' => $teacher]);
    }

    public function cetakById($id){
        $teacher = Teacher::where('slug',$id)->first();
        if (!$teacher) {
            abort(404);
        }
        return view('teacher.printbyid')->with('teacher',$teacher);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|max:12',
            'nama' => 'required',
            'tmp_lahir' => 'required|max:32',
            'tgl_lahir' => 'date_format:"Y-m-d"|required',
            'alamat' => 'required',
            'ayah' => 'required|max:60',
            'ibu' => 'required|max:60',
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'no_telp' => 'required|max:14',
            'email' => 'required|email',
        ]);
        $teacher = new Teacher;
        $teachercek = Teacher::where('NIP','=',$request->nip)->exists();
        if ($teachercek) {
            return redirect('/teachers/create/')->with('message','NIP Guru harus unik');
        } else {
            $teacher->NIP = $request->nip;
            $teacher->Nama = $request->nama;
            $teacher->Tempat_lahir = $request->tmp_lahir;
            $teacher->Tanggal_lahir = $request->tgl_lahir;
            $teacher->Alamat = $request->alamat;
            $teacher->Nama_ayah = $request->ayah;
            $teacher->Nama_ibu = $request->ibu;
            $teacher->Pendidikan = $request->pendidikan;
            $teacher->Jurusan = $request->jurusan;
            $teacher->Telepon = $request->no_telp;
            $teacher->email = $request->email;
            $teacher->slug = str_slug($request->nama,'_');
            $teacher->save();
            return redirect('/teachers')->with('message','Data Guru Berhasil ditambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::where('slug',$id)->first();
        if (!$teacher) {
            abort(404);
        }
        return view('teacher.read')->with('teacher',$teacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::where('NIP', $id)->first();
        if (!$teacher) {
            abort(404);
        }
        return view('teacher.edit')->with('teacher',$teacher);
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
        $this->validate($request, [
            'nip' => 'required|max:12',
            'nama' => 'required',
            'tmp_lahir' => 'required|max:32',
            'tgl_lahir' => 'date_format:"Y-m-d"|required',
            'alamat' => 'required',
            'ayah' => 'required|max:60',
            'ibu' => 'required|max:60',
            'pendidikan' => 'required',
            'jurusan' => 'required',
            'no_telp' => 'required|max:14',
            'email' => 'required|email',
        ]);
        $teacher = Teacher::where('NIP', $id)->first();
        try {
            $teacher->NIP = $request->nip;
            $teacher->Nama = $request->nama;
            $teacher->Tempat_lahir = $request->tmp_lahir;
            $teacher->Tanggal_lahir = $request->tgl_lahir;
            $teacher->Alamat = $request->alamat;
            $teacher->Nama_ayah = $request->ayah;
            $teacher->Nama_ibu = $request->ibu;
            $teacher->Pendidikan = $request->pendidikan;
            $teacher->Jurusan = $request->jurusan;
            $teacher->Telepon = $request->no_telp;
            $teacher->email = $request->email;
            $teacher->slug = str_slug($request->nama,'_');
            $teacher->save();
            return redirect('/teachers')->with('message','Data Guru Berhasil diedit');
        } catch (\Exception $e){
            return redirect('/teachers')->with('message','Error: '.$e->getMessage().'==> NIP yang diinput tidak unik');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect('/teachers')->with('message','Data Guru Berhasil dihapus');
    }
}

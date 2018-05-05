<?php

namespace App\Http\Controllers;

use App\Student;
use DB;
use Illuminate\Http\Request;
use Exception;
use App\Post;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::paginate(3);
        return view('student.home',['students'=>$students]);
    }

    public function cetakStudent(){
        $student = Student::all();
        return view('student.print',['students' => $student]);
    }

    public function cetakById($id){
        $student = Student::where('slug',$id)->first();
        if (!$student) {
            abort(404);
        }
        return view('student.printbyid')->with('student',$student);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
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
            'nis' => 'required|max:12',
            'nama' => 'required',
            'tmp_lahir' => 'required|max:32',
            'tgl_lahir' => 'date_format:"Y-m-d"|required',
            'alamat' => 'required',
            'ayah' => 'required|max:60',
            'ibu' => 'required|max:60',
            'sekolah' => 'required',
            'no_telp' => 'required|max:14',
            'email' => 'required|email',
        ]);
        $student = new Student;
        $studentcek = Student::where('NIS','=',$request->nis)->exists();
        if ($studentcek) {
            return redirect('/students/create/')->with('message','NIS Siswa harus unik');
        } else {
            $student->NIS = $request->nis;
            $student->Nama = $request->nama;
            $student->Tempat_lahir = $request->tmp_lahir;
            $student->Tanggal_lahir = $request->tgl_lahir;
            $student->Alamat = $request->alamat;
            $student->Nama_ayah = $request->ayah;
            $student->Nama_ibu = $request->ibu;
            $student->Asal_Sekolah = $request->sekolah;
            $student->Telepon = $request->no_telp;
            $student->email = $request->email;
            $student->slug = str_slug($request->nama,'_');
            $student->save();
            return redirect('/students')->with('message','Data Siswa Berhasil ditambah');
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
        $student = Student::where('slug',$id)->first();
        if (!$student) {
            abort(404);
        }
        return view('student.read')->with('student',$student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::where('NIS', $id)->first();
        if (!$student) {
            abort(404);
        }
        return view('student.edit')->with('student',$student);
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
            'nis' => 'required|max:12',
            'nama' => 'required',
            'tmp_lahir' => 'required|max:32',
            'tgl_lahir' => 'date_format:"Y-m-d"|required',
            'alamat' => 'required',
            'ayah' => 'required|max:60',
            'ibu' => 'required|max:60',
            'sekolah' => 'required',
            'no_telp' => 'required|max:14',
            'email' => 'required|email',
        ]);
        $student = Student::where('NIS', $id)->first();
        try {
            $student->NIS = $request->nis;
            $student->Nama = $request->nama;
            $student->Tempat_lahir = $request->tmp_lahir;
            $student->Tanggal_lahir = $request->tgl_lahir;
            $student->Alamat = $request->alamat;
            $student->Nama_ayah = $request->ayah;
            $student->Nama_ibu = $request->ibu;
            $student->Asal_Sekolah = $request->sekolah;
            $student->Telepon = $request->no_telp;
            $student->email = $request->email;
            $student->slug = str_slug($request->nama,'_');
            $student->save();
            return redirect('/students')->with('message','Data Siswa Berhasil diedit');
        } catch (\Exception $e) {
            return redirect('/students')->with('message','Error: '.$e->getMessage().'==> NIS input tidak unik');
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
        $student = Student::find($id);
        $student->delete();
        return redirect('/students')->with('message','Data Siswa Berhasil dihapus');
    }
}

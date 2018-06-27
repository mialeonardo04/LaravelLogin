<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class Record_BayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=Pembayaran::paginate(10);
        return view('bayar.recordpembayaran')->with('payments',$payments);
    }

    public function search(Request $request)
    {
        $searchData = $request->searchData;

        $data = DB::table('pembayarans')
            ->where('Tanggal_bayar', 'like', '%' . $searchData . '%')
            ->orWhere('NIS','like', '%' . $searchData . '%')
            ->paginate(5);
        return view('bayar.recordpembayaran',[
            'payments' => $data, 'searchByRes' =>$searchData
        ]);
    }
    public function exportAll(Request $request, $type){
        $data = Pembayaran::all();
        return Excel::create('record_pembayaran', function ($excel) use ($data){
            $excel->sheet('record_pembayaran',function ($sheet) use ($data){
                $sheet->fromArray($data);
            });
        })->download($type);
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
        $bayar = Pembayaran::where('ID_Bayar',$id)->first();
        $a = $bayar->SPP_byr;
        $b = $bayar->Uang_kegiatan_byr;
        $c = $bayar->Uang_buku_byr;
        $d = $bayar->Katering_byr;
        $e = $bayar->Komite_byr;
        $f = $bayar->Seragam_byr;
        $g = $bayar->Others_byr;
        $total = $a+$b+$c+$d+$e+$f+$g;
        if (!$bayar) {
            abort(404);
        }
        return view('bayar.printbyid',array('bayar' => $bayar,
            'totalbayar'=>$total));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Pembayaran::find($id);
        $payment->delete();

        return redirect('/recordpayments')->with('message','Data Pembayaran Berhasil dihapus');
    }
}

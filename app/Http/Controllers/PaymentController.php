<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=Payment::paginate(3);
        return view('payment.home')->with('payments',$payments);
    }

    public function search(Request $request)
    {
        $searchData = $request->searchData;

        $data = DB::table('payments')
            ->where('NIS', 'like', '%' . $searchData . '%')
            ->orWhere('Tahun', 'like', '%' . $searchData . '%')
            ->paginate(3);
        return view('payment.home',[
            'payments' => $data, 'searchByRes' =>$searchData
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment.create');
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
            'tahun' => 'required|integer',
            'spp' => 'integer|required',
            'kegiatan' => 'integer|required',
            'buku' => 'required|integer',
            'katering' => 'required|integer',
            'komite' => 'required|integer',
            'seragam' => 'integer|required',
            'lainnya' => 'required|integer',
        ]);
        $payment = new Payment;
        $paymentcek = Payment::where('NIS','=',$request->nis)->exists();
        if ($paymentcek) {
            return redirect('/payments/create/')->with('message','NIS Pembayar harus unik');
        } else {
            $payment->NIS = $request->nis;
            $payment->Tahun = $request->tahun;
            $payment->SPP = $request->spp;
            $payment->Uang_kegiatan = $request->kegiatan;
            $payment->Uang_buku = $request->buku;
            $payment->Katering = $request->katering;
            $payment->Komite = $request->komite;
            $payment->Seragam = $request->seragam;
            $payment->Others = $request->lainnya;
            $payment->save();
            return redirect('/payments')->with('message','Data Pembayaran Berhasil ditambah');
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
        $payment = Payment::where('NIS',$id)->first();
        if (!$payment) {
            abort(404);
        }
        return view('payment.read')->with('payment',$payment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::where('NIS',$id)->first();
        if (!$payment) {
            abort(404);
        }
        return view('payment.edit')->with('payment',$payment);
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
            'tahun' => 'required|integer',
            'tgl_byr' => 'required|date_format:"Y-m-d"|max:32',
            'spp' => 'integer|required',
            'kegiatan' => 'integer|required',
            'buku' => 'required|integer',
            'katering' => 'required|integer',
            'komite' => 'required|integer',
            'seragam' => 'integer|required',
            'lainnya' => 'required|integer',
        ],[
            'tgl_byr.required' => 'Data tidak boleh kosong',
        ]);
        $payment = Payment::where('NIS',$id)->first();
        try {
            $payment->NIS = $request->nis;
            $payment->Tahun = $request->tahun;
            $payment->SPP = $request->spp;
            $payment->Uang_kegiatan = $request->kegiatan;
            $payment->Uang_buku = $request->buku;
            $payment->Katering = $request->katering;
            $payment->Komite = $request->komite;
            $payment->Seragam = $request->seragam;
            $payment->Others = $request->lainnya;
            $payment->save();
            return redirect('/payments')->with('message','Data Pembayaran Berhasil diedit');
        } catch (\Exception $e){
            return redirect('/payments')->with('message','Error: '.$e->getMessage().'==> NIS pembayar tidak unik');
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
        $payment = Payment::find($id);
        $payment->delete();
        return redirect('/payments')->with('message','Data Pembayaran Berhasil dihapus');
    }
}

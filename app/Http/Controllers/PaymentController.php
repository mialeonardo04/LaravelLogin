<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Pembayaran;
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
            'tgl_byr' => 'required',
            'spp' => 'integer|required',
            'kegiatan' => 'integer|required',
            'buku' => 'required|integer',
            'katering' => 'required|integer',
            'komite' => 'required|integer',
            'seragam' => 'integer|required',
            'lainnya' => 'integer|required',
        ],[
            'tgl_byr.required' => 'Data tidak boleh kosong',
        ]);
        $payment = Payment::where('NIS',$id)->first();
        $bayar = new Pembayaran();

        $bayarSPP = $payment->SPP - $request->spp;
        $bayarKeg = $payment->Uang_kegiatan - $request->kegiatan;
        $bayarBuku = $payment->Uang_buku - $request->buku;
        $bayarKatering = $payment->Katering - $request->katering;
        $bayarKomite = $payment->Komite - $request->komite;
        $bayarSeragam = $payment->Seragam - $request->seragam;
        $bayarLain = $payment->Others - $request->lainnya;

        try {
            $payment->NIS = $request->nis;
            $payment->Tahun = $request->tahun;
            $payment->SPP = $bayarSPP;
            $payment->Uang_kegiatan = $bayarKeg;
            $payment->Uang_buku = $bayarBuku;
            $payment->Katering = $bayarKatering;
            $payment->Komite = $bayarKomite;
            $payment->Seragam = $bayarSeragam;
            $payment->Others = $bayarLain;
            $payment->save();

            $bayar->NIS = $request->nis;
            $bayar->Tahun = $request->tahun;
            $bayar->Tanggal_bayar = $request->tgl_byr;
            $bayar->SPP_byr = $request->spp;
            $bayar->Uang_kegiatan_byr = $request->kegiatan;
            $bayar->Uang_buku_byr = $request->buku;
            $bayar->Katering_byr = $request->katering;
            $bayar->Komite_byr = $request->komite;
            $bayar->Seragam_byr = $request->seragam;
            $bayar->Others_byr = $request->lainnya;
            $bayar->save();

            return redirect('/payments')->with('message','Pembayaran Berhasil, Silahkan lihat record pembayaran');
        } catch (\Exception $e){
            return redirect('/payments')->with('message','Error: '.$e->getMessage());
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
        $pay = Payment::where('NIS',$id)->first();
        if ($pay->Others > 0 && $pay->SPP > 0 && $pay->Uang_kegiatan > 0 && $pay->Uang_buku > 0 &&
            $pay->Katering > 0 && $pay->Komite > 0 && $pay->Seragam > 0){
            echo "blm bisa bayar";
            //return redirect('/payments')->with('message','Data Pembayaran BELUM bisa dihapus karena ada administrasi yang belum dibayar');
        } else {
            echo "bisa bayar";
//            $payment = Payment::find($id);
//            $payment->delete();
//            return redirect('/payments')->with('message','Data Pembayaran Berhasil dihapus');
        }

    }
}

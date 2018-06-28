@extends('layouts.master')
@section('title', 'Data Pembayaran')
@section('sidebar')
    @parent
@endsection

@section('content')
    @if(Session::has('message'))
        <div class="alert {{ Session::get('alert alert-success', 'alert-info') }}">{{ Session::get('message') }}</div>
    @endif
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=600,width=980');
            printWindow.document.write('<html><head><title> Data Siswa </title>');
            printWindow.document.write('<link href="{{  asset('theme/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">');
            printWindow.document.write('<link href="{{  asset('theme/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">');
            printWindow.document.write('<link href="{{  asset('theme/vendors/nprogress/nprogress.css') }}" rel="stylesheet">');
            printWindow.document.write('</head><body><div class="x-panel">');
            printWindow.document.write(divContents);
            printWindow.document.write('</div></body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
    <h2 class="page-header">Record Pembayaran</h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="/recordpayments">
                <button type="button" class="btn btn-danger btn-xs">Back</button>
            </a> |

            <form action="{{ url('searchByDate') }}" class="form-inline text-right" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    {{--<input type="text" id="test" class="form-control" name="searchData2">--}}
                    <input type="text" id="test" class="form-control" name="searchData2" placeholder=" masukkan nis">
                    <select name="searchData" class="form-control">
                        <option value="">Bulan</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>



        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <form id="form1">
                    <div id="dvContainer">
                        @if($searchByRes == '01')
                            <center><h2 class="page-header">Record Pembayaran bulan Januari (NIS: {{ $searchByRes2 }} )</h2></center>
                        @elseif($searchByRes == '02')
                            <center><h2 class="page-header">Record Pembayaran bulan Februari (NIS: {{ $searchByRes2 }} )</h2></center>
                        @elseif($searchByRes == '03')
                            <center><h2 class="page-header">Record Pembayaran bulan Maret (NIS: {{ $searchByRes2 }} )</h2></center>
                        @elseif($searchByRes == '04')
                            <center><h2 class="page-header">Record Pembayaran bulan April (NIS: {{ $searchByRes2 }} )</h2></center>
                        @elseif($searchByRes == '05')
                            <center><h2 class="page-header">Record Pembayaran bulan Mei (NIS: {{ $searchByRes2 }} )</h2></center>
                        @elseif($searchByRes == '06')
                            <center><h2 class="page-header">Record Pembayaran bulan Juni (NIS: {{ $searchByRes2 }} )</h2></center>
                        @elseif($searchByRes == '07')
                            <center><h2 class="page-header">Record Pembayaran bulan Juli (NIS: {{ $searchByRes2 }} )</h2></center>
                        @elseif($searchByRes == '08')
                            <center><h2 class="page-header">Record Pembayaran bulan Agustus (NIS: {{ $searchByRes2 }} )</h2></center>
                        @elseif($searchByRes == '09')
                            <center><h2 class="page-header">Record Pembayaran bulan September (NIS: {{ $searchByRes2 }} )</h2></center>
                        @elseif($searchByRes == '10')
                            <center><h2 class="page-header">Record Pembayaran bulan Oktober (NIS: {{ $searchByRes2 }} )</h2></center>
                        @elseif($searchByRes == '11')
                            <center><h2 class="page-header">Record Pembayaran bulan November (NIS: {{ $searchByRes2 }} )</h2></center>
                        @elseif($searchByRes == '12')
                            <center><h2 class="page-header">Record Pembayaran bulan Desember (NIS: {{ $searchByRes2 }} )</h2></center>
                        @endif


                        @php($mSPP = 0)
                        @php($mKegiatan = 0)
                        @php($mBuku = 0)
                        @php($mKatering = 0)
                        @php($mKomite = 0)
                        @php($mSeragam = 0)
                        @php($mLainnya = 0)
                        <table id="example2" class="table table-hover">
                            <thead>

                            <tr>
                                <th>Tanggal Pembayaran</th>
                                <th>NIS</th>
                                <th>Tahun(Kelas)</th>
                                <th>Pembayaran SPP</th>
                                <th>Pembayaran Kegiatan</th>
                                <th>Pembayaran Buku</th>
                                <th>Pembayaran Katering</th>
                                <th>Pembayaran Komite</th>
                                <th>Pembayaran Seragam</th>
                                <th>Pembayaran Lain-lain</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $p)
                                @php($mSPP += $p->SPP_byr)
                                @php($mKegiatan += $p->Uang_kegiatan_byr)
                                @php($mBuku += $p->Uang_buku_byr)
                                @php($mKatering += $p->Katering_byr)
                                @php($mKomite += $p->Komite_byr)
                                @php($mSeragam += $p->Seragam_byr)
                                @php($mLainnya += $p->Others_byr)
                                <tr>
                                    <td>{{$p->Tanggal_bayar}}</td>
                                    <td>{{$p->NIS}}</td>
                                    <td>{{$p->Tahun}}</td>
                                    <td>Rp.{{number_format($p->SPP_byr,2,',','.')}}</td>
                                    <td>Rp.{{number_format($p->Uang_kegiatan_byr,2,',','.')}}</td>
                                    <td>Rp.{{number_format($p->Uang_buku_byr,2,',','.')}}</td>
                                    <td>Rp.{{number_format($p->Katering_byr,2,',','.')}}</td>
                                    <td>Rp.{{number_format($p->Komite_byr,2,',','.')}}</td>
                                    <td>Rp.{{number_format($p->Seragam_byr,2,',','.')}}</td>
                                    <td>Rp.{{number_format($p->Others_byr,2,',','.')}}</td>

                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3"><b>Total</b></td>
                                <td><b>Rp.{{ number_format($mSPP,2,',','.') }}</b></td>
                                <td><b>Rp.{{ number_format($mKegiatan,2,',','.') }}</b></td>
                                <td><b>Rp.{{ number_format($mBuku,2,',','.') }}</b></td>
                                <td><b>Rp.{{ number_format($mKatering,2,',','.') }}</b></td>
                                <td><b>Rp.{{ number_format($mKomite,2,',','.') }}</b></td>
                                <td><b>Rp.{{ number_format($mSeragam,2,',','.') }}</b></td>
                                <td><b>Rp.{{ number_format($mLainnya,2,',','.') }}</b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <input class="btn btn-link" type="button" value="Print PDF" id="btnPrint" />
               </form>

            </div>
            <!-- /.table-responsive -->
            {!! $payments->links() !!}
        </div>
    </div>
    <!-- /.panel -->
@endsection

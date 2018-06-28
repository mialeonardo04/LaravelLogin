@extends('layouts.master')
@section('title', 'Data Pembayaran')
@section('sidebar')
    @parent
@endsection

@section('content')
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
    @if(Session::has('message'))
        <div class="alert {{ Session::get('alert alert-success', 'alert-info') }}">{{ Session::get('message') }}</div>
    @elseif(Session::has('kembalian'))
        <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('kembalian') }}</div>
    @elseif(Session::has('messageEdit'))
        <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('messageEdit') }}</div>
    @endif
    <h2 class="page-header">Daftar Tagihan</h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="/payments">
                <button type="button" class="btn btn-danger btn-xs">Back</button>
            </a>
            <form action="{{ url('search') }}" class="form-inline text-right" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" name="searchData" placeholder="Masukkan NIS atau Tahun">
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
                        <center><h2 class="page-header">Print hasil (by: {{ $searchByRes }} )</h2></center>

                        <table id="example2" class="table table-hover">
                            <thead>
                            @php($mTotal = 0)
                            @php($mSPP = 0)
                            @php($mKegiatan = 0)
                            @php($mBuku = 0)
                            @php($mKatering = 0)
                            @php($mKomite = 0)
                            @php($mSeragam = 0)
                            @php($mLainnya = 0)
                            <tr>
                                <th>NIS</th>
                                <th>Tahun(Kelas)</th>
                                <th>Tagihan SPP</th>
                                <th>Tagihan Kegiatan</th>
                                <th>Tagihan Buku</th>
                                <th>Tagihan Katering</th>
                                <th>Tagihan Komite</th>
                                <th>Tagihan Seragam</th>
                                <th>Tagihan Lain-lain</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $p)
                                @php($mSPP += $p->SPP)
                                @php($mKegiatan += $p->Uang_kegiatan)
                                @php($mBuku += $p->Uang_buku)
                                @php($mKatering += $p->Katering)
                                @php($mKomite += $p->Komite)
                                @php($mSeragam += $p->Seragam)
                                @php($mLainnya += $p->Others)

                                <tr>
                                    <td>{{$p->NIS}}</td>
                                    <td>{{$p->Tahun}}</td>
                                    <td>Rp.{{number_format($p->SPP,2,',','.')}}</td>
                                    <td>Rp.{{number_format($p->Uang_kegiatan,2,',','.')}}</td>
                                    <td>Rp.{{number_format($p->Uang_buku,2,',','.')}}</td>
                                    <td>Rp.{{number_format($p->Katering,2,',','.')}}</td>
                                    <td>Rp.{{number_format($p->Komite,2,',','.')}}</td>
                                    <td>Rp.{{number_format($p->Seragam,2,',','.')}}</td>
                                    <td>Rp.{{number_format($p->Others,2,',','.')}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2"><b>Total</b></td>
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
        </div>
        {!! $payments->links() !!}
    </div>
    <!-- /.panel -->
@endsection

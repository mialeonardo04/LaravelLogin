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
        if ( $('#test')[0].type != 'date' ) $('#test').datepicker();
    </script>
    <h2 class="page-header">Record Pembayaran</h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="/dashboard">
                <button type="button" class="btn btn-danger btn-xs">Back to Home</button>
            </a> |
            <a href="{{ URL::to('/recordpayments/downloadExcel/xlsx') }}">
                <button type="button" class="btn btn-link btn-xs">download .xlsx</button>
            </a> |
            <a href="{{ URL::to('/recordpayments/downloadExcel/xls') }}">
                <button type="button" class="btn btn-link btn-xs">download .xls</button>
            </a>
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
                        <th colspan="2">Print|Delete</th>
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
                            <td><a href="/recordpayments/{{$p->ID_Bayar}}/"><span class="glyphicon glyphicon-print"></span></a></td>
                            <td>
                                <form action="/recordpayments/{{$p->ID_Bayar}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn-link" onclick="return confirm('Delete item! Are you sure?')"><i class="fa fa-trash-o"></i></button>
                                </form>
                            </td>
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
            <!-- /.table-responsive -->
            {!! $payments->links() !!}
        </div>
    </div>
    <!-- /.panel -->
@endsection

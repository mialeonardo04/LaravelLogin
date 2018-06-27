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
            <form action="{{ url('searchByDate') }}" class="form-inline text-right">
                <div class="form-group">
                    <input type="date" id="test" class="form-control" name="searchData">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
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
                        <th colspan="2">Print/Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $p)
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
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            {!! $payments->links() !!}
        </div>
    </div>
    <!-- /.panel -->
@endsection

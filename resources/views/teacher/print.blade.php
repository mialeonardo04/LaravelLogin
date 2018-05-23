@extends('layouts.master')
@section('title', 'Data Siswa')
@section('sidebar')
    @parent
@endsection

@section('content')
    @if(Session::has('messageFromAdmin'))
        <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}" xmlns="http://www.w3.org/1999/html">{{ Session::get('messageFromAdmin') }}</div>
    @endif
    @if(Session::has('message'))
        <div class="alert {{ Session::get('alert alert-success', 'alert-info') }}">{{ Session::get('message') }}</div>
    @elseif(Session::has('messageEdit'))
        <div class="alert {{ Session::get('alert alert-danger', 'alert-danger') }}">{{ Session::get('messageEdit') }}</div>
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
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <a href="/students">
                    <button type="button" class="btn btn-danger btn-xs">Back</button>
                </a> |

            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <form id="form1">
                        <div id="dvContainer">
                            <center><h2 class="page-header">Daftar Siswa</h2></center>
                            <table class="table table-hover">
                                <thead>
                                <tr class="text-black">
                                    <th>NIS</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat,Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Asal Sekolah</th>
                                    <th>No. Telepon</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $s)
                                    <tr>
                                        <td>{{$s->NIS}}</td>
                                        <td>{{$s->Nama}}</td>
                                        <td>{{$s->Tempat_lahir}}, {{$s->Tanggal_lahir}}</td>
                                        <td>{{$s->Alamat}}</td>
                                        <td>{{$s->Asal_Sekolah}}</td>
                                        <td>{{$s->Telepon}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <input class="btn btn-link" type="button" value="Print PDF" id="btnPrint" />
                    </form>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
        <!-- /.panel -->
    </div>
@endsection

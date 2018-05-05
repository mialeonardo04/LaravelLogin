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
                            <table>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td></tr>
                            </table>
                            <table width="63%" height="303" border="0" align="center">
                                <tr>
                                    <td height="25" colspan="3" align="center" style="margin-bottom:20px; font-size:18px; font-weight:bold">SURAT KETERANGAN AKTIF SEKOLAH</td>
                                </tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>

                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><em>Yang bertanda tangan dibawah ini :</em></td>
                                </tr>
                                <tr>
                                    <td width="297" height="25">NO SURAT</td>
                                    <td width="99">:</td>
                                    <td width="207">.........................</td>
                                </tr>
                                <tr>
                                    <td width="297" height="25">NIS</td>
                                    <td width="99">:</td>
                                    <td width="207">{{$student->NIS}}</td>
                                </tr>
                                <tr>
                                    <td width="297" height="25">NAMA</td>
                                    <td width="99">:</td>
                                    <td width="207">{{$student->Nama}}</td>
                                </tr>
                                <tr>
                                    <td width="297" height="25">Tempat,Tanggal Lahir</td>
                                    <td width="99">:</td>
                                    <td width="207">{{$student->Tempat_lahir}}, {{$student->Tanggal_lahir}}</td>
                                </tr>
                                <tr>
                                    <td width="297" height="25">Alamat Tinggal</td>
                                    <td width="99">:</td>
                                    <td width="207">{{$student->Alamat}}</td>
                                </tr>
                                <tr>
                                    <td width="297" height="25">Telp / HP</td>
                                    <td width="99">:</td>
                                    <td width="207">{{$student->Telepon}}</td>
                                </tr>
                                <tr>
                                    <td width="297" height="25">Email</td>
                                    <td width="99">:</td>
                                    <td width="207">{{$student->email}}</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>

                                <tr><td colspan="3"><em>Dengan ini menyatakan adalah benar seorang siswa <b>aktif</b>  SMAS CHARITAS JAKARTA, dengan biodata asal:</em></td></tr>
                                <tr>
                                    <td width="297" height="25">Nama Ayah</td>
                                    <td width="99">:</td>
                                    <td width="207">{{$student->Nama_ayah}}</td>
                                </tr>
                                <tr>
                                    <td width="297" height="25">Nama Ibu</td>
                                    <td width="99">:</td>
                                    <td width="207">{{$student->Nama_ibu}}</td>
                                </tr>
                                <tr>
                                    <td width="297" height="25">Asal Sekolah</td>
                                    <td width="99">:</td>
                                    <td width="207">{{$student->Asal_Sekolah}}</td>
                                </tr>

                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>

                                <tr>
                                    <td valign="top" height="102" colspan="3">

                                        <table width="91%" height="165" align="center">
                                            <tr>
                                                <td width="157" align="left" valign="top">Siswa</td>
                                                <td width="174">&nbsp;</td>
                                                <td width="174">&nbsp;</td>
                                                <td width="279" align="center" valign="top">Disetujui</td>
                                                <td width="142" align="center" valign="top">Diketahui</td>
                                            </tr>
                                            <tr><td>&nbsp;</td></tr>
                                            <tr><td>&nbsp;</td></tr>
                                            <tr><td>&nbsp;</td></tr>
                                            <tr><td>&nbsp;</td></tr>
                                            <tr>
                                                <td height="65" align="left" valign="bottom"><u>{{$student->Nama}}</u></td>
                                                <td align="center" valign="bottom">&nbsp;</td>
                                                <td width="174">&nbsp;</td>
                                                <td width="279" align="center" valign="bottom"><u>Kepala Sekolah</u></td>
                                                <td width="142" align="center" valign="bottom"><u>Wakasek Bid. Kesiswaan</u></td>
                                            </tr>
                                            <tr><td>&nbsp;</td></tr>
                                            <tr><td>&nbsp;</td></tr>
                                        </table>
                                    </td>

                                </tr>
                            </table>
                        </div>
                        <center>
                            <input class="btn btn-link" type="button" value="Print Data PDF" id="btnPrint" />
                        </center>
                    </form>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
        <!-- /.panel -->
    </div>
@endsection

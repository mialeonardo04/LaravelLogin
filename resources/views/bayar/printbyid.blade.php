@extends('layouts.master')
@section('title', 'Bukti Setoran')
@section('sidebar')
    @parent
@endsection
@section('content')
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=600,width=980');
            printWindow.document.write('<html><head><title> Kwitansi Pembayaran </title>');
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

    <div class="panel panel-default">
        <div class="panel-heading">

            <a href="/recordpayments">
                <button type="button" class="btn btn-danger btn-xs">Back</button>
            </a> |

        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <form id="form1">
                    <div id="dvContainer">
                        <table width="63%" height="303" border="0" align="center">
                            <tr>
                                <td height="25" colspan="3" align="center" style="margin-bottom:20px; font-size:18px; font-weight:bold">BUKTI PEMBAYARAN</td>
                            </tr>
                            <tr><td colspan="3">&nbsp;</td></tr>
                            <tr><td colspan="3">&nbsp;</td></tr>
                            <tr><td colspan="3">&nbsp;</td></tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td width="297" height="25">No. Pembayaran</td>
                                <td width="99">:</td>
                                <td width="207">2018/PMWBLJT-ALB/{{ $bayar->ID_Bayar }}</td>
                            </tr>
                            <tr>
                                <td width="297" height="25">Telah terima dari</td>
                                <td width="99">:</td>
                                <td width="207">.........................</td>
                            </tr>
                            <tr>
                                <td width="297" height="25">Pada tanggal</td>
                                <td width="99">:</td>
                                <td width="207">{{ $bayar->Tanggal_bayar }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">____________________________________________________________________________</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3"><em>Untuk keperluan dengan detil sebagai berikut: </em></td>
                            </tr>
                            <tr>
                                <td width="297" height="25">SPP</td>
                                <td width="99">:</td>
                                <td width="207">{{ $bayar->SPP_byr }}</td>
                            </tr>
                            <tr>
                                <td width="297" height="25">Uang Kegiatan</td>
                                <td width="99">:</td>
                                <td width="207">{{ $bayar->Uang_kegiatan_byr }}</td>
                            </tr>
                            <tr>
                                <td width="297" height="25">Uang Buku</td>
                                <td width="99">:</td>
                                <td width="207">{{ $bayar->Uang_buku_byr }}</td>
                            </tr>
                            <tr>
                                <td width="297" height="25">Katering</td>
                                <td width="99">:</td>
                                <td width="207">{{ $bayar->Katering_byr }}</td>
                            </tr>
                            <tr>
                                <td width="297" height="25">Komite</td>
                                <td width="99">:</td>
                                <td width="207">{{ $bayar->Komite_byr }}</td>
                            </tr>
                            <tr>
                                <td width="297" height="25">Seragam</td>
                                <td width="99">:</td>
                                <td width="207">{{ $bayar->Seragam_byr }}</td>
                            </tr>
                            <tr>
                                <td width="297" height="25">Dana Lain</td>
                                <td width="99">:</td>
                                <td width="207">{{ $bayar->Others_byr }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">____________________________________________________________________________</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Total</b></td>
                                <td><b>{{ $totalbayar }}</b></td>
                            </tr>

                            <tr><td colspan="3">&nbsp;</td></tr>
                            <tr><td colspan="3">&nbsp;</td></tr>
                            <tr><td colspan="3">&nbsp;</td></tr>
                            <tr><td colspan="3">&nbsp;</td></tr>

                            <tr>
                                <td valign="top" height="102" colspan="3">

                                    <table width="91%" height="165" align="center">
                                        <tr>
                                            <td width="157" align="left" valign="top"></td>
                                            <td width="174">&nbsp;</td>
                                            <td width="174">&nbsp;</td>
                                            <td width="279" align="center" valign="top"></td>
                                            <td width="142" align="center" valign="top">Penerima</td>
                                        </tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr><td>&nbsp;</td></tr>
                                        <tr>
                                            <td height="65" align="left" valign="bottom"><u></u></td>
                                            <td align="center" valign="bottom">&nbsp;</td>
                                            <td width="174">&nbsp;</td>
                                            <td width="279" align="center" valign="bottom"><u></u></td>
                                            <td width="142" align="center" valign="bottom"><u>Teller Admin</u></td>
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
                <center>
                    <button class="btn btn-link" data-toggle="modal" data-target="#myModal">
                        Preview
                    </button>
                </center>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Preview PDF</h4>
                            </div>
                            <div class="modal-body">
                                <table width="63%" height="303" border="0" align="center">
                                    <tr>
                                        <td height="25" colspan="3" align="center" style="margin-bottom:20px; font-size:18px; font-weight:bold">BUKTI PEMBAYARAN</td>
                                    </tr>
                                    <tr><td colspan="3">&nbsp;</td></tr>
                                    <tr><td colspan="3">&nbsp;</td></tr>
                                    <tr><td colspan="3">&nbsp;</td></tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="297" height="25">No. Pembayaran</td>
                                        <td width="99">:</td>
                                        <td width="207">2018/PMWBLJT-ALB/{{ $bayar->ID_Bayar }}</td>
                                    </tr>
                                    <tr>
                                        <td width="297" height="25">Telah terima dari</td>
                                        <td width="99">:</td>
                                        <td width="207">.........................</td>
                                    </tr>
                                    <tr>
                                        <td width="297" height="25">Pada tanggal</td>
                                        <td width="99">:</td>
                                        <td width="207">{{ $bayar->Tanggal_bayar }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">____________________________________________________________________________</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><em>Untuk keperluan dengan detil sebagai berikut: </em></td>
                                    </tr>
                                    <tr>
                                        <td width="297" height="25">SPP</td>
                                        <td width="99">:</td>
                                        <td width="207">{{ $bayar->SPP_byr }}</td>
                                    </tr>
                                    <tr>
                                        <td width="297" height="25">Uang Kegiatan</td>
                                        <td width="99">:</td>
                                        <td width="207">{{ $bayar->Uang_kegiatan_byr }}</td>
                                    </tr>
                                    <tr>
                                        <td width="297" height="25">Uang Buku</td>
                                        <td width="99">:</td>
                                        <td width="207">{{ $bayar->Uang_buku_byr }}</td>
                                    </tr>
                                    <tr>
                                        <td width="297" height="25">Katering</td>
                                        <td width="99">:</td>
                                        <td width="207">{{ $bayar->Katering_byr }}</td>
                                    </tr>
                                    <tr>
                                        <td width="297" height="25">Komite</td>
                                        <td width="99">:</td>
                                        <td width="207">{{ $bayar->Komite_byr }}</td>
                                    </tr>
                                    <tr>
                                        <td width="297" height="25">Seragam</td>
                                        <td width="99">:</td>
                                        <td width="207">{{ $bayar->Seragam_byr }}</td>
                                    </tr>
                                    <tr>
                                        <td width="297" height="25">Dana Lain</td>
                                        <td width="99">:</td>
                                        <td width="207">{{ $bayar->Others_byr }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">____________________________________________________________________________</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Total</b></td>
                                        <td><b>{{ $totalbayar }}</b></td>
                                    </tr>

                                    <tr><td colspan="3">&nbsp;</td></tr>
                                    <tr><td colspan="3">&nbsp;</td></tr>
                                    <tr><td colspan="3">&nbsp;</td></tr>
                                    <tr><td colspan="3">&nbsp;</td></tr>

                                    <tr>
                                        <td valign="top" height="102" colspan="3">

                                            <table width="91%" height="165" align="center">
                                                <tr>
                                                    <td width="157" align="left" valign="top"></td>
                                                    <td width="174">&nbsp;</td>
                                                    <td width="174">&nbsp;</td>
                                                    <td width="279" align="center" valign="top"></td>
                                                    <td width="142" align="center" valign="top">Penerima</td>
                                                </tr>
                                                <tr><td>&nbsp;</td></tr>
                                                <tr><td>&nbsp;</td></tr>
                                                <tr><td>&nbsp;</td></tr>
                                                <tr><td>&nbsp;</td></tr>
                                                <tr>
                                                    <td height="65" align="left" valign="bottom"><u></u></td>
                                                    <td align="center" valign="bottom">&nbsp;</td>
                                                    <td width="174">&nbsp;</td>
                                                    <td width="279" align="center" valign="bottom"><u></u></td>
                                                    <td width="142" align="center" valign="bottom"><u>Teller Admin</u></td>
                                                </tr>
                                                <tr><td>&nbsp;</td></tr>
                                                <tr><td>&nbsp;</td></tr>
                                            </table>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
        </div>
    </div>
@endsection
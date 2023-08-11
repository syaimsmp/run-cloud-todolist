<style>
    tr, td {
        padding: 0.5em !important;
    }

    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 0;
        margin: 0 auto;
        font: 14px "Times New Roman";
    }

    .invoice {
        height: 400mm;
        position: relative;
    }

    .invoice-info {
        font-size: 18px;
    }

    @page {
        size: A4;
        margin: 0;
    }

    .page {
        margin: 0;
        width: initial;
        min-height: initial;
        page-break-after: always;
        page-break-before: always;
    }

    @media all and (max-width: 768px) {
        .invoice {
            height: 600mm;
        }

        .page-xs {
            font-size: 10pt !important;
        }

        th, td {
            white-space: nowrap;
        }
    }

    @media print {
        * {
            background: transparent !important;
        }

        /*html, body {*/
        /*    width: 216mm;*/
        /*    height: 279mm;*/
        /*    font: 14px "Times New Roman";*/
        /*}*/

        .invoice {
            height: 343mm;
            position: relative;
        }

        /*.page {*/
        /*    margin: 5px;*/
        /*    border: initial;*/
        /*    border-radius: initial;*/
        /*    width: initial;*/
        /*    min-height: initial;*/
        /*    box-shadow: initial;*/
        /*    background: initial;*/
        /*    page-break-after: always;*/
        /*    page-break-before: always;*/
        /*}*/

    }

</style>
<div class="container-fluid">
    <div class="page">
        <div class="row">
            <div class="col-sm-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- this row will not appear when printing -->
                    <div class="row no-print margin-bottom-15px">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-default float-right" onclick="window.print();">
                                <i class="fas fa-print"></i> Print
                            </button>
                        </div>
                    </div>

                    <!-- Marking row -->

                    <!-- title row -->
                    <div class="row margin-top-10px">
                        <!-- /.col -->
                        <div class="col-sm-12 padding-top-30px">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div style="float: left"><b>Sydney Cake House &lt; &lt; Supplier Ledger by Open Item &gt; &gt;</b></div>
                                    <div style="float: right">Page 1 of 1 </div>
                                    <br>
                                    <div style="float: right"><i>Printed on {{ date("d/m/Y g:i:s a") }}</i></div>
                                </div>
                            </div>
                            <!-- self address row -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <br><br>
                    <!-- item table row  -->
                    <div class="row">
                        <div class="col-sm-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th colspan="7">
                                        <p><b> CODE -> SNAME </b></p>
                                        <p> NAME1  </p>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <th>Transaction</th>
                                    <th>Journal No</th>
                                    <th>Supplier Bill</th>
                                    <th>Transaction</th>
                                    <th style="text-align:right">Credit</th>
                                    <th style="text-align:right">Debit</th>
                                    <th style="text-align:right">Balance</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td></td>
                                    <td>Purchase Name</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align:right">0.00</td>
                                </tr>
                                </tbody>
                            </table>
                            <table id="InvoiceReport" border="1" style="border-collapse: separate;" cellspacing="0" width="100%">
                                <tbody>
                                <tr>
                                    <td scope="col" rowspan="2" class="text-center"> <p> <b>Aging analysis for ShortName </b> </p> </td>
                                    <td scope="col" style="text-align:right" > <b> to_journal_date_detailm5 </b> </td>
                                    <td scope="col" style="text-align:right" > <b> to_journal_date_detailm4 </b> </td>
                                    <td scope="col" style="text-align:right" > <b> $to_journal_date_detailm3 </b> </td>
                                    <td scope="col" style="text-align:right" > <b> $to_journal_date_detailm2 </b> </td>
                                    <td scope="col" style="text-align:right" > <b> $to_journal_date_detailm1 </b> </td>
                                    <td scope="col" style="text-align:right" > <b> $to_journal_date_detail3 </b> </td>
                                </tr>
                                <tr >
                                    <td style="text-align:right"> 0.00 </td>
                                    <td style="text-align:right"> 0.00 </td>
                                    <td style="text-align:right"> 0.00 </td>
                                    <td style="text-align:right"> 0.00 </td>
                                    <td style="text-align:right"> 0.00 </td>
                                    <td style="text-align:right"> 0.00 </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.item table row -->

                    <!-- /.signature row -->
                    <div class="row position-absolute-full-bottom-0 signature">
                        <div class="col-6 text-left"><p><small>1 / 1 </small></p></div>

                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page -->
</div>

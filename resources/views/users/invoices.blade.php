@extends('layouts.header')
@section('content')
<!-- Start Body -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 invoicesMain">
            <!-- Invoices Section -->
            <section class="mt-4 mb-4">
                <div class="invoiceSearchWrapper">
                    <h4 class="font-weight-bold textDark">{{ __('messages.menu.invoices') }}</h4>
                    <div class="form-group has-search mt-2 d-inline-block">
                        <span class="fa fa-search form-control-feedback textDark"></span>
                        <input type="text" class="form-control" placeholder="{{ __('messages.invoices.searchInvoiceNumber') }}">
                    </div>
                    <div class="invoiceCalender d-inline-block backLight p-2">
                        <span class="fa fa-calendar"></span>
                        <span class="dateOne pl-3">{{ __('messages.invoices.july') }} 14, 2019</span>
                        <span class="fa fa-arrows-h pl-3"></span>
                        <span class="dateOne pl-3">{{ __('messages.invoices.july') }} 28, 2019</span>
                        <span class="fa fa-caret-down float-right pt-1"></span>
                    </div>
                    <span class="textDark ml-3"> {{ __('messages.invoices.displaying4OutOf23Results') }}</span>
                </div>

                <div class="invoiceTable">
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-0">
                                    <div class="checkbox-group d-inline-block mr-3 mb-0">
                                        <input type="checkbox" id="invoice1">
                                        <label for="invoice1" class="mb-0"></label>
                                    </div>{{ __('messages.invoices.invoiceNumber') }}
                                </th>
                                <th class="border-0">{{ __('messages.invoices.invoiceTo') }}</th>
                                <th class="border-0">{{ __('messages.invoices.invoiceData') }}</th>
                                <th class="border-0">{{ __('messages.invoices.invoiceAmount') }}</th>
                                <th class="border-0">{{ __('messages.invoices.userName') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr class="border backLight">
                                <td>
                                    <div class="checkbox-group d-inline-block mr-3 mb-0">
                                        <input type="checkbox" id="invoice2">
                                        <label for="invoice2" class="mb-0"></label>
                                    </div>AST00125
                                </td>
                                <td>J&J Transportations Ltd.</td>
                                <td>July 15, 2019</td>
                                <td>$15,450.00</td>
                                <td>Johnson D.</td>
                                <td class="pdf p-0">
                                    <button class="btn btn-default pdfBtn textDark"><span class="fa fa-download pr-1"></span> PDF</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-1"></td>
                            </tr>
                            <tr class="border backLight">
                                <td>
                                    <div class="checkbox-group d-inline-block mr-3 mb-0">
                                        <input type="checkbox" id="invoice3">
                                        <label for="invoice3" class="mb-0"></label>
                                    </div>AST00125
                                </td>
                                <td>J&J Transportations Ltd.</td>
                                <td>July 15, 2019</td>
                                <td>$15,450.00</td>
                                <td>Johnson D.</td>
                                <td class="pdf p-0">
                                    <button class="btn btn-default pdfBtn textDark"><span class="fa fa-download pr-1"></span> PDF</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-1"></td>
                            </tr>
                            <tr class="border backLight">
                                <td>
                                    <div class="checkbox-group d-inline-block mr-3 mb-0">
                                        <input type="checkbox" id="invoice4">
                                        <label for="invoice4" class="mb-0"></label>
                                    </div>AST00125
                                </td>
                                <td>J&J Transportations Ltd.</td>
                                <td>July 15, 2019</td>
                                <td>$15,450.00</td>
                                <td>Johnson D.</td>
                                <td class="pdf p-0">
                                    <button class="btn btn-default pdfBtn textDark"><span class="fa fa-download pr-1"></span> PDF</button>
                                </td>
                            </tr> -->
                            <?php
                                $invoices = array();
                                foreach(session('company_info')->resultado->viajes as $val) {
                                    $invoices[] = $val->FotoRemisiones;
                                }
                                foreach($invoices as $val) {
                                    if(!empty($val)) {
                                        echo '<tr class="border backLight">
                                                <td>
                                                    <div class="checkbox-group d-inline-block mr-3 mb-0">
                                                        <input type="checkbox" id="invoice5">
                                                        <label for="invoice5" class="mb-0"></label>
                                                    </div>'.$val[0]->InvoiceNumber.'
                                                </td>
                                                <td>'.$val[0]->InvoiceTo.'</td>
                                                <td>'.$val[0]->InvoiceDate.'</td>
                                                <td></td>
                                                <td>'.$val[0]->UserName.'</td>
                                                <td class="pdf p-0">
                                                    <button class="btn btn-default pdfBtn textDark"><span class="fa fa-download pr-1"></span>'.__('messages.invoices.pdf').'</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-1"></td>
                                            </tr>';
                                    }
                                }
                            ?>
                            <!-- <tr>
                                <td class="p-1"></td>
                            </tr>
                            <tr class="border backLight">
                                <td>
                                    <div class="checkbox-group d-inline-block mr-3 mb-0">
                                        <input type="checkbox" id="invoice5">
                                        <label for="invoice5" class="mb-0"></label>
                                    </div>AST00125
                                </td>
                                <td>J&J Transportations Ltd.</td>
                                <td>July 15, 2019</td>
                                <td>$15,450.00</td>
                                <td>Johnson D.</td>
                                <td class="pdf p-0">
                                    <button class="btn btn-default pdfBtn textDark"><span class="fa fa-download pr-1"></span> PDF</button>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>
</div>

<script>
$(document).ready(function() {
    $("body").addClass('backLignt2')
    $('.invoiceTable label').click(function() {
        $(this).closest('tr').toggleClass('backLignt2');
        $(this).closest('tr').find('.pdf button').toggleClass('textPrimary');
    });

    // For navigation bar
    $(".navbar-nav .custom-nav-item:nth-child(4)").css({
        'border-bottom': '3px solid #ff6d00'
    });
    $(".navbar-nav .custom-nav-item:nth-child(4) .nav-link").css({
        'color': '#ff6d00',
    });

    $(".custom-nav-item").click(function() {
        $(".navbar-nav .custom-nav-item").css({
            'border-bottom': '3px solid transparent'
        });
        $(".navbar-nav .custom-nav-item .nav-link").css({
            'color': '#747474',
        });
        $(this).css("border-bottom", "3px solid #ff6d00");
        $(this).find('.custom-nav-item').css("color", "#ff6d00");
    });

    // Set hight of PDF Button
    var pdfBtnHeight = $(".invoiceTable table tr").height();
    $(".pdfBtn").css('height', pdfBtnHeight + 'px');
});
</script>
<!-- {{ print_r(session('company_info')->resultado->viajes) }} -->

@endsection
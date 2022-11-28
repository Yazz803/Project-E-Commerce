<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\InOrder;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function generateInvoicePDF(Checkout $checkout)
    {
        $invoice = PDF::loadview('invoice', [
            'header' => 'SMK Wikrama Bogor',
            'checkout' => $checkout,
            'inOrder' => InOrder::where('user_id', Auth::user()->id)->where('checkout_id', $checkout->id)->get()
        ]);

        return $invoice->download($checkout->id_pemesanan.'_'.$checkout->user->full_name.'.pdf');
    }


    public function generateInvoicePDFAdmin(Checkout $checkout)
    {
        $invoice = PDF::loadview('admin.invoice', [
            'header' => 'SMK Wikrama Bogor',
            'checkout' => $checkout,
            'inOrder' => InOrder::where('user_id', $checkout->user_id)->where('checkout_id', $checkout->id)->get()
        ]);

        return $invoice->download($checkout->id_pemesanan.'_'.$checkout->user->full_name.'.pdf');
    }


}

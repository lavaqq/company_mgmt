<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;

class GenInvoiceController extends Controller
{

    public static function test()
    {
        $invoice = Invoice::all()->first();
        $data = [
            'invoice_number' => $invoice->invoice_number,
            'vcs' => $invoice->vcs,
            'issue_date' => $invoice->issue_date,
            'due_date' => $invoice->due_date,
            'tax_rate' => $invoice->tax_rate,
            'invoice_items' => $invoice->invoiceItems,
            'invoice_discounts' => $invoice->invoiceDiscounts,
            'get_total_excl_tax' => $invoice->getTotalExclTax(),
            'get_total_incl_tax' => $invoice->getTotalInclTax(),
            'get_total_tax' => $invoice->getTotalTax(),
            'name' => $invoice->company->name,
            'legal_form' => $invoice->company->legal_form,
            'vat_number' => $invoice->company->vat_number,
            'street' => $invoice->company->street,
            'number' => $invoice->company->number,
            'box' => $invoice->company->box,
            'city' => $invoice->company->city,
            'zipcode' => $invoice->company->zipcode,
            'country' => $invoice->company->country,
        ];
        return view('pdf.invoice', $data)->render();
    }

    public static function view()
    {
        $invoice = Invoice::all()->first();
        $data = [
            'invoice_number' => $invoice->invoice_number,
            'vcs' => $invoice->vcs,
            'issue_date' => $invoice->issue_date,
            'due_date' => $invoice->due_date,
            'tax_rate' => $invoice->tax_rate,
            'invoice_items' => $invoice->invoiceItems,
            'invoice_discounts' => $invoice->invoiceDiscounts,
            'get_total_excl_tax' => $invoice->getTotalExclTax(),
            'get_total_incl_tax' => $invoice->getTotalInclTax(),
            'get_total_tax' => $invoice->getTotalTax(),
            'name' => $invoice->company->name,
            'legal_form' => $invoice->company->legal_form,
            'vat_number' => $invoice->company->vat_number,
            'street' => $invoice->company->street,
            'number' => $invoice->company->number,
            'box' => $invoice->company->box,
            'city' => $invoice->company->city,
            'zipcode' => $invoice->company->zipcode,
            'country' => $invoice->company->country,
        ];
        $html = view('pdf.invoice', $data)->render();
        $tmp = sys_get_temp_dir();
        $dompdf = new Dompdf([
            'logOutputFile' => '',
            'isRemoteEnabled' => true,
            'fontDir' => $tmp,
            'fontCache' => $tmp,
            'tempDir' => $tmp,
            'chroot' => $tmp,
        ]);
        $dompdf->loadHtml($html);
        $dompdf->render();
        return $dompdf->stream('test.pdf', [
            'compress' => true,
            'Attachment' => false,
        ]);
    }

    public static function download()
    {
        $data = [
            'title' => 'My PDF Document',
            'content' => 'This is the content of my PDF document.'
        ];
        $pdf = Pdf::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');
    }
}

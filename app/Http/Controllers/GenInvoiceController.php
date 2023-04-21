<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Dompdf\Dompdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenInvoiceController extends Controller
{

    public static function test()
    {
        return self::genQRCode();
    }

    public static function genQRCode()
    {
        return QrCode::generate('
        BCD
        002
        1
        SCT
        PCHQBEBB
        service T.V.A.-Recettes
        BE22679200300047
        EUR3415.80
        +++079/5704/36172+++
        ');
    }

    public static function view($id)
    {
        $invoice = Invoice::find($id);
        $data = [
            'invoice_number' => $invoice->invoice_number,
            'vcs' => $invoice->vcs,
            'issue_date' => date('d/m/Y', strtotime($invoice->issue_date)),
            'due_date' => date('d/m/Y', strtotime($invoice->due_date)),
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
            'qrcode' => self::genQRCode($invoice),
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
        return $dompdf->stream(filename: $data['invoice_number'], options: [
            'compress' => true,
            'Attachment' => false,
        ]);
    }
}

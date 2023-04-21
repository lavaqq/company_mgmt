<?php

namespace App\Console\Commands;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\ReccurringInvoice;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateReccurringInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-reccurring-invoices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $reccurringInvoices = ReccurringInvoice::scopeActive();
        foreach ($reccurringInvoices as $reccurringInvoice) {
            if ($reccurringInvoice->needsToCreateInvoice()) {
                $invoice = new Invoice([
                    'reccurring_invoice_id' => $reccurringInvoice->id,
                    'company_id' => $reccurringInvoice->company_id,
                    'invoice_number' => Invoice::genInvoiceNum(),
                    'vcs' => Invoice::genVCS(),
                    'issue_date' => Carbon::now(),
                    'due_date' => Carbon::now()->addMonth(1),
                    'tax_rate' => $reccurringInvoice->tax_rate
                ]);
                $invoice->save();
                foreach ($reccurringInvoice->reccurringInvoiceItems as $reccurringInvoiceItem) {
                    $invoiceItem = new InvoiceItem([
                        'invoice_id' => $invoice->id,
                        'description' => $reccurringInvoiceItem->description,
                        'amount' => $reccurringInvoiceItem->amount,
                    ]);
                    $invoiceItem->save();
                }
            }
        }
    }
}

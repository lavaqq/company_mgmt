<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('reccurring_invoice_id')->nullable();
            $table->string('invoice_number');
            $table->string('vcs')->nullable();
            $table->date('issue_date');
            $table->date('due_date');
            $table->decimal('tax_rate', 10, 2);
            // $table->enum('status', ['draft', 'pending', 'paid']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

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
        Schema::create('received_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->string('reference')->nullable();
            $table->date('issue_date');
            $table->date('due_date');
            $table->decimal('tax_rate', 10, 2);
            $table->decimal('total_excl_tax', 10, 2);
            $table->decimal('total_incl_tax', 10, 2);
            $table->enum('status', ['paid', 'unpaid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('received_invoices');
    }
};

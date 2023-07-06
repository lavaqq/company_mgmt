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
            $table->date('issue_date');
            $table->decimal('total_excl_vat', 10, 2)->nullable();
            $table->decimal('tax', 10, 2)->nullable();
            $table->string('file');
            $table->boolean('in_falco')->default(false);
            $table->softDeletes();
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

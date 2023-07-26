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
        Schema::create('company_invoicing_and_contracting_informations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->enum('legal_form', []); // TODO: need to fill enum
            $table->string('vat_number');
            $table->enum('vat_country_code', []); // TODO: need to fill enum
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_invoicing_and_contracting_informations');
    }
};

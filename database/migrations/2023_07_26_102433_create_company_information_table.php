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
        Schema::create('company_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->enum('legal_form', [
                'SA',
                'SAS',
                'SNC',
                'SCS',
                'SCOP',
                'SCM',
                'SELARL',
                'SCI',
                'EURL',
                'SASU',
                'SEP',
                'SELAS',
                'SELAFA',
                'SEM',
                'SCA',
                'SRL',
                'SARL',
                'SPRL',
                'INDEPENDENT',
            ]);
            $table->string('vat_number');
            $table->enum('vat_country_code', [
                'AT',
                'BE',
                'BG',
                'CY',
                'CZ',
                'DE',
                'DK',
                'EE',
                'EL',
                'ES',
                'FI',
                'FR',
                'HR',
                'HU',
                'IE',
                'IT',
                'LT',
                'LU',
                'LV',
                'MT',
                'NL',
                'PL',
                'PT',
                'RO',
                'SE',
                'SI',
                'SK',
                'XI',
            ]);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_information');
    }
};

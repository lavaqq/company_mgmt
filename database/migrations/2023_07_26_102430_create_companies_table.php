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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
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
            ])->nullable();
            $table->string('vat_number')->nullable();
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
            ])->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('box')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->enum('country', [
                'germany',
                'austria',
                'belgium',
                'bulgaria',
                'cyprus',
                'croatia',
                'denmark',
                'spain',
                'estonia',
                'finland',
                'france',
                'greece',
                'hungary',
                'ireland',
                'italy',
                'latvia',
                'lithuania',
                'luxembourg',
                'malta',
                'netherlands',
                'poland',
                'portugal',
                'romania',
                'slovakia',
                'slovenia',
                'sweden',
                'czech_republic',
            ])->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

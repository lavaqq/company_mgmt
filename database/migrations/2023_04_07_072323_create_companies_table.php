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
            $table->string('legal_form');
            $table->string('vat_number');
            $table->string('street');
            $table->string('number');
            $table->string('box')->nullable();
            $table->string('city');
            $table->string('zipcode');
            $table->enum('country', [
                'Allemagne',
                'Autriche',
                'Belgique',
                'Bulgarie',
                'Chypre',
                'Croatie',
                'Danemark',
                'Espagne',
                'Estonie',
                'Finlande',
                'France',
                'Grèce',
                'Hongrie',
                'Irlande',
                'Italie',
                'Lettonie',
                'Lituanie',
                'Luxembourg',
                'Malte',
                'Pays-Bas',
                'Pologne',
                'Portugal',
                'Roumanie',
                'Slovaquie',
                'Slovénie',
                'Suède',
                'Tchéquie',
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
        Schema::dropIfExists('companies');
    }
};

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
            $table->string('name');
            $table->string('legal_form')->nullable();
            $table->string('vat_number')->nullable(); // enum
            $table->string('vat_country_code')->nullable(); // enum
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('box')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable(); // enum
            $table->string('reference');
            $table->string('vcs')->nullable();
            $table->decimal('tax_rate', 10, 2);
            $table->date('issue_date');
            $table->date('due_date');
            $table->foreignId('attachment_path')->nullable();
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

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
            $table->foreignId('company_id');
            $table->string('reference');
            $table->string('vcs')->nullable();
            $table->decimal('tax_rate', 10, 2);
            $table->date('issue_date');
            $table->date('due_date');
            $table->enum('status', []); // TODO: need to fill enum
            $table->foreignId('attachment_id')->nullable();
            $table->boolean('in_accounting_software')->default(false);
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

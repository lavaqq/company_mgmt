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
            $table->foreignId('deal_id');
            $table->string('reference');
            $table->string('vcs')
                ->nullable();
            $table->decimal('tax_rate', 10, 2);
            $table->date('issue_date');
            $table->date('due_date');
            $table->enum('status', [
                'creation',
                'pending',
                'paid',
                'cancelled',
            ])->default('creation');
            $table->string('external_invoice')->nullable();
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

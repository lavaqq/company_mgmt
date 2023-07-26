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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id');
            $table->foreignId('company_id');
            $table->string('title');
            $table->enum('status', []); // TODO: need to fill enum
            $table->decimal('deal_value', 10, 2)->default(0);
            $table->decimal('actual_deal_value', 10, 2)->default(0);
            $table->date('start_date');
            $table->date('signature_date')->nullable();
            $table->longText('note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};

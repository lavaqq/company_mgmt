<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('estimates', function (Blueprint $table) {
            $table->renameColumn('no_prepayment', 'prepayment');
        });

        DB::table('estimates')->update([
            'prepayment' => DB::raw('NOT prepayment'),
        ]);
    }

    public function down()
    {
        Schema::table('estimates', function (Blueprint $table) {
            $table->renameColumn('prepayment', 'no_prepayment');
        });

        DB::table('estimates')->update([
            'no_prepayment' => DB::raw('NOT no_prepayment'),
        ]);
    }
};

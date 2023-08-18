<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_bids', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->integer('price');
            $table->string('user_id');
            $table->string('good_id');
        });

        Schema::table('table_bids', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('table_user');
            $table->foreign('good_id')->references('id')->on('table_goods');
        });

        Schema::table('table_goods', function (Blueprint $table) {
            $table->string('bid_id')->nullable();
        });

        Schema::table('table_goods', function (Blueprint $table) {
            $table->foreign('bid_id')->references('id')->on('table_bids');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_bids');
    }
};

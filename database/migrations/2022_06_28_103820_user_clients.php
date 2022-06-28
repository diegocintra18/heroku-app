<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userClients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('client_id')->constrained('clients');
            $table->timestamps();
        });

        DB::table('userClients')->insert([
            'user_id' => 1,
            'client_id' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userClients', function (Blueprint $table) {
            $table->foreignId('user_id')
            ->onDelete('cascade');
        });

        Schema::table('userClients', function (Blueprint $table) {
            $table->foreignId('client_id')
            ->onDelete('cascade');
        });
    }
};

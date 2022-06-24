<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('zendesk', function (Blueprint $table) {
            $table->id();
            $table->string('domain');
            $table->string('user_email');
            $table->string('password');
            $table->foreignId('client_id')->constrained('clients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zendesk', function (Blueprint $table) {
            $table->foreignId('client_id')
            ->onDelete('cascade');
        });

        Schema::dropIfExists('zendesk');
    }
};

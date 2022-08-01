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
        Schema::create('billing', function (Blueprint $table) {
            $table->id();
            $table->float('amount');
            $table->string('transaction_hash');
            $table->timestamps('expiration_date');
            $table->string('transaction_id');
            $table->integer('status')->default(0);
            $table->timestamps('payment_date');
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
        Schema::table('billing', function (Blueprint $table) {
            $table->foreignId('client_id')
            ->onDelete('cascade');
        });
        
        Schema::dropIfExists('billings');
    }
};

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
            $table->date('expiration_date');
            $table->string('transaction_id')->default(0);
            $table->integer('status')->default(0);
            $table->date('payment_date')->default('2000-01-01');
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

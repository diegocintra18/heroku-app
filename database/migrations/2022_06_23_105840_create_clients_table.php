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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cnpj');
            $table->string('email');
            $table->string('phone');
            $table->string('address_name');
            $table->string('address_number');
            $table->string('state');
            $table->string('zipcode');
            $table->timestamps();
        });

        DB::table('clients')->insert([
            'name' => 'Cliente Exemplo',
            'cnpj' => '367715710001/77',
            'email' => 'diego@email.com',
            'phone' => '16991353306',
            'address_name' => 'Rua de exemplo',
            'address_number' => '123',
            'state' => 'SP',
            'zipcode' => '14403450'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};

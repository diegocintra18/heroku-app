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
        Schema::create('zendesk_rules', function (Blueprint $table) {
            $table->id();
            $table->string('zendesk_visualization_id');
            $table->string('zendesk_visualization_name');
            $table->integer('rule_type')->default(1);
            $table->string('zendesk_formula')->default(0);
            $table->integer('green_range')->default(0);
            $table->integer('yellow_range')->default(0);
            $table->integer('order')->default(0);
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
        Schema::table('zendesk_rules', function (Blueprint $table) {
            $table->foreignId('client_id')
            ->onDelete('cascade');
        });

        Schema::dropIfExists('zendesk_rules');
    }
};

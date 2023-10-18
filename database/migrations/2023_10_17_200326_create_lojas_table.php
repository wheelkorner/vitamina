<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLojasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lojas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parceiro_id');
            $table->string('cd_loja', 2)->nullable(false);
            $table->string('cd_pro_negocio', 5)->unique()->nullable(false);
            $table->string('cnpj', 14)->unique()->nullable(false);
            $table->string('razao_social')->nullable(false);
            $table->string('cidade')->nullable(false);
            $table->timestamps();
    
            $table->foreign('parceiro_id')->references('id')->on('parceiros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lojas');
    }
}

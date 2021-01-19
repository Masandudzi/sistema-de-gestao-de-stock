<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialRequisicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_requisicaos', function (Blueprint $table) {
          $table->unsignedBigInteger('material_id');
          $table->unsignedBigInteger('requisicao_id');
          $table->integer('quantidade');
          
          $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
          $table->foreign('requisicao_id')->references('id')->on('requisicaos')->onDelete('cascade');
          $table->timestamps();
          $table->primary(['requisicao_id','material_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_requisicaos');
    }
}

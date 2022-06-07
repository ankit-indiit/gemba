<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGembaUserFormMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gemba_user_form_metas', function (Blueprint $table) {
            $table->id();
            $table->string('meta_key')->nullable();
            $table->longText('meta_value')->nullable();
            $table->integer('gemba_user_meta_id')->nullable();
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
        Schema::dropIfExists('gemba_user_form_metas');
    }
}

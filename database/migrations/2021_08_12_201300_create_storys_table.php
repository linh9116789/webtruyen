<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storys', function (Blueprint $table) {
            $table->id();
            $table->string('sto_name')->nullable();
            $table->string('sto_slug')->index()->unique();
            $table->integer('sto_category_id')->default(0);
            $table->string('sto_avatar')->nullable();
            $table->integer('sto_view')->default(0);
            $table->tinyInteger('sto_hot')->index()->default(0);
            $table->tinyInteger('sto_active')->index()->default(0)->comment('0: đang ra, 1: đã full');
            $table->mediumText('sto_description')->nullable();
            $table->text('sto_content')->nullable();
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
        Schema::dropIfExists('storys');
    }
}

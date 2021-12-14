<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('director');
            $table->string('genre');
            $table->text('synopsis');
            $table->string('year');
            $table->string('userid');
            $table->string('photopath');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::dropIfExists('products');
    }
}

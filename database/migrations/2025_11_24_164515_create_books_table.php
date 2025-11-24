<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('author');
            $table->text('description')->nullable();
            $table->year('year')->nullable();
            $table->string('category')->nullable();
            $table->string('cover_image')->nullable(); // URL de imagen
            $table->integer('quantity')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};

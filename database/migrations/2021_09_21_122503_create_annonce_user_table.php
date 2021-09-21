<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnonceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonce_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('annonce_id')->constrained()->onDelete("cascade");
            $table->foreignId('user_id')->constrained()->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonce_user');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->text('description');
            $table->foreignId('type_id')->nullable()->constrained()->onDelete("SET NULL");
            $table->foreignId('sous_categorie_id')->nullable()->constrained()->onDelete("SET NULL");
            $table->foreignId('user_id')->constrained()->onDelete("CASCADE");
            $table->string("avatar")->default("annonce/avatar.png");
            $table->boolean("active")->default(false);
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
        Schema::dropIfExists('annonces');
    }
}

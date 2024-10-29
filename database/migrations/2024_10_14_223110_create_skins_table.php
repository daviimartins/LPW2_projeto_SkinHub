<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
    {
        Schema::create('skins', function (Blueprint $table) {
            $table->id();
            $table->string("skin_nome");
            $table->string("arma_nome");
            $table->string("raridade");
            $table->decimal("valor", 10, 2);
            $table->string("tipo");
            $table->string("exterior");
            $table->string("url_imagem", 1000);
            $table->boolean("vendido")->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skins');
    }
};

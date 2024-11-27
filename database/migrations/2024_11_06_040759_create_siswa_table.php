<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->string('nama'); 
            $table->string('kelas'); 
            $table->integer('umur'); 
            $table->string('alamat')->nullable(); 
            $table->string('email')->unique(); 
            $table->string('foto')->nullable(); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};

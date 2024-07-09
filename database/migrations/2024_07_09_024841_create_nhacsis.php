<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nhacsis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('anh')->nullable();
            $table->string('quequan');
            $table->date('ngaysinh');
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhacsis');
    }
};
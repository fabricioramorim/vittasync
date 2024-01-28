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
        Schema::create('dependents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('last_name')->unique();
            $table->string('cpf')->unique();
            $table->string('birth_date')->unique();
            $table->string('phone')->unique();
            $table->string('vaccine_id')->unique();
            $table->string('employee_id')->unique();
            $table->string('is_active')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};

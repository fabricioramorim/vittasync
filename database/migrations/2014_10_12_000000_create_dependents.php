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
            $table->id()->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('cpf');
            $table->string('birth_date');
            $table->string('vaccine_id');
            $table->string('vaccin_qtd')->default('0');
            $table->string('unit_id')->nullable();
            $table->string('vaccin_location_id')->default('0');
            $table->string('employee_id');
            $table->string('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependents');
    }
};

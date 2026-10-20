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
        Schema::create('employees', function (Blueprint $table) {
    $table->integer('employee_id')->primary();

    $table->string('first_name', 20)->nullable();

    $table->string('last_name', 25);

    $table->string('email', 100);

    $table->string('phone_number', 20)->nullable();

    $table->date('hire_date');

    $table->integer('job_id')->nullable();

    $table->decimal('salary', 8, 2);

    $table->integer('manager_id')->nullable();

    $table->integer('department_id')->nullable();

    $table->foreign('job_id')
        ->references('job_id')
        ->on('jobs')
        ->restrictOnDelete();

    $table->foreign('manager_id')
        ->references('employee_id')
        ->on('employees')
        ->restrictOnDelete();

    $table->foreign('department_id')
        ->references('department_id')
        ->on('departments')
        ->restrictOnDelete();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

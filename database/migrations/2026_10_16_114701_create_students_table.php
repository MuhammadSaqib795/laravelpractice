<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('students')) {
            Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('city');
                $table->integer('age');
                $table->string('image_path')->nullable();
                // $table->foreignId('book_id')->nullable()->constrained('books')->cascadeOnDelete()->cascadeOnUpdate();
                // $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete()->cascadeOnUpdate();
                $table->timestamps();
            });
        }


        $validationRules = [
            'id' => 'required|integer|unique:students,id|auto_increment|not_null',
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            // 'book_id' => 'nullable|exists:books,id',
            // 'department_id' => 'required|exists:departments,id',
        ];
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

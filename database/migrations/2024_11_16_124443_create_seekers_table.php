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
        Schema::create('seekers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('fname');
            $table->string('lname');
            $table->string('phone');
            $table->string('address');
            $table->text('description');
            $table->string('avatar')->default('default.webp');
            $table->string('jobType');
            $table->string('jobLocation');
            $table->json('skills');
            $table->string('goals');
            $table->timestampsTz();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seekers');

    }
};
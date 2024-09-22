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
        schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('memberId'); // Ensure this matches with your logic// Foreign key column for members
            $table->unsignedBigInteger('bookId');   // Foreign key column for books
            $table->date('reservation_date');
            $table->boolean('status');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('memberId')->references('id')->on('members');
            $table->foreign('bookId')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};

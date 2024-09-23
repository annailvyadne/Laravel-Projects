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
        Schema::create('issues', function (Blueprint $table) {
            $table->bigIncrements('issueId');
            $table->unsignedBigInteger('memberId');
            $table->unsignedBigInteger('bookId');
            $table->date('dueDate');  // Make sure this is included
            $table->date('returnDate')->nullable();
            $table->boolean('status')->default(false);
            $table->decimal('amount', 8, 2)->nullable(); // Nullable if fines are not always applicable
            $table->timestamps();

            $table->foreign('memberId')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('bookId')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};

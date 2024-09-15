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
            $table->id('issueId');
            $table->unsignedBigInteger('memberId');
            $table->unsignedBigInteger('bookId');
            $table->date('due_date');
            $table->date('return_date')->nullable();
            $table->boolean('status')->default(false);
            $table->decimal('amount', 8, 2)->nullable(); // Nullable if fines are not always applicable
            $table->timestamps();

            $table->foreign('memberId')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('bookId')->references('bookId')->on('books')->onDelete('cascade');
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

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
        Schema::create('fines', function (Blueprint $table) {
            $table->id('fineId');
            $table->unsignedBigInteger('memberId'); // Foreign key column for members
            $table->unsignedBigInteger('issueId');  // Foreign key column for issues
            $table->decimal('amount', 8, 2);
            $table->date('paid_date')->nullable();
            $table->string('reason');
            $table->boolean('status')->default(false);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('memberId')->references('id')->on('members');
            $table->foreign('issueId')->references('issueId')->on('issues');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fines');
    }
};

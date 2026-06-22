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
        Schema::create('shifts', function (Blueprint $table) {
           $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->dateTime('shift_start');
            $table->dateTime('shift_end')->nullable();
            $table->decimal('starting_balance', 15, 2)->default(0);
            $table->decimal('ending_balance', 15, 2)->nullable();
            $table->decimal('total_revenue', 15, 2)->default(0);
            $table->integer('total_transactions')->default(0);
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};

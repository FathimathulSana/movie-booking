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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('genre');
            $table->integer('duration'); // minutes
            $table->string('language');
            $table->string('thumbnail');
            $table->foreignId('theater_id')->constrained()->onDelete('cascade');
            $table->date('show_date');
            $table->time('show_time');
            $table->integer('available_seats');
            $table->decimal('ticket_price',8,0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};

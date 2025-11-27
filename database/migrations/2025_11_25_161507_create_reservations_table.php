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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            // Relaciones
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('book_id')->constrained()->onDelete('cascade');

            // Estado de la reserva
            $table->enum('status', ['pendiente', 'aprobada', 'rechazada', 'devuelta'])
                ->default('pendiente');

            // Fechas
            $table->date('start_date');    // Fecha de préstamo
            $table->date('end_date');      // Fecha de devolución
            $table->date('reserved_at')->nullable(); // Fecha en que se hizo la reserva

            // Observaciones
            $table->text('observations')->nullable();

            $table->timestamps();
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

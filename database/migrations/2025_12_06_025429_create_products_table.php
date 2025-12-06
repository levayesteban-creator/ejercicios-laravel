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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincremental
            $table->string('nombre', 100); // Nombre del producto (String, limitado a 100 caracteres)
            $table->text('descripcion')->nullable(); // Descripción larga (Text, puede ser NULL)
            $table->decimal('precio', 8, 2); // Precio (Decimal: 8 dígitos en total, 2 decimales. Un buen estándar en lugar de 10, 2)
            $table->integer('stock')->default(0); // Stock (Integer, por defecto es 0)
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

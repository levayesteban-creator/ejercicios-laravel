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
        Schema::table('products', function (Blueprint $table) {

            // 1. Añadir las columnas de datos
            // ASUMIMOS que 'nombre' ya existe y por eso la omitimos aquí.
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 8, 2);
            $table->integer('stock')->default(0);

            // 2. Añadir la clave foránea (relación con categories)
            $table->foreignId('category_id')
                  ->nullable() // Puede no tener categoría asignada
                  ->constrained('categories') // Relaciona con la tabla 'categories'
                  ->onDelete('set null'); // Si se borra la categoría, el producto se queda sin categoría
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            // 1. Eliminar la clave foránea primero
            // Siempre se debe eliminar la clave foránea antes de eliminar su columna
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');

            // 2. Eliminar las columnas de datos
            $table->dropColumn('descripcion');
            $table->dropColumn('precio');
            $table->dropColumn('stock');
            // NO se elimina 'nombre' aquí, ya que no fue creada en este 'up()'
        });
    }
};

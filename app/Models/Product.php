<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Se mantiene, es buena práctica
use Illuminate\Database\Eloquent\Builder; // Se mantiene, es buena práctica

class Product extends Model
{
    use HasFactory;

    // Aquí aseguramos que category_id esté en el arreglo
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'category_id', // ¡Añadido!
        // 'status', // Si 'status' no está en la base de datos, puedes eliminarlo
    ];

    /**
     * Definición de la relación: Un Producto pertenece a una Categoría.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope para filtrar productos por un precio mínimo.
     * Uso: Product::minPrice(100)->get();
     */
    public function scopeMinPrice(Builder $query, $price): void
    {
        $query->where('precio', '>=', $price);
    }
}

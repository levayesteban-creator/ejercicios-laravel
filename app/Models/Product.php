<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Se mantiene, es buena práctica
use Illuminate\Database\Eloquent\Builder; // Se mantiene, es buena práctica

class Product extends Model
{
    use HasFactory;

    // Se ha actualizado el fillable para incluir 'status'
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'category_id',
        'status', // ¡Campo 'status' agregado!
    ];

    /**
     * Definición de la relación: Un Producto pertenece a una Categoría.
     */
    public function category(): BelongsTo
    {
        // Asegúrate de que Category exista y esté importada o en el mismo namespace
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

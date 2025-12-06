<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'category_id',
        'status',
    ];

    /**

     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**

     */
    public function scopeMinPrice(Builder $query, $price): void
    {
        $query->where('precio', '>=', $price);
    }
}

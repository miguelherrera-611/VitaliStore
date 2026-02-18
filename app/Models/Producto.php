<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo_barras',
        'categoria',
        'precio',
        'stock',
        'stock_minimo',
        'imagen',
        'activo',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'activo' => 'boolean',
    ];

    public function ventaDetalles()
    {
        return $this->hasMany(VentaDetalle::class);
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    public function scopeBajoStock($query)
    {
        return $query->whereRaw('stock <= stock_minimo');
    }

    public function scopeAgotados($query)
    {
        return $query->where('stock', 0);
    }
}

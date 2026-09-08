<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'sku', 'name', 'description', 'barcode', 'category_id',
        'price', 'sale_price', 'sale', 'stock', 'weight',
        'color_id', 'size_id', 'width', 'height', 'length',
        'vat', 'brand_id',
    ];

    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function color(): BelongsTo { return $this->belongsTo(Color::class); }
    public function size(): BelongsTo { return $this->belongsTo(Size::class); }
    public function brand(): BelongsTo { return $this->belongsTo(Brand::class); }
}

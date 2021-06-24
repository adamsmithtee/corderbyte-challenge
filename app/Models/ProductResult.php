<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductResult extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug_title', 'image', 'image_thumbnail', 'product_request_id', 'created_by', 'product_owner'];

    public function productRequest()
    {
        return $this->belongsTo(ProductRequest::class);
    }

    public function photographer()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

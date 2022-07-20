<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;



    protected $guarded = ['id'];

    public function gallery() 
    {
        return $this->hasMany(ProductGalery::class);
    }

    public function details()
    {
        return $this->hasOne(TransactionDetail::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'description',
        'category_id',
    ];
    public function product(){
        return $this->hasMany(products::class,"category_id","id");
    }
    public function category(){
        return $this->hasMany(categories::class,"category_id","id");
    }
}

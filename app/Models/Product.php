<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name','godname','image'];
    // public function category(){
    //     return $this->belongsTo(category::Class,'category_id');
    // }
}

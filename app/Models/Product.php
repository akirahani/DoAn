<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Trademark;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name','quantity','image','price','price_sale','status','description','trademark_id','category_id'];
    public function category(){
        return $this->belongsTo(Category::Class,'category_id');
    }
     public function trademark(){
        return $this->belongsTo(Trademark::Class,'trademark_id');
    }
}

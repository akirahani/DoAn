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
    protected $fillable = ['name','quantity','image','price','price_sale','status','description','trademark_id','category_id','ingredient',
    'color','face_paint','solid_content','proportion','wet_paint_film','dry_paint_film', 'dry_time','complete_dry','surface_dry','theoretical_attrition','paint_next_layer','tool', 'solvent','tutorial'];
    public function category(){
        return $this->belongsTo(Category::Class,'category_id');
    }
     public function trademark(){
        return $this->belongsTo(Trademark::Class,'trademark_id');
    }
}

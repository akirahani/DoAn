<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['id','name','tel','address','receive','note','mail','status','total_price','lydohuy','giohoanthanh','giovanchuyen','hinhthucthanhtoan','sanphamtuvan'];
    public function order_product(){
        return  $this->belongsToMany(Product::class,'order_products','order_id','product_id')->withPivot('quantity');
    }
}

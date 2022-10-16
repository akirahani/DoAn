<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuVan extends Model
{
    use HasFactory;
    protected $table = 'tuvan';
    protected $fillable = ['id','donhang','noidung','khach','sanpham','nguoituvan'];
}

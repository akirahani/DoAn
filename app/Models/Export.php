<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    use HasFactory;
    protected $table = 'exports';
    protected $fillable = ['id','ma','sanpham','noidung','ghichu'];
}

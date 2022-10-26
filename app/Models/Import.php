<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    protected $table = 'imports';
    protected $fillable = ['id','ma','nguoinhap','sanpham','noidung','nhacungcap','tongthu','conlai','ghichu'];
}

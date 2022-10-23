<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongKeChi extends Model
{
    use HasFactory;
    protected $table = 'thongkechi';
    protected $fillable = ['id','nhacungcap','tienchi','ngaychi','phieunhap','thua','thieu'];
}

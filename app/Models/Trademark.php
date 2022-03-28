<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    use HasFactory;
    protected $table = 'trademarks';
    protected $fillable = ['id','name','introduce','logo','img_description','hotline','created_at'];
}

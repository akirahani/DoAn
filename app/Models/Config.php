<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table = 'configs';
    protected $fillable = ['id','name','logo','favicon','address','tel','description','sub_description','facebook','twitter','instagram'];
}

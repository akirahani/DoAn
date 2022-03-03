<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = ['id','name','display_name','updated_at','created_at'];

    public function permission(){
        return $this->belongsToMany(Permission::class,'role_permissions');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
    {
        use HasFactory,Notifiable;
        protected $table = 'admins';
        protected $guarded = 'admin';

        protected $fillable = [
            'id' ,'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
        public function role(){
            return $this->belongsToMany(Role::class,'admin_roles','user_id','role_id');
        }
        public function hasRole($permission){
            $role = $this->role()->get();
            foreach($role as $val){
               $permissions = $val->permission()->get();
               foreach($permissions as $item){
                   if($item->route == $permission ){
                        return true;
                   }
               }
               return false;
            }
        }
    }
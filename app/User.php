<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use Notifiable;
    use \OwenIt\Auditing\Auditable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    /**
    * Checking if the User isSuperAdmin
    *
    * @return void
    */
    public function isSuperAdmin(){
        
        if($this->id == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
    *
    *Roles assign to that user
    *@return 
    */
    public function roles(){
        return $this->belongsToMany(Role::class,'role_users','user_id');
    }

    /**
    *
    *Checking roles has that permission or not
    *@return 
    */
    public function hasAccess(array $permission){
        
        $per_arr = [];

        foreach($this->roles as $role)
        {
            $role_permissions = $role->hasPermission();
            
            foreach($role_permissions as $key=>$value)
            {
              $per_arr[] = ($key); 
            }
        }

        $permission = implode($permission);

        if(in_array($permission,$per_arr))
        {
            return true;
        }
        else
        {
            return false;
        }
      
      
    }
}

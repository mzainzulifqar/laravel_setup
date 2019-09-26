<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Role extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
   

    protected $fillable = ['name','permissions'];

    /**
    *
    *Fetch role permission from function
    *@return 
    */
    public function hasPermission(){
    		
    		return $this->fetchPermissions();
    }

    /**
    *
    *Return permission against specific role
    *@return 
    */
    public function fetchPermissions(){
    		
    		$permissions = json_decode($this->permissions,true);
    		return $permissions;
    }
    
}

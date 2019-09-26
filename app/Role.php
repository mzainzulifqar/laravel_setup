<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model 
{
    use LogsActivity;
    
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
     * Spatie description overriding.
     *
     * @return void
     */
      public function getDescriptionForEvent(string $eventName): string
    {
        return "Role-{$eventName}";
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

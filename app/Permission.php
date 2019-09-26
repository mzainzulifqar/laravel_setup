<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends Model
{
	use LogsActivity;
    //
    protected $fillable = ['name']; 


     /**
     * Spatie description overriding.
     *
     * @return void
     */
      public function getDescriptionForEvent(string $eventName): string
    {
        return "Permission-{$eventName}";
    }
}

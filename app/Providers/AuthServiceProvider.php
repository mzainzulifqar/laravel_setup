<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->permissionPolicie();

        //
    }

    /**
    *
    *Making dynamic gates
    *@return 
    */
    public function permissionPolicie(){
            
            Gate::before(function($user)
            {
                if($user->isSuperAdmin())
                {
                    return true;
                }
            });

            try{
                    $permissions  = Permission::all();
                foreach($permissions as $permission)
                    {

                        Gate::define($permission->name,function($user) use ($permission)
                        {
                            return $user->hasAccess([$permission->name]);
                        });
                    }
                }

            catch(\Exception $e)
            {
                return [];
            }
    
    }
    
}

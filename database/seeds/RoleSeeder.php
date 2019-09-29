<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      activity()->disableLogging();

     $user = User::create(
       	['name'=> 'admin',
       	'password' => bcrypt('secret'),
       	'email' => 'admin@gmail.com',
       ]);


       $admin = Role::create(['name' => 'admin' ,'permissions' => json_encode(
       		 [
       		 	'view-user' => true,
              	'create-user' => true,
              	'delete-user' => true,
              	'update-user' => true,
              	
              	'view-orders' => true,
              	'view-products' => true,
              	'view-category' =>true,
             'create-product' => true,
			 'create-post' => true,

             'view-role' => true,
             'create-role' => true,
             'update-role' => true,
             'delete-role' => true,
             'assign-role' => true,

             'create-permission' => true,
             'update-permission' => true,
             'delete-permission' => true,
             'assign-permission' => true,
         ]


       )]);

         Role::create(['name' => 'user' ,'permissions' => json_encode(
           [
            'view-user' => true,
                'create-user' => true,
                'delete-user' => true,
                'update-user' => true,
                
         ]


       )]);

         $user->roles()->attach($admin->id);
         
         activity()->enableLogging();
    }
}

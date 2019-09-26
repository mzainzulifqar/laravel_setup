<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $permissions = [

    		['name' => 'create-user','created_at' => now()],
    		['name' => 'delete-user','created_at' => now()],
    		['name' => 'update-user','created_at' => now()],
    		['name' => 'view-user' ,'created_at' => now()],
            
    		['name' => 'view-orders','created_at' => now()],
    		['name' => 'create-post','created_at' => now()],

    
            ['name' => 'view-role','created_at' => now()],
            ['name' => 'create-role','created_at' => now()],
            ['name' => 'update-role','created_at' => now()],
            ['name' => 'delete-role','created_at' => now()],
            ['name' => 'assign-role','created_at' => now()],

            ['name' => 'view-permission','created_at' => now()],
            ['name' => 'create-permission','created_at' => now()],
            ['name' => 'update-permission','created_at' => now()],
            ['name' => 'delete-permission','created_at' => now()],

            ['name' => 'view-category','created_at' => now()],
            ['name' => 'create-category','created_at' => now()],
            ['name' => 'update-category','created_at' => now()],
            ['name' => 'delete-category','created_at' => now()],
            
            ['name' => 'view-brand','created_at' => now()],
            ['name' => 'create-brand','created_at' => now()],
            ['name' => 'update-brand','created_at' => now()],
            ['name' => 'delete-brand','created_at' => now()],

            ['name' => 'view-product','created_at' => now()],
            ['name' => 'create-product','created_at' => now()],
            ['name' => 'update-product','created_at' => now()],
            ['name' => 'delete-product','created_at' => now()],
            

            ['name' => 'view-customer','created_at' => now()],
            ['name' => 'create-customer','created_at' => now()],
            ['name' => 'update-customer','created_at' => now()],
            ['name' => 'delete-customer','created_at' => now()],
            ['name' => 'view-customer-orders','created_at' => now()],

            ['name' => 'view-order','created_at' => now()],
            ['name' => 'create-order','created_at' => now()],
            ['name' => 'update-order','created_at' => now()],
            ['name' => 'delete-order','created_at' => now()],
            
    		


    	];

        DB::table('permissions')->insert($permissions);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
Use App\Models\Role;
Use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ROLE USER
         */
        $ownerRole = new Role();
        $ownerRole->name = 'owner';
        $ownerRole->display_name = 'Owner';
        $ownerRole->save();
        
        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->display_name = 'Admin';
        $adminRole->save();
        
        $userRole = new Role();
        $userRole->name = 'user';
        $userRole->display_name = 'User';
        $userRole->save();
        
        /**
         * DATA USER
         */
        $a = new User();
        $a->name = 'owner';
        $a->email = 'owner@sample.com';
        $a->phone = '088877';
        $a->password = Hash::make('owner123');
        $a->save();
        $a->attachRole($ownerRole);
        
        $b = new User();
        $b->name = 'admin';
        $b->email = 'admin@sample.com';
        $b->phone = '0877';
        $b->password = Hash::make('admin123');
        $b->save();
        $b->attachRole($adminRole);
        
        
    }
}

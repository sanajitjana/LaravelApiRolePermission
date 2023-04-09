<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //create new admin user
        $admin = User::create([
            'name' => 'Master Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        //create new user
        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('password')
        ]);



        //create new permissions
        $user_list = Permission::create(['name' => 'users.list']);
        $user_view = Permission::create(['name' => 'users.view']);
        $user_create = Permission::create(['name' => 'users.create']);
        $user_update = Permission::create(['name' => 'users.update']);
        $user_delete = Permission::create(['name' => 'users.delete']);

        //create new roles
        $admin_role = Role::create(['name' => 'admin']);
        $user_role = Role::create(['name' => 'user']);




        //give permissions to admin role
        $admin_role->givePermissionTo([
            $user_list,
            $user_view,
            $user_create,
            $user_update,
            $user_delete
        ]);

        //give permissions to user role
        $user_role->givePermissionTo([
            $user_list,
        ]);




        //assign role to admin user
        $admin->assignRole($admin_role);

        //assign role to user
        $user->assignRole($user_role);





        //give permission to admin user directly
        $admin->givePermissionTo([
            $user_list,
            $user_view,
            $user_create,
            $user_update,
            $user_delete
        ]);

        //give permission to user directly
        $user->givePermissionTo([
            $user_list
        ]);
    }
}

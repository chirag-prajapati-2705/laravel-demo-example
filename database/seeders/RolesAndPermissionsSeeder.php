<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [
            'menu-list',
            'menu-create',
            'menu-edit',
            'menu-delete',
         ];
      
         foreach ($permissions as $permission) {
            permission::create(['name' => $permission]);

         }

         $user = User::create([
            'name' => 'superadmin user', 
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123456')
        ]);


        $role = Role::create(['name' => 'superadmin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
    
        $user->assignRole([$role->id]);
        
    }
}

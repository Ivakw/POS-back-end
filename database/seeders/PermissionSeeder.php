<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();

        $permissions = [
            ['name'=>'edit-category','description'=>'edit-category'],
            ['name'=>'view_users','description'=>'view_users'],
            ['name'=>'delete_user','description'=>'delete_user'],
            ['name'=>'create_user','description'=>'create_user'],
            ['name'=>'show_user','description'=>'show_user'],
            ['name'=>'create_role','description'=>'create_role'],
            ['name'=>'assign_role','description'=>'assign_role'],
        ];

        foreach ($permissions as $key => $permission) {
            Permission::create($permission);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

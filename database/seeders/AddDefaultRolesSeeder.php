<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AddDefaultRolesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {

            echo "Assigning Roles.... \n";

            $users = User::all();

            //Create Admin, Employee role as defaults.
            $adminRole = Role::create([
                'name' => 'admin'
            ]);

            $employeeRole = Role::create([
                'name' => 'employee'
            ]);

            echo "Created Admin and Employee Roles....\n";

            //create permissions for admin and employee

            echo "Creating Permissions....\n";
            $permissions = $this->getPermissions();
            foreach ($permissions as $module => $actions) {
                foreach ($actions as $action) {
                    $permission = Permission::create([
                        'name' => Str::slug($module . " " . $action)
                    ]);

                    echo "Permission: " . $permission->name . " created successfully \n";

                    $adminRole->givePermissionTo($permission);

                    echo "Permission: " . $permission->name . " assigned to " . $adminRole->name . "\n";
                }
            }


            foreach ($users as $user) {
                $user->assignRole('admin');
            }

            echo "All Users assigned admin role \n";

        } catch (\Throwable $e) {
            dd($e);
        }
    }

    public function getPermissions()
    {
        return [
            'categories'    => [
                'view',
                'add',
                'update',
                'delete'
            ],
            'banner-images' => [
                'view',
                'add',
                'update',
                'delete'
            ],
            'customers'     => [
                'view',
                'add',
                'update',
                'delete'
            ],
            'brands'        => [
                'view',
                'add',
                'update',
                'delete'
            ],
            'products'      => [
                'view',
                'add',
                'update',
                'delete'
            ],
            'orders'        => [
                'view',
                'add',
                'update',
                'delete'
            ],
            'order-report'  => [
                'view'
            ],
            'promo'         => [
                'view',
                'add',
                'update',
                'delete'
            ],
            'shipping'      => [
                'view',
                'add',
                'update',
                'delete'
            ],
            'pages'         => [
                'view',
                'add',
                'update',
                'delete'
            ],
            'subscriber'    => [
                'view',
                'add',
                'update',
                'delete'
            ],
           
            'manage'    => [
                'users'
            ],
        ];
    }
}


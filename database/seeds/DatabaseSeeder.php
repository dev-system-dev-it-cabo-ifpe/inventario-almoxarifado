<?php

use Illuminate\Database\Seeder;
/* 
use StocksTableSeeder;
 */

 
/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            TeamsTableSeeder::class,
            AssetsTableSeeder::class,
            StocksTableSeeder::class,
        ]);

    }
}

<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'gamaliel',
            'password' => Hash::make('jhickeren-v'),
            'role'     => 'SUPERADMIN',
            'Key'      => env('SUPERADMIN_ROLE_KEY'),
        ]);

        User::create([
            'username' => 'marvell',
            'password' => Hash::make('marvellous321'),
            'role'     => 'ADMIN',
            'Key'      => env('ADMIN_ROLE_KEY'),
        ]);

        User::create([
            'username' => 'zulfan',
            'password' => Hash::make('djoel456'),
            'role'     => 'ADMIN',
            'Key'      => env('ADMIN_ROLE_KEY'),
        ]);

        User::create([
            'username' => 'bahrudin',
            'password' => Hash::make('nauvaldykeren'),
            'role'     => 'ADMIN',
            'Key'      => env('ADMIN_ROLE_KEY'),
        ]);

        User::create([
            'username' => 'agniya',
            'password' => Hash::make('agniya4892'),
            'role'     => 'ADMIN',
            'Key'      => env('ADMIN_ROLE_KEY'),
        ]);
    }
}

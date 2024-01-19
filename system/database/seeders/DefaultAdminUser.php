<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class DefaultAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminUser::create(
            [
                'name' => 'superadmin',
                'uuid' => Str::uuid(),
                'email' => 'admin@squarebx.com',
                'status' => 2,
                'password' => Hash::make('password'),
            ]
        );
    }
}

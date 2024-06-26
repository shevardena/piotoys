<?php

namespace Database\Seeders;

use App\Models\BackendUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BackendUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'first_name' => 'Pio',
                'last_name' => 'Toys',
                'login' => 'pio',
                'password' => Hash::make('PioPio9Fut!#'),
                'email' => 'mail@example.com',
                'super_admin' => true,
            ],
        ];

        BackendUser::insert($data);
    }
}

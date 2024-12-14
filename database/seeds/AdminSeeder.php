<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'user_code' => 20001,
                'name' => 'admin1',
                'email' => 'admin1@gmail.com',
                // 'password' => Hash::make('12345'), // It's better to hash passwords
                'password' => '12345', // It's better to test with this password
                'phone' => '09123456789',
                'date_of_birth' => '1990-11-1',
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Beauty Salon',
                'email' => 'jimmy@mail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'email_verified_at' => Carbon::now(),
            ],
        ]);
    }
}

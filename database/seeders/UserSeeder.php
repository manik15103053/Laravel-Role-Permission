<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','admin@gmail.com')->first();
        if (is_null($user)) {
            User::create([
                'name' => 'Moshiur Rahman',
                'email' => 'admin@gamil.com',
                'password' => Hash::make('123456')
            ]);
        }

    }
}

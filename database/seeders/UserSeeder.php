<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// importo Hash per la password
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
        //autenticazione admin
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@mail.com';
        $user->password = Hash::make('password');
        $user->save();

    }
}

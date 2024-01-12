<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Alejandro',
            'email' => 'alejmendez.87@gmail.com',
            'password' => Hash::make('1234qwer'),
            'dni' => '26.604.667-7',
            'avatar' => null,
            'last_name' => 'Méndez',
            'phone' => '+56 9 68005128',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Fernando',
            'email' => 'fud@undo.cl',
            'password' => Hash::make('1234qwer'),
            'dni' => '30.052.194-0',
            'avatar' => null,
            'last_name' => 'Undurraga',
            'phone' => null,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Cristian',
            'email' => 'cristiancorreac@gmail.com',
            'password' => Hash::make('1234qwer'),
            'dni' => '30.335.289-9',
            'avatar' => null,
            'last_name' => 'Correa',
            'phone' => null,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Maria',
            'email' => 'camporamaria@gmail.com',
            'password' => Hash::make('1234qwer'),
            'dni' => '36.399.118-1',
            'avatar' => null,
            'last_name' => 'Campora',
            'phone' => null,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::find(1)->assignRole('Super Admin');
    }
}

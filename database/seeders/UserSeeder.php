<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Alejandro',
            'email' => 'alejmendez.87@gmail.com',
            'password' => Hash::make('1234qwer'),
            'dni' => '26.604.667-7',
            'avatar' => '',
            'last_name' => 'Méndez',
            'phone' => '+56 9 68005128',
        ]);

        User::find(1)->assignRole('Super Admin');
    }
}

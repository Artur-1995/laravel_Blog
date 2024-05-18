<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
        ->hasPosts(3)
        ->create(['name' => 'admin',
        'email' => 'admin@example.com',
        'password' => password_hash('1111', PASSWORD_DEFAULT) ,
    ]);
    for ($i = 0; $i < 10; $i++) {
        $name = "user_" . $i; //Str::random(3);
        $array = 
        [
            'name' => "user_".Str::random(3),
            'email' => $name.'@example.com',
            'password' => Hash::make('1111'),
        ];

        DB::table('users')->insert($array);
    }
    // public function run(): void
    // {
        // User::factory()
        //         ->count(10)
        //         // ->hasPosts(1)
        //         ->has(Post::factory()->count(3))
        //         ->create();
    // }
}
}
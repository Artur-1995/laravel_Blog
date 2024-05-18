<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\User;
use App\Models\Menu;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
        ]);
       
        Menu::factory()
        ->count(2)
        ->state(new Sequence(
            ['name' => 'Посты'],
            ['name' => 'Добавить'],
        ))->state(new Sequence(
            ['path' => '/posts'],
            ['path' => '/user/post/create'],
        ))
        ->state(new Sequence(
            ['sort' => '1'],
            ['sort' => '2'],
        ))
        ->create();
    }
}

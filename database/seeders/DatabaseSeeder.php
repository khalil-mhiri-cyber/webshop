<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    Product::factory(4)
    ->hasVariants(5)
    ->has(
        Image::factory(3)
            ->sequence(fn (Sequence $sequence) => ['featured' => $sequence->index === 0]),
        'images'
    )
    ->create();
    User::factory()->create([
        'email'=>'mhiri.khalil@gmail.com',
        'password' => bcrypt('password')
    ]);
    }
}

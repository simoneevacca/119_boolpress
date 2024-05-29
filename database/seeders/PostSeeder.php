<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        
        for ($i=0; $i < 10; $i++) { 
            $newPost = new Post();
            $newPost->title = $faker->sentence(3, true);
            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->content = $faker->text(300);
            $newPost->image = $faker->imageUrl(300, 300, 'jpg');
            $newPost->save();
        }
        
    }
}

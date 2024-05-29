<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['coding', 'deploy', 'front-end', 'back-end', 'full-stack'];

        foreach($categories as $category){
            $newCat = new Category();
            $newCat->name = $category;
            $newCat->slug = Str::slug($newCat->name, '-');
            $newCat->save();

        }
    }
}

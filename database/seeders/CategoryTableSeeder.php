<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryData = [
            [
                'category_name' => 'bag',
            ],
            ['category_name' => 'shoes',
            ]
        ];

        foreach ($categoryData as $cat) {
            Category::create($cat);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Homme',
                'slug' => 'homme',
                'description' => 'T-shirts pour homme : coupe classique, oversize et fit.',
                'image' => 'https://images.unsplash.com/photo-1581655353564-df123a1eb820?w=800&q=80',
            ],
            [
                'name' => 'Femme',
                'slug' => 'femme',
                'description' => 'T-shirts pour femme : coupe cintrée, crop top et oversize.',
                'image' => 'https://images.unsplash.com/photo-1554568218-0f1715e72254?w=800&q=80',
            ],
            [
                'name' => 'Enfant',
                'slug' => 'enfant',
                'description' => 'T-shirts pour enfants : confort et fun pour les petits.',
                'image' => 'https://images.unsplash.com/photo-1518831959646-742c3a14ebf7?w=800&q=80',
            ],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
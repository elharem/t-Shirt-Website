<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // HOMME
            [
                'category' => 'homme',
                'name' => 'Tee Essentiel Noir',
                'description' => 'Le t-shirt basique parfait : 100% coton bio, coupe droite, col rond renforcé. Indispensable de toute garde-robe.',
                'price' => 24.90,
                'stock' => 120,
                'image' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=800&q=80',
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'colors' => ['Noir', 'Blanc', 'Gris'],
            ],
            [
                'category' => 'homme',
                'name' => 'Oversize Heavy Weight',
                'description' => 'T-shirt oversize en jersey épais 240g/m². Tombée parfaite, coupe ample, look streetwear premium.',
                'price' => 39.90,
                'stock' => 75,
                'image' => 'https://images.unsplash.com/photo-1758538843183-c31eee9aca87?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'sizes' => ['M', 'L', 'XL', 'XXL'],
                'colors' => ['Noir', 'Beige', 'Vert kaki'],
            ],
            [
                'category' => 'homme',
                'name' => 'Tee Graphic Streetwear',
                'description' => 'T-shirt graphique avec print original. Coupe boxy, finitions épaisses, look urbain affirmé.',
                'price' => 34.90,
                'stock' => 50,
                'image' => 'https://images.unsplash.com/photo-1523585298601-d46ae038d7d3?q=80&w=764&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => ['Noir', 'Blanc'],
            ],
            [
                'category' => 'homme',
                'name' => 'Tee Vintage Washed',
                'description' => 'T-shirt en coton lavé pour un toucher vintage authentique. Aspect délavé légèrement irrégulier.',
                'price' => 32.90,
                'stock' => 60,
                'image' => 'https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=800&q=80',
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => ['Noir washed', 'Gris vintage'],
            ],

            // FEMME
            [
                'category' => 'femme',
                'name' => 'Crop Top Minimal',
                'description' => 'Crop top en coton stretch, coupe courte et cintrée. Idéal en superposition ou seul en été.',
                'price' => 22.90,
                'stock' => 90,
                'image' => 'https://images.unsplash.com/photo-1673837557599-c2def5cdc4c2?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'sizes' => ['XS', 'S', 'M', 'L'],
                'colors' => ['Blanc', 'Noir', 'Rose poudré'],
            ],
            [
                'category' => 'femme',
                'name' => 'Tee Boyfriend Oversize',
                'description' => 'Coupe boyfriend décontractée en coton lourd. Le confort d\'un tee homme avec une touche féminine.',
                'price' => 29.90,
                'stock' => 60,
                'image' => 'https://images.unsplash.com/photo-1626537903753-a0d82c8fad34?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'sizes' => ['XS', 'S', 'M', 'L'],
                'colors' => ['Blanc cassé', 'Gris chiné', 'Noir'],
            ],
            [
                'category' => 'femme',
                'name' => 'Tee Floral Vintage',
                'description' => 'Imprimé floral aquarelle inspiré des années 70. Coton bio doux et léger.',
                'price' => 27.90,
                'stock' => 45,
                'image' => 'https://images.unsplash.com/photo-1664321650734-7e6a39ad049d?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'sizes' => ['XS', 'S', 'M', 'L', 'XL'],
                'colors' => ['Multicolore'],
            ],
            [
                'category' => 'femme',
                'name' => 'Tee Femme Classique',
                'description' => 'T-shirt féminin coupe ajustée, manches courtes, col rond. Indispensable du quotidien.',
                'price' => 26.90,
                'stock' => 80,
                'image' => 'https://images.unsplash.com/photo-1650643600173-55d7bc280f2e?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'sizes' => ['XS', 'S', 'M', 'L'],
                'colors' => ['Blanc', 'Noir', 'Rose', 'Bleu marine'],
            ],

            // ENFANT
            [
                'category' => 'enfant',
                'name' => 'Tee Kids Coloré',
                'description' => 'T-shirt enfant aux couleurs vives. Coton bio doux pour la peau sensible.',
                'price' => 16.90,
                'stock' => 100,
                'image' => 'https://images.unsplash.com/photo-1518831959646-742c3a14ebf7?w=800&q=80',
                'sizes' => ['3-4 ans', '5-6 ans', '7-8 ans', '9-10 ans'],
                'colors' => ['Jaune', 'Rouge', 'Bleu'],
            ],
            [
                'category' => 'enfant',
                'name' => 'Tee Kids Print Fun',
                'description' => 'T-shirt enfant avec imprimé amusant. Le préféré des petits.',
                'price' => 18.90,
                'stock' => 80,
                'image' => 'https://images.unsplash.com/photo-1622290291468-a28f7a7dc6a8?w=800&q=80',
                'sizes' => ['3-4 ans', '5-6 ans', '7-8 ans'],
                'colors' => ['Multicolore'],
            ],
            [
                'category' => 'enfant',
                'name' => 'Tee Kids Basique Blanc',
                'description' => 'Le basique parfait pour les petits : coupe confortable, coton bio, lavable en machine.',
                'price' => 14.90,
                'stock' => 120,
                'image' => 'https://images.unsplash.com/photo-1519278409-1f56fdda7fe5?w=800&q=80',
                'sizes' => ['3-4 ans', '5-6 ans', '7-8 ans', '9-10 ans'],
                'colors' => ['Blanc', 'Gris', 'Bleu ciel'],
            ],
        ];

        foreach ($products as $data) {
            $category = Category::where('slug', $data['category'])->first();
            unset($data['category']);
            $data['category_id'] = $category->id;
            Product::create($data);
        }
    }
}
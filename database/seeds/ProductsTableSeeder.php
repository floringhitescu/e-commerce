<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $perfume = Category::create([
            'name' => 'perfume'
        ]);

        $cologne = Category::create([
            'name' => 'eau de Cologne'
        ]);

        $spray = Category::create([
            'name' => 'spray'
        ]);

        Product::create([
            'name' => 'MOR Marshmallow Eau de Parfum',
            'category_id' => $perfume->id,
            'slug' => 'mor-065-spray',
            'details' => '7.6 x 2.5 x 8.9 cm; 90.7 g',
            'price' => 40.00,
            'description' => 'Sugar dipped Rose Petals infused with Pink Musk and Cotton Candy casts a spell that will captivate admirers. Spray on a mist of Marshmallow and enjoy the sweet journey.',
            'image' => 'uploads\pngwave.png'
        ]);

        Product::create([
            'name' => 'DELAROM Homme Eau Sport Eau de Parfum 50 ml',
            'category_id' => $perfume->id,
            'slug' => 'homme-067-perfume',
            'details' => '8.5 x 3.3 x 11.9 cm',
            'price' => 21.62,
            'description' => 'DELAROM PARIS - THE NATURAL SCIENCE OF BEAUTY With 40 years’ experience in the world of cosmetics and a particular passion for essential oils and plants, Delano founder Christine Benet, has created a professional product line that combines unique patented technology, scientific innovation, natural formulas, original textures and delicate fragrances. Relying on the use of new biotech molecules associated with the powers of essential oils, the Delano Laboratories develop specific and concentrated formulas targeting hydration and cellular protection, both of which are sources of youth! Delarom’s products are infused with organic botanicals, high quality essential oils and advanced patented biotechnology.',
            'image' => 'uploads\pngwave.png'
        ]);

        Product::create([
            'name' => 'DIVAIN-059, Eau de Parfum for Women',
            'category_id' => $spray->id,
            'slug' => 'divain-059-spray',
            'details' => '5.5 x 9 x 12.7 cm',
            'price' => 22.00,
            'description' => 'Eau de Toilette or Eau de Parfum? While Eau de Toilette contains 5-9% of perfume oil, Eau de Parfum usually contains 8-14%. Eau de Parfums therefore last longer and smell more intense.',
            'image' => 'uploads\pngwave.png'
        ]);

        Product::create([
            'name' => 'Paul Smith London Men Eau de Parfum',
            'category_id' => $perfume->id,
            'slug' => 'london-076-perfume',
            'details' => '5.5 x 9 x 12.7 cm',
            'price' => 38.70,
            'description' => 'Paul Smith London Eau de Parfum for Men opens with Spices, Mandarin, and Violet leaves. Subtle notes of Jasmine, Lavender and Mint characterise the heart before the base reveals a Brandy accord. This is combined with Australian Sandalwood, Tonka Beans and Amber.',
            'image' => 'uploads\pngwave.png'
        ]);

        Product::create([
            'name' => 'Elie Saab Le Parfum Eau de Parfum',
            'category_id' => $perfume->id,
            'slug' => 'elie-saab-064-perfume',
            'details' => '6.1 x 4.8 x 9.4 cm ; 31.8 g',
            'price' => 34.96,
            'description' => 'Elie Saab, sometimes know as ES is a Lebanese born fashion designer. Elie Saab launched his Beirut based fashion label when he was just 18 years old. He has workshops in both Milan and Paris. He has proved to be a worl wide successful fashion designer - designing gowns for famous stars including Halle Berry. Halle Berry is great fan of Elie Saab dresses and has been photographed wearing them many times. Other stars that love his fashion designs include Angelina Jolie, Beyonce and Christina Aguilera.',
            'image' => 'uploads\pngwave.png'
        ]);

        Product::create([
            'name' => 'Hugo Boss Bottled Intense Eau De Parfum for Men',
            'category_id' => $perfume->id,
            'slug' => 'hugo-boss-056-perfume',
            'details' => '5.6 x 6.1 x 6.8 cm ; 49.9 g',
            'price' => 34.96,
            'description' => 'Hugo Boss Boss Bottle Intense Eau De Parfum reveals the Man of Today and his strength of character. The fragrance is laden with more woods, spices and a powerful concentration of precious oils. Bright apple is tempered by a calmer and more composed green orange blossom.',
            'image' => 'uploads\pngwave.png'
        ]);

        Product::create([
            'name' => 'Bentley Infinite Intense Eau de Parfum',
            'category_id' => $perfume->id,
            'slug' => 'bentley-065-perfume',
            'details' => '8 x 4.6 x 14.2 cm ; 390 g',
            'price' => 27.65,
            'description' => 'Bentley Infinite Intense has an incredibly distinctive signature, This Eau de Parfum opens with an alliance of spicy notes and voilet leaves before leading into a strong woody trail - created in the image of the Bentley spirit: powerful and masculine.',
            'image' => 'uploads\pngwave.png'
        ]);

        Product::create([
            'name' => 'Gucci Eau de Parfum',
            'category_id' => $perfume->id,
            'slug' => 'gucci-034-perfume',
            'details' => '8 x 4.6 x 14.2 cm ; 390 g',
            'price' => 27.65,
            'description' => 'Gucci EAU DE Parfum female 50 milliliters. Scents Gucci Eau DE Parfum female 50 milliliters. Fragrance: Eau de Parfum weight: 50 milliliters.',
            'image' => 'uploads\pngwave.png'
        ]);

    }
}

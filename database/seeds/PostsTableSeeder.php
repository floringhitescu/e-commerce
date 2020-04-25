<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Post::create([
            'title'             => 'Gabrielle ‘Coco’ Chanel ',
            'description'       => 'When couturier Gabrielle ‘Coco’ Chanel launched her debut perfume No5, in 1921, it changed the whole world of fragrance. Perfumer Ernest Beaux produced a portfolio of samples for Mademoiselle to try – and she chose the fifth proposal. So No5 was born – and has since gone on to become the most recognised name in perfumery, worldwide',
            'body'              => 'What set Chanel No5 apart from the fragrances of the time – mostly flowery scents swirling with jasmine, lilac and rose – was its more ‘abstract’ construction, and the generous use of aldehydes, which have become known for giving fragrance a champagne-like sparkle when you smell them. It was nothing less than a revolution.  Legend has it that Ernest Beaux (or maybe his lab assistant) put an ‘overdose’ of aldehydes in the bottle – we’ll never know if it was accident, or design – but Chanel was seduced. And the rest, literally, is fragrance history.',
            'image'             => 'uploads/mask.png',
            'user_id'           => '3'
        ]);

        Post::create([
            'title'             => 'REVIEWED: HUGO BOSS THE SCENT FOR HER ',
            'description'       => 'When you open the packaging and see the bottle, you just know this is going to be a sophisticated fragrance. I couldn’t wait to start showing Hugo Boss The Scent For Her off on my dressing table.',
            'body'              => 'The bottle top is almost masculine in shape but it’s set off by the feminine design of the bottle and the gorgeous peachy colour of the perfume inside, which hints at the top notes when you first smell the fragrance: sweet honeyed peach with a hint of freesia.
                                    The fragrance is described as seductive, so what better way to test it out than on a date night? During the evening I was aware of the perfume subtly changing as the base notes of roasted cocoa crept through. The feminine heart note of osmanthus stayed throughout, making it not only sexy, but also very feminine and clean. It can be hard to get all these elements in one fragrance, so I was delighted to discover the best of all worlds in one perfume!
                                    Although very soft and not too overpowering, the perfume lasted well, and I was happy that I could smell it on myself throughout the night. It meant others – most importantly, my date for the evening – would also be able to smell it on me. His reaction was very positive, and he said it reminded him of being on holiday (fine by me!).
                                    I would say Hugo Boss The Scent For Her could become a signature scent. With so many different standout elements, it could reflect the many different aspects of your personality. It will take you on a journey, from a fresh and clean beginning, to feminine and ladylike heart notes, all the way through to the darker and more mysterious base notes, which leave a gorgeous and lasting impression.
                                    This will be a fragrance I’ll turn to time and time again for its distinctive qualities, the confidence it gave me when I first tried it, and for the reaction I experienced when I was wearing it.
                                    If you’re looking for a sophisticated and glamorous perfume, I would certainly recommend Hugo Boss The Scent For Her. Just make sure you try it out when you have enough time to experience – and appreciate – all the different notes it has to offer.',
            'image'             => 'uploads/mask.png',
            'user_id'           => '3'
        ]);

        Post::create([
            'title'             => 'Home Facial and Skincare Empties',
            'description'       => 'So this is quite a long (rambly) video of all the skincare products I\'ve used up during lockdown and over the past couple of months. My skin is the driest it\'s ever been in my entire life - which is a novelty in itself!! Several of the products are from my epic travel toiletry bag (as it\'s not getting any use right now) and others are things that just feel good right now. Hope you enjoy! x',
            'body'              => 'Like lots of people, my skin doesn\'t fit into one category - it\'s oily/combination, often dehydrated and prone to uneven texture and pigmentation, so I\'m regularly on the lookout for products with brightening benefits that I can incorporate into my regime (to both improve tone and keep future discolouration at bay). I often find that products like these are good to use in autumn and winter months when you know you\'re not going to be exposed to strong sun every day (UVA is a huge catalyst for dullness and pigmentation). That said, no brightening product will be able to work to its full potential without a broad-spectrum sunscreen, so make sure you apply your SPF each morning (even when it\'s cloudy and grey outside) so your skin can respond as effectively as possible to the brightening products you\'re using.
                                    When you\'re shopping for brightening products it\'s good to have a little knowledge of the main \'non prescription\' ingredients to look out for, so you can be sure you\'re buying a decent formula (if you want anything stronger for acute pigmentation then you\'ll need to see a good dermatologist for a prescription). There are lots of brightening ingredients that are easy to come by and have been found highly effective in trials - here are five, and some products that you can find them in...',
            'image'             => 'uploads/mask.png',
            'user_id'           => '3'
        ]);
    }
}

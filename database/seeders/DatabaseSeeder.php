<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        User::create([
            'name' => 'Mahesa Adi Kusuma',
            'username' => 'Mahesa Adi Kusuma',
            'email' => 'mahesaadikuzuma@gmail.com',
            'password' => bcrypt('15092003'),
        ]);

        // User::create([
        //     'name' => 'kenzie',
        //     'email' => 'kenzie@gmail.com',
        //     'password' => bcrypt('123'),
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Progamming',
            'slug' => 'Web Progamming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'Web Design'
        ]);

        Category::create([
            'name' => 'personal',
            'slug' => 'personal'
        ]);

        post::factory(20)->create();

        // Post::create([
        //     'title' => 'judul pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis esse veniam quibusdam ratione aliquid,',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis esse veniam quibusdam ratione aliquid, iusto officiis laboriosam voluptatum reprehenderit iste nemo? Porro placeat, inventore corrupti, sequi maxime hic minima eum aut dicta, soluta maiores reprehenderit! Dolorem obcaecati corrupti earum voluptas, deleniti consectetur ratione explicabo cupiditate temporibus incidunt, molestias voluptates, dolorum voluptatem placeat! Molestias perferendis tenetur ducimus atque obcaecati enim aspernatur nostrum illum. Laborum dolor minima quis adipisci quaerat reprehenderit iure illum sapiente in? Recusandae voluptate ipsum veniam? Voluptates ut illum id dolor reprehenderit ratione qui harum repellat modi nesciunt omnis ad neque repellendus voluptatem, animi itaque numquam ea inventore delectus.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'judul kedua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis esse veniam quibusdam ratione aliquid,',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis esse veniam quibusdam ratione aliquid, iusto officiis laboriosam voluptatum reprehenderit iste nemo? Porro placeat, inventore corrupti, sequi maxime hic minima eum aut dicta, soluta maiores reprehenderit! Dolorem obcaecati corrupti earum voluptas, deleniti consectetur ratione explicabo cupiditate temporibus incidunt, molestias voluptates, dolorum voluptatem placeat! Molestias perferendis tenetur ducimus atque obcaecati enim aspernatur nostrum illum. Laborum dolor minima quis adipisci quaerat reprehenderit iure illum sapiente in? Recusandae voluptate ipsum veniam? Voluptates ut illum id dolor reprehenderit ratione qui harum repellat modi nesciunt omnis ad neque repellendus voluptatem, animi itaque numquam ea inventore delectus.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'judul ketiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis esse veniam quibusdam ratione aliquid,',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis esse veniam quibusdam ratione aliquid, iusto officiis laboriosam voluptatum reprehenderit iste nemo? Porro placeat, inventore corrupti, sequi maxime hic minima eum aut dicta, soluta maiores reprehenderit! Dolorem obcaecati corrupti earum voluptas, deleniti consectetur ratione explicabo cupiditate temporibus incidunt, molestias voluptates, dolorum voluptatem placeat! Molestias perferendis tenetur ducimus atque obcaecati enim aspernatur nostrum illum. Laborum dolor minima quis adipisci quaerat reprehenderit iure illum sapiente in? Recusandae voluptate ipsum veniam? Voluptates ut illum id dolor reprehenderit ratione qui harum repellat modi nesciunt omnis ad neque repellendus voluptatem, animi itaque numquam ea inventore delectus.',
        //     'category_id' => 3,
        //     'user_id' => 3
        // ]);

        // Post::create([
        //     'title' => 'judul keempat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis esse veniam quibusdam ratione aliquid,',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis esse veniam quibusdam ratione aliquid, iusto officiis laboriosam voluptatum reprehenderit iste nemo? Porro placeat, inventore corrupti, sequi maxime hic minima eum aut dicta, soluta maiores reprehenderit! Dolorem obcaecati corrupti earum voluptas, deleniti consectetur ratione explicabo cupiditate temporibus incidunt, molestias voluptates, dolorum voluptatem placeat! Molestias perferendis tenetur ducimus atque obcaecati enim aspernatur nostrum illum. Laborum dolor minima quis adipisci quaerat reprehenderit iure illum sapiente in? Recusandae voluptate ipsum veniam? Voluptates ut illum id dolor reprehenderit ratione qui harum repellat modi nesciunt omnis ad neque repellendus voluptatem, animi itaque numquam ea inventore delectus.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
        
    }
}

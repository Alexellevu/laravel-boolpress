<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 6 ; $i++){
            $post = new Post();
            $post->title = $faker->word();
            $post->description = $faker->text();
            $post->image = $faker->imageUrl(640, 480, 'Posts', true );
            $post->date = $faker->date('Y_m_d');
            $post->save();
            }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Roles;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // Category::factory(5)->trashed()->create();
        // Post::factory(10)->create();

        // $users = User::factory()
        //         ->count(2)
        //         ->sequence(fn (Sequence $sequence) => ['name' => 'Name '.$sequence->index])
        //         ->create();

        //$categories =  Category::factory()->count(3)->sequence(fn(Sequence $sequence)=>['slug' => 'Title'.$sequence->index])->create();
        //Category::factory()->count(3)->sequence(fn(Sequence $sequence)=>['slug' => 'Name '.$sequence->index])->create();
        //$users = User::factory()->count(2)->state(new Sequence(fn (Sequence $sequence) => ['name' => 'Name '.$sequence->index]))->create();
        //  $users = User::factory()
        //         ->count(2)
        //         ->sequence(
        //             ['name' => 'First User'],
        //             ['name' => 'Second User'],
        //         )
        //         ->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password'=>Hash::make('admin@123')


        // ]);
        // Create posts
        Post::factory(5)->create();
        //factory(Post::class, 5)->create();

        // Create videos
        Video::factory(5)->create();

        // Create comments for posts
        Post::all()->each(function ($post) {
            $post->comments()->create([
                'content' => 'Sample comment for post ' . $post->id
            ]);
        });

        // Create comments for videos
        Video::all()->each(function ($video) {
            $video->comments()->create([
                'content' => 'Sample comment for video ' . $video->id
            ]);
        });
    }
}

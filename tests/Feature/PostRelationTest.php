<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

it('post belongs to a category and user', function () {
    $user = User::factory()->create();
    $category = Category::create([
        'name' => 'Berita',
        'slug' => 'berita',
    ]);
    
    $post = Post::create([
        'title' => 'Test Post',
        'slug' => 'test-post',
        'content' => 'Content here',
        'user_id' => $user->id,
        'category_id' => $category->id,
    ]);

    expect($post->user->id)->toBe($user->id);
    expect($post->category->id)->toBe($category->id);
});

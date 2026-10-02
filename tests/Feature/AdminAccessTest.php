<?php

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Post;
it('denies access to admin panel for guests', function () {
    $this->get('/admin')->assertRedirect('/admin/login');
});

it('allows admin to access everything', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $this->actingAs($admin);

    $this->get('/admin')->assertSuccessful();
    $this->get('/admin/posts')->assertSuccessful();
    $this->get('/admin/categories')->assertSuccessful();
    $this->get('/admin/settings-page')->assertSuccessful();
});

it('allows operator to access posts and categories but denies users and settings', function () {
    $operator = User::factory()->create(['role' => 'operator']);
    $this->actingAs($operator);

    $this->get('/admin')->assertSuccessful();
    $this->get('/admin/posts')->assertSuccessful();
    $this->get('/admin/categories')->assertSuccessful();
    $this->get('/admin/settings-page')->assertForbidden();
    $this->get('/admin/users')->assertForbidden();
});

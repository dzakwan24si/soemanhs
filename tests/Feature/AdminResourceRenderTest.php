<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Download;
use App\Models\Staff;
use App\Models\Facility;
use App\Models\Extracurricular;
use App\Models\Achievement;
use App\Models\Page;
use App\Models\Testimonial;
use function Pest\Livewire\livewire;

it('can render all resource pages for admin', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $this->actingAs($admin);

    $resources = [
        ['url' => '/admin/posts', 'model' => Post::class, 'factory' => fn() => Post::create(['title' => 'T', 'slug' => 't-1', 'content' => 'c', 'user_id' => $admin->id, 'category_id' => Category::create(['name' => 'C', 'slug' => 'c-1'])->id])],
        ['url' => '/admin/categories', 'model' => Category::class, 'factory' => fn() => Category::create(['name' => 'C2', 'slug' => 'c-2'])],
        ['url' => '/admin/announcements', 'model' => Announcement::class, 'factory' => fn() => Announcement::create(['title' => 'A', 'slug' => 'a-1', 'content' => 'C', 'user_id' => $admin->id])],
        ['url' => '/admin/events', 'model' => Event::class, 'factory' => fn() => Event::create(['title' => 'E', 'slug' => 'e-1', 'description' => 'D', 'start_date' => now(), 'end_date' => now()])],
        ['url' => '/admin/galleries', 'model' => Gallery::class, 'factory' => fn() => Gallery::create(['title' => 'G', 'slug' => 'g-1', 'user_id' => $admin->id])],
        ['url' => '/admin/downloads', 'model' => Download::class, 'factory' => fn() => Download::create(['title' => 'D', 'slug' => 'd-1', 'file_path' => 'f', 'user_id' => $admin->id])],
        ['url' => '/admin/staff', 'model' => Staff::class, 'factory' => fn() => Staff::create(['name' => 'S', 'position' => 'P'])],
        ['url' => '/admin/facilities', 'model' => Facility::class, 'factory' => fn() => Facility::create(['name' => 'F', 'slug' => 'f-1'])],
        ['url' => '/admin/extracurriculars', 'model' => Extracurricular::class, 'factory' => fn() => Extracurricular::create(['name' => 'Ex', 'slug' => 'ex-1', 'description' => 'D'])],
        ['url' => '/admin/achievements', 'model' => Achievement::class, 'factory' => fn() => Achievement::create(['title' => 'Ac', 'date' => now(), 'level' => 'L', 'description' => 'D'])],
        ['url' => '/admin/pages', 'model' => Page::class, 'factory' => fn() => Page::create(['title' => 'P', 'slug' => 'p-1', 'content' => 'C'])],
        ['url' => '/admin/testimonials', 'model' => Testimonial::class, 'factory' => fn() => Testimonial::create(['name' => 'T', 'content' => 'C'])],
    ];

    foreach ($resources as $resource) {
        // Test Index
        $this->get($resource['url'])->assertSuccessful();
        
        // Test Create
        $this->get($resource['url'] . '/create')->assertSuccessful();
        
        // Test Edit
        $record = $resource['factory']();
        $this->get($resource['url'] . '/' . $record->id . '/edit')->assertSuccessful();
    }
});

it('can render content resource pages for operator', function () {
    $operator = User::factory()->create(['role' => 'operator']);
    $this->actingAs($operator);

    // Operator can access Posts, Categories, Announcements, Events, Galleries.
    $resources = [
        ['url' => '/admin/posts', 'factory' => fn() => Post::create(['title' => 'T3', 'slug' => 't-3', 'content' => 'c', 'user_id' => $operator->id, 'category_id' => Category::create(['name' => 'C3', 'slug' => 'c-3'])->id])],
        ['url' => '/admin/categories', 'factory' => fn() => Category::create(['name' => 'C4', 'slug' => 'c-4'])],
        ['url' => '/admin/announcements', 'factory' => fn() => Announcement::create(['title' => 'A2', 'slug' => 'a-2', 'content' => 'C', 'user_id' => $operator->id])],
        ['url' => '/admin/events', 'factory' => fn() => Event::create(['title' => 'E2', 'slug' => 'e-2', 'description' => 'D', 'start_date' => now(), 'end_date' => now()])],
        ['url' => '/admin/galleries', 'factory' => fn() => Gallery::create(['title' => 'G2', 'slug' => 'g-2', 'user_id' => $operator->id])],
    ];

    foreach ($resources as $resource) {
        // Test Index
        $this->get($resource['url'])->assertSuccessful();
        
        // Test Create
        $this->get($resource['url'] . '/create')->assertSuccessful();
        
        // Test Edit
        $record = $resource['factory']();
        $this->get($resource['url'] . '/' . $record->id . '/edit')->assertSuccessful();
    }
});

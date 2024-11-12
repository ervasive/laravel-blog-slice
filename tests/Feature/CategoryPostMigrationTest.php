<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

it('should create category_post table', function () {
    expect(Schema::hasTable('category_post'))->toBeTrue();
});

it('should have category_id column', function () {
    expect(Schema::hasColumn('category_post', 'category_id'))->toBeTrue();
});

it('should have post_id column', function () {
    expect(Schema::hasColumn('category_post', 'post_id'))->toBeTrue();
});

it('ensures unique category_id and post_id combination in category_post table', function () {
    $post = Post::factory()->create();
    $category = Category::factory()->create();

    DB::table('category_post')->insert([
        'category_id' => $category->id,
        'post_id' => $post->id,
    ]);

    expect(fn() => DB::table('category_post')->insert([
        'category_id' => $category->id,
        'post_id' => $post->id,
    ]))
        ->toThrow(\Illuminate\Database\QueryException::class);
});

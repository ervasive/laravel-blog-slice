<?php

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Support\Facades\Schema;

it('should create posts table', function () {
    expect(Schema::hasTable('posts'))->toBeTrue();
});

it('should have title column', function () {
    expect(Schema::hasColumn('posts', 'title'))->toBeTrue();
});

it('should have content column', function () {
    expect(Schema::hasColumn('posts', 'content'))->toBeTrue();
});

it('should have status column', function () {
    expect(Schema::hasColumn('posts', 'status'))->toBeTrue();
});

it('should have user_id column', function () {
    expect(Schema::hasColumn('posts', 'user_id'))->toBeTrue();
});

it('should assign valid value to status column', function () {
    $post = Post::factory()->create(['status' => PostStatus::Published]);
    expect($post->status)->toBe(PostStatus::Published);
});

it('should throw an exception on invalid status value', function () {
    expect(fn () => Post::factory()->create(['status' => 'invalid']))->toThrow(ValueError::class);
});

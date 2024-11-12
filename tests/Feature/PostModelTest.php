<?php

use App\Models\Post;

describe('Post create', function () {
    it('should create a post', function () {
        $post = Post::factory()->create();

        expect($post)->toBeInstanceOf(Post::class);
        expect($post->exists)->toBeTrue();
        expect(Post::count())->toBe(1);
    });

    it('should throw if no title is provided', function () {
        expect(fn() => Post::factory()->create(['title' => null]))
            ->toThrow(\Illuminate\Database\QueryException::class);
    });

    it('should throw if invalid status value is provided', function () {
        expect(fn() => Post::factory()->create(['status' => 'invalid-value']))
            ->toThrow(ValueError::class);
    });

    it('should throw if no user_id is provided', function () {
        expect(fn() => Post::factory()->create(['user_id' => null]))
            ->toThrow(\Illuminate\Database\QueryException::class);
    });
});

describe('Post update', function () {
    it('should update a post', function () {
        $post = Post::factory()->create();

        $post->update(['title' => 'Updated title']);
        expect($post->title)->toBe('Updated title');
    });
});

describe('Post delete', function () {
    it('should delete a post', function () {
        $post = Post::factory()->create();
        $post->delete();

        expect(Post::count())->toBe(0);
    });
});

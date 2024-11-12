<?php

use App\Models\Category;
use App\Models\Post;

describe('Category create', function () {
    it('should create a category', function () {
        $category = Category::factory()->create();

        expect($category)->toBeInstanceOf(Category::class);
        expect($category->exists)->toBeTrue();
        expect(Category::count())->toBe(1);
    });

    it('should throw if no name is provided', function () {
        expect(fn() => Category::factory()->create(['name' => null]))
            ->toThrow(\Illuminate\Database\QueryException::class);
    });
});

describe('Category update', function () {
    it('should update a category', function () {
        $category = Category::factory()->create();

        $category->update(['name' => 'Updated name']);
        expect($category->name)->toBe('Updated name');
    });
});

describe('Category delete', function () {
    it('should delete a category', function () {
        $category = Category::factory()->create();
        $category->delete();

        expect(Category::count())->toBe(0);
    });
});

describe('Category relations', function () {
    it('should have a parent relation', function () {
        $category = Category::factory()->create();
        $parentCategory = Category::factory()->create();

        $category->parent()->associate($parentCategory);
        $category->save();

        expect($category->parent_id)->toBe($parentCategory->id);
    });

    it('should have many children', function () {
        $category = Category::factory()->create();
        $childCategory = Category::factory()->create();
        $category->children()->save($childCategory);

        expect($category->children->count())->toBe(1);
    });

    it('should have many posts', function () {
        $category = Category::factory()->create();
        $post = Post::factory()->create();
        $category->posts()->save($post);

        expect($category->posts->count())->toBe(1);
    });
});

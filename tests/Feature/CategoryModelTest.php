<?php

use App\Models\Category;

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

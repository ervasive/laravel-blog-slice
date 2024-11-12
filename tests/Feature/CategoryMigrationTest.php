<?php

use Illuminate\Support\Facades\Schema;

it('should create categories table', function () {
    expect(Schema::hasTable('categories'))->toBeTrue();
});

it('should have name column', function () {
    expect(Schema::hasColumn('categories', 'name'))->toBeTrue();
});

it('should have parent_id column', function () {
    expect(Schema::hasColumn('categories', 'parent_id'))->toBeTrue();
});

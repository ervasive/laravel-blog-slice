<?php

namespace App\Enums;

enum PostStatus: string
{
    case Published = 'published';
    case Unpublished = 'unpublished';
}

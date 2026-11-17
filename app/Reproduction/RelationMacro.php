<?php

declare(strict_types=1);

namespace App\Reproduction;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

use function PHPStan\Testing\assertType;

final class RelationMacro
{
    /** @return HasMany<Comment, Post> */
    public function comments(Post $post): HasMany
    {
        $relation = $post->comments()->latestFirst('created_at');

        assertType('Illuminate\Database\Eloquent\Relations\HasMany<App\Models\Comment, App\Models\Post>', $relation);

        return $relation->orderBy('id');
    }
}

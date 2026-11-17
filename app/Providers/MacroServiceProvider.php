<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

final class MacroServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // The same macro on the Eloquent builder and on relations.
        Builder::macro('latestFirst', function (string $column): Builder {
            return $this->orderBy($column, 'desc');
        });

        Relation::macro('latestFirst', function (string $column): Relation {
            return $this->orderBy($column, 'desc');
        });
    }
}

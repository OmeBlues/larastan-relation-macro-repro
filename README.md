# Larastan relation macro reproduction

A fresh `laravel/laravel` skeleton with only these files added:

- `app/Providers/MacroServiceProvider.php` (registered in `bootstrap/providers.php`): the same macro on `Eloquent\Builder` and on `Relation`
- `app/Models/Post.php`, `app/Models/Comment.php`
- `app/Reproduction/RelationMacro.php`: the call site with an `assertType()`
- `phpstan.neon`

## Run

```bash
composer install
vendor/bin/phpstan analyse
```

With `larastan/larastan` 3.15.0 (locked) this reports 2 errors: the relation is typed as plain `Relation` instead of `HasMany<Comment, Post>`.

```bash
composer require --dev larastan/larastan:3.14.0 -W
vendor/bin/phpstan analyse
```

With 3.14.0 there are no errors.

Removing either macro from `MacroServiceProvider` shows the other two rows of the table in the issue.

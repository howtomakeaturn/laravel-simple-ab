# Introduction

A simple package for a/b testing.

# Installation

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php:

```php
Howtomakeaturn\LaravelSimpleAB\LaravelSimpleABServiceProvider::class,
```

If you want to use the facade, add this to your facades in app.php:

```php
'AB' => Howtomakeaturn\LaravelSimpleAB\LaravelSimpleABFacade::class,
```

You might want to add this line in the .gitignore file:

```
/storage/laravel-simple-ab/
```

# License

The LaravelSimpleAB is open-sourced software licensed under the MIT license.

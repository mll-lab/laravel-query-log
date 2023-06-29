You can easily implement what this package does by adding something like this to `DatabaseServerProvider::boot()`:

```php
if (env('APP_DEBUG')) {
    DB::listen(function (QueryExecuted $query): void {
        $sql = str_replace("\n", ' ', $query->sql);
        $bindings = \Safe\json_encode($query->bindings);

        \Safe\file_put_contents(
            filename: storage_path('logs/query.log'),
            data: "SQL: {$sql} ||| Bindings: {$bindings} ||| Time: {$query->time}ms\n",
            flags: FILE_APPEND,
        );
    });
}
```

# laravel-query-log

Log database queries to an output channel of your choice.

[![codecov](https://codecov.io/gh/mll-lab/laravel-query-log/branch/master/graph/badge.svg)](https://codecov.io/gh/mll-lab/laravel-query-log)
[![GitHub license](https://img.shields.io/github/license/mll-lab/laravel-query-log.svg)](https://github.com/mll-lab/laravel-query-log/blob/master/LICENSE)

[![Packagist](https://img.shields.io/packagist/v/mll-lab/laravel-query-log.svg)](https://packagist.org/packages/mll-lab/laravel-query-log)
[![Packagist](https://img.shields.io/packagist/dt/mll-lab/laravel-query-log.svg)](https://packagist.org/packages/mll-lab/laravel-query-log)

## Installation

    composer require mll-lab/laravel-query-log

That's it. Laravel's package discovery will automatically kick in.

## Configuration

All database queries are written to `storage/logs/query.log` by default.
If you want to change the location, publish the configuration file:

    php artisan vendor:publish --tag=query-log-config

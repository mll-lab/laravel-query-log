<?php

declare(strict_types=1);

namespace MLL\LaravelQueryLog;

use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Log\LogManager;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class LaravelQueryLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot(DatabaseManager $databaseManager, LogManager $logManager, ConfigRepository $configRepository): void
    {
        $this->publishes([
            __DIR__.'/query-log.php' => $this->app->make('path.config').'/query-log.php',
        ], 'config');

        if ($configRepository->get('query-log.enabled')) {
            $namedChannel = $configRepository->get('query-log.channel');
            $channel = $namedChannel
                ? $logManager->channel($namedChannel)
                : $this->createDefaultLogger();

            $databaseManager->listen(function (QueryExecuted $query) use ($channel): void {
                $channel->debug(
                    $query->sql
                    .' ||| Values |||'.serialize($query->bindings)
                    .' ||| Duration ||| '.$query->time
                );
            });
        }
    }

    protected function createDefaultLogger(): LoggerInterface
    {
        return new Logger(
            'query-log',
            [
                new StreamHandler(
                    $this->app->storagePath().'/logs/query.log',
                    Logger::DEBUG
                ),
            ]
        );
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/query-log.php', 'query-log');
    }
}

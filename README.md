# laravel-query-log

Log database queries to an output channel of your choice.

[![Build Status](https://travis-ci.org/mll-lab/laravel-query-log.svg?branch=master)](https://travis-ci.org/mll-lab/laravel-query-log)
[![codecov](https://codecov.io/gh/mll-lab/laravel-query-log/branch/master/graph/badge.svg)](https://codecov.io/gh/mll-lab/laravel-query-log)
[![StyleCI](https://github.styleci.io/repos/150426104/shield?branch=master)](https://github.styleci.io/repos/150426104)
[![GitHub license](https://img.shields.io/github/license/mll-lab/laravel-query-log.svg)](https://github.com/mll-lab/laravel-query-log/blob/master/LICENSE)
[![Packagist](https://img.shields.io/packagist/v/mll-lab/laravel-query-log.svg)](https://packagist.org/packages/mll-lab/laravel-query-log)
[![Packagist](https://img.shields.io/packagist/dt/mll-lab/laravel-query-log.svg)](https://packagist.org/packages/mll-lab/laravel-query-log)

## Installation

    composer require mll-lab/laravel-query-log

## Configuration

If you want to change the defaults, publish the configuration file:

    php artisan vendor:publish --provider="MLL\LaravelQueryLog\LaravelQueryLogServiceProvider" --tag=config

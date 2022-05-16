# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Unreleased

## v2.3.0

### Added

- Support Laravel 9

## v2.2.0

### Added

- Support Laravel 8

## v2.1.0

### Changed

- Use tag to publish config: `php artisan vendor:publish --tag=query-log-config`

## v2.0.0

### Added

- Support Laravel 7

### Removed

- Drop support for Laravel 5.5 and PHP 7.1

## v1.0.0

### Added

- Log database queries to `storage/logs/query.log` by default
- Allow turning off query logs through configuration
- Select any log channel through configuration

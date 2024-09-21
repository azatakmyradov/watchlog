# WatchLog

WatchLog is a Laravel package that provides an easy-to-use logging solution for your Laravel applications. It allows you to send log messages to a remote API endpoint, making it simple to centralize your logs and monitor your application's behavior.

## Features

- Simple integration with Laravel applications
- Support for all PSR-3 log levels
- Ability to include context data with log messages
- User authentication information included in logs
- Event listener for custom logging events
- Facade for easy static method calls

## Installation

You can install the package via Composer:

```bash
composer require akmyradov/watchlog
```

## Configuration

After installation, publish the configuration file:

```bash
php artisan vendor:publish --provider="Akmyradov\WatchLog\WatchLogServiceProvider"
```

This will create a `config/watchlog.php` file. Update values in the .env with your WatchLog API credentials:

```env
WATCHLOG_BASE_URL=""
WATCHLOG_PROJECT_ID=1
WATCHLOG_SECRET=""
WATCHLOG_DRIVER=""
```

## Usage

### Basic Logging

You can use the WatchLog facade to log messages:

```php
use Akmyradov\WatchLog\Facades\WatchLog;

WatchLog::info('This is an info message');
WatchLog::error('An error occurred', ['error' => $exception->getMessage()]);
```

### Available Methods

- `emergency(string $message, array $context = [])`
- `alert(string $message, array $context = [])`
- `critical(string $message, array $context = [])`
- `error(string $message, array $context = [])`
- `warning(string $message, array $context = [])`
- `notice(string $message, array $context = [])`
- `info(string $message, array $context = [])`
- `debug(string $message, array $context = [])`

### Custom Log Method

If you need more control, you can use the `log` method directly:

```php
WatchLog::log('custom_level', 'Custom log message', ['key' => 'value']);
```

### Event Listening

You can set up WatchLog to listen for specific events and log them automatically:

```php
use Akmyradov\WatchLog\Facades\WatchLog;

WatchLog::listen(YourCustomEvent::class);
```

## License

[MIT License](LICENSE.md)

Use this repo as a skeleton for your new channel, once you're done please submit a Pull Request on [this repo](https://github.com/laravel-notification-channels/new-channels) with all the files.

Here's the latest documentation on Laravel 5.* Notifications System:

https://laravel.com/docs/master/notifications

# A Boilerplate repo for contributions

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laravel-notification-channels/46-elks.svg?style=flat-square)](https://packagist.org/packages/laravel-notification-channels/46-elks)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/laravel-notification-channels/46-elks/master.svg?style=flat-square)](https://travis-ci.org/laravel-notification-channels/46-elks)
[![StyleCI](https://styleci.io/repos/:style_ci_id/shield)](https://styleci.io/repos/:style_ci_id)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/:sensio_labs_id.svg?style=flat-square)](https://insight.sensiolabs.com/projects/:sensio_labs_id)
[![Quality Score](https://img.shields.io/scrutinizer/g/laravel-notification-channels/46-elks.svg?style=flat-square)](https://scrutinizer-ci.com/g/laravel-notification-channels/46-elks)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/laravel-notification-channels/46-elks/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/laravel-notification-channels/46-elks/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel-notification-channels/46-elks.svg?style=flat-square)](https://packagist.org/packages/laravel-notification-channels/46-elks)

This package makes it easy to send notifications using [46Elks](https://46elks.com/) with Laravel 5.x.

## Contents

- [Installation](#installation)
	- [Setting up the 46Elks service](#setting-up-the-46Elks-service)
- [Usage](#usage)
	- [Available Message methods](#available-message-methods)
- [Changelog](#changelog)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Installation

composer require laravel-notification-channels/46-elks

### Setting up the 46Elks service

1. Register the NotificationChannels\FortysixElks\FortysixElksServiceProvider::class in your config/app.php
2. Add this in your config/app.php
```php
'fortysixelks' => [
    	'username' => env('46ELKS_USERNAME'),
    	'password' => env('46ELKS_PASSWORD'),
    	'sender' => env('46ELKS_SENDER'),
    ],
```
3. Configure parameters in you .env file.

## Usage

1. Create a notification.
2. Configure it to send via FortysixElksChannel::class
3. Implement toFortysixElks function
```php
public function toFortysixElks($notifiable)
{
    return (new FortysixElksMessage)
                ->body("this is a message 123455")
                ->receiver("+46123123123")
                ->isFlash(true)
                ->from("<MySenderName>");
}
```

### Available Message methods

* `body(string)` : Sets the sms message
* `receiver(string)` : Sets the receiver phone
* `isFlash(boolean)` : Enable flash messages
* `from(string)` : Ovverride sender name per message here

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email joos@wappo.se instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Johan](https://github.com/kjostling)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

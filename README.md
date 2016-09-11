# Laker

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![StyleCI][ico-styleci]][link-styleci]
[![Build Status][ico-travis]][link-travis]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Laker was build to help you track down bugs on your laravel applications more easily.
He catches all exceptions throw by your application and saves on Bitbucket as issues.

## Install

Via Composer

``` bash
$ composer require flyingluscas/laker
```

## Usage

### 1. Service Provider
First thing you need to do is to add the `LakerServiceProvider` under the `providers` section on `config/app.php`

``` php
'providers' => [

    // ...

    FlyingLuscas\Laker\LakerServiceProvider::class,

],
```

### 2. Configuration

Ok, now that our service provider is in place, we need to set up our configurarion file, run.

``` bash
$ php artisan vendor:publish --provider="FlyingLuscas\Laker\LakerServiceProvider"
```

The command above will generate the  `config/laker.php` file.

| Option           | Description                                         |
|:-----------------|:----------------------------------------------------|
| account_slug     | The slug of your account or team on Bitbucket.      |
| repository_slug  | The slug of your repository on Bitbucket.           |
| auth             | Your **username** and **password** from Bitbucket.  |

### 3. Sending Issues

All Laravel exceptions can be intercepted through the `app/Exceptions/Handler.php` file.

On this file, go to the `report` method and add this on the top.

``` php
use FlyingLuscas\Laker\Issue;
use FlyingLuscas\Laker\Services\Bitbucket;

public function report(Exception $exception)
{
    $issue = new Issue($exception);
    $bitbucket = new Bitbucket;

    $issue->createOn($bitbucket);

    parent::report($exception);
}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email lucas.pires.mattos@gmail.com instead of using the issue tracker.

## Credits

- [Lucas Pires][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/flyingluscas/laker.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/67747721/shield
[ico-travis]: https://img.shields.io/travis/flyingluscas/laker/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/flyingluscas/laker.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/flyingluscas/laker.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/flyingluscas/laker.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/flyingluscas/laker
[link-styleci]: https://styleci.io/repos/67747721
[link-travis]: https://travis-ci.org/flyingluscas/laker
[link-scrutinizer]: https://scrutinizer-ci.com/g/flyingluscas/laker/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/flyingluscas/laker
[link-downloads]: https://packagist.org/packages/flyingluscas/laker
[link-author]: https://github.com/flyingluscas
[link-contributors]: ../../contributors

# FrEn

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

Laravel package that supplies language tracking and language switching services and pulls in commonly used 
multi-language packages to create a sane basis for bilingual (French and English) Laravel apps. 

Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require mlatjac/fren
```

## Usage

### Language middleware

The Language middleware sets the app's current locale to the currently selected language.

The package inserts this middleware in the middleware stack for all web routes.

To specifically invoke this middleware on a route, you can use its 'lang' alias, as in:

``` php
Route::get('/', function () {
    return view('welcome');
})->middleware('lang');
```

### Language switching routes

This package registers language switching routes. These routes update the currently
selected language and redirect back to the calling url.

The url '/lang/en' will switch the current language to English, the '/lang/fr' will switch the
current language to French.

Use its route name 'lang.switch' along with its languageCode parameter with url builders, as in:

``` php
url(route('lang.switch',['languageCode' => 'en']))
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mlatjac/fren.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mlatjac/fren.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/mlatjac/fren/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/mlatjac/fren
[link-downloads]: https://packagist.org/packages/mlatjac/fren
[link-travis]: https://travis-ci.org/mlatjac/fren
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/mlatjac
[link-contributors]: ../../contributors

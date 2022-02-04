# Switch string between: camel case, snake case, kebab case, pascal case

## Installation

You can install the package via composer:

```bash
composer require lenny4/php-swtich-case
```

## Usage

```php
$newString = Lenny4\SwtichCase::change('myStringInCamel', Lenny4\SwtichCase::KEBAB_CASE); // my-string-in-camel
```

Available cases:

- `Lenny4\SwtichCase::CAMEL_CASE`
- `Lenny4\SwtichCase::SNAKE_CASE`
- `Lenny4\SwtichCase::KEBAB_CASE`
- `Lenny4\SwtichCase::PASCAL_CASE`

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

You can launch this command to automatically create test if you create a new Case:

```bash
php src/generate-test.php
```

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Alexandre Beaujour](https://github.com/Lenny4)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

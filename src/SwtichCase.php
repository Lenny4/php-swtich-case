<?php

namespace Lenny4\SwtichCase;

use UnexpectedValueException;

class SwtichCase
{
    public const CAMEL_CASE = 'CAMEL_CASE'; // thisIsCamelCase
    public const SNAKE_CASE = 'SNAKE_CASE'; // this_is_snake_case
    public const KEBAB_CASE = 'KEBAB_CASE'; // this-is-kebab-case
    public const PASCAL_CASE = 'PASCAL_CASE'; // ThisIsPascalCase

    public const ALL_CASES = [
        self::CAMEL_CASE,
        self::SNAKE_CASE,
        self::KEBAB_CASE,
        self::PASCAL_CASE,
    ];

    private const REGEX_UNDERSCORE_MINUS = '/(_[a-z]|-[a-z])/';
    private const REGEX_MAJ = '/[A-Z]/';

    public static function change(string $string, string $case): string
    {
        switch ($case) {
            case self::CAMEL_CASE:
                return self::toCamelCase($string);
            case self::SNAKE_CASE:
                return self::toSnakeCase($string);
            case self::KEBAB_CASE:
                return self::toKebabCase($string);
            case self::PASCAL_CASE:
                return self::toPascalCase($string);
            default:
                throw new UnexpectedValueException('Expected value to be ' . print_r(self::ALL_CASES, true));
        }
    }

    private static function toCamelCase(string $string): string
    {
        return lcfirst(preg_replace_callback(
            self::REGEX_UNDERSCORE_MINUS,
            static function ($matches) {
                return str_replace(['_', '-'], '', strtoupper($matches[0]));
            },
            $string
        ));
    }

    private static function toSnakeCase(string $string): string
    {
        $result = strtolower(preg_replace_callback(
            self::REGEX_MAJ,
            static function ($matches) {
                return '_' . $matches[0];
            },
            str_replace('-', '_', $string)
        ));
        if (strpos($result, '_') === 0) {
            return substr($result, 1);
        }
        return $result;
    }

    private static function toKebabCase(string $string): string
    {
        $result = strtolower(preg_replace_callback(
            self::REGEX_MAJ,
            static function ($matches) {
                return '-' . $matches[0];
            },
            str_replace('_', '-', $string)
        ));
        if (strpos($result, '-') === 0) {
            return substr($result, 1);
        }
        return $result;
    }

    private static function toPascalCase(string $string): string
    {
        return ucfirst(self::toCamelCase($string));
    }
}

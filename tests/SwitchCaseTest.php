<?php

use Lenny4\SwtichCase\SwtichCase;

const CAMEL_CASE_EXAMPLE = 'thisIsAnExample';
const SNAKE_CASE_EXAMPLE = 'this_is_an_example';
const KEBAB_CASE_EXAMPLE = 'this-is-an-example';
const PASCAL_CASE_EXAMPLE = 'ThisIsAnExample';

it('SwtichCase::ALL_CASES has all cases', function () {
    $endWith = 'CASE';
    $switchCaseReflection = new ReflectionClass(SwtichCase::class);
    $allCases = [];
    /** @var ReflectionClassConstant $constant */
    foreach ($switchCaseReflection->getConstants() as $constant) {
        if (! is_string($constant)) {
            continue;
        }
        if (substr_compare($constant, $endWith, -strlen($endWith)) === 0) {
            $allCases[] = $constant;
        }
    }
    expect(array_values($allCases) === array_values(SwtichCase::ALL_CASES))->toBeTrue();
});

it('has all test created', function () {
    $fileContent = file_get_contents('tests/SwitchCaseTest.php');
    $errors = [];
    foreach (SwtichCase::ALL_CASES as $case1) {
        foreach (SwtichCase::ALL_CASES as $case2) {
            $test = 'can transform ' . $case1 . ' to ' . $case2;
            if (strpos($fileContent, $test) === false) {
                $errors[] = $test;
            }
        }
    }
    expect($errors)->toBeEmpty();
});

it('can transform CAMEL_CASE to CAMEL_CASE', function () {
    expect(CAMEL_CASE_EXAMPLE)->toBe(SwtichCase::change(CAMEL_CASE_EXAMPLE, SwtichCase::CAMEL_CASE));
});

it('can transform CAMEL_CASE to SNAKE_CASE', function () {
    expect(SNAKE_CASE_EXAMPLE)->toBe(SwtichCase::change(CAMEL_CASE_EXAMPLE, SwtichCase::SNAKE_CASE));
});

it('can transform CAMEL_CASE to KEBAB_CASE', function () {
    expect(KEBAB_CASE_EXAMPLE)->toBe(SwtichCase::change(CAMEL_CASE_EXAMPLE, SwtichCase::KEBAB_CASE));
});

it('can transform CAMEL_CASE to PASCAL_CASE', function () {
    expect(PASCAL_CASE_EXAMPLE)->toBe(SwtichCase::change(CAMEL_CASE_EXAMPLE, SwtichCase::PASCAL_CASE));
});

it('can transform SNAKE_CASE to CAMEL_CASE', function () {
    expect(CAMEL_CASE_EXAMPLE)->toBe(SwtichCase::change(SNAKE_CASE_EXAMPLE, SwtichCase::CAMEL_CASE));
});

it('can transform SNAKE_CASE to SNAKE_CASE', function () {
    expect(SNAKE_CASE_EXAMPLE)->toBe(SwtichCase::change(SNAKE_CASE_EXAMPLE, SwtichCase::SNAKE_CASE));
});

it('can transform SNAKE_CASE to KEBAB_CASE', function () {
    expect(KEBAB_CASE_EXAMPLE)->toBe(SwtichCase::change(SNAKE_CASE_EXAMPLE, SwtichCase::KEBAB_CASE));
});

it('can transform SNAKE_CASE to PASCAL_CASE', function () {
    expect(PASCAL_CASE_EXAMPLE)->toBe(SwtichCase::change(SNAKE_CASE_EXAMPLE, SwtichCase::PASCAL_CASE));
});

it('can transform KEBAB_CASE to CAMEL_CASE', function () {
    expect(CAMEL_CASE_EXAMPLE)->toBe(SwtichCase::change(KEBAB_CASE_EXAMPLE, SwtichCase::CAMEL_CASE));
});

it('can transform KEBAB_CASE to SNAKE_CASE', function () {
    expect(SNAKE_CASE_EXAMPLE)->toBe(SwtichCase::change(KEBAB_CASE_EXAMPLE, SwtichCase::SNAKE_CASE));
});

it('can transform KEBAB_CASE to KEBAB_CASE', function () {
    expect(KEBAB_CASE_EXAMPLE)->toBe(SwtichCase::change(KEBAB_CASE_EXAMPLE, SwtichCase::KEBAB_CASE));
});

it('can transform KEBAB_CASE to PASCAL_CASE', function () {
    expect(PASCAL_CASE_EXAMPLE)->toBe(SwtichCase::change(KEBAB_CASE_EXAMPLE, SwtichCase::PASCAL_CASE));
});

it('can transform PASCAL_CASE to CAMEL_CASE', function () {
    expect(CAMEL_CASE_EXAMPLE)->toBe(SwtichCase::change(PASCAL_CASE_EXAMPLE, SwtichCase::CAMEL_CASE));
});

it('can transform PASCAL_CASE to SNAKE_CASE', function () {
    expect(SNAKE_CASE_EXAMPLE)->toBe(SwtichCase::change(PASCAL_CASE_EXAMPLE, SwtichCase::SNAKE_CASE));
});

it('can transform PASCAL_CASE to KEBAB_CASE', function () {
    expect(KEBAB_CASE_EXAMPLE)->toBe(SwtichCase::change(PASCAL_CASE_EXAMPLE, SwtichCase::KEBAB_CASE));
});

it('can transform PASCAL_CASE to PASCAL_CASE', function () {
    expect(PASCAL_CASE_EXAMPLE)->toBe(SwtichCase::change(PASCAL_CASE_EXAMPLE, SwtichCase::PASCAL_CASE));
});

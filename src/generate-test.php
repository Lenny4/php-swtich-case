<?php

namespace Lenny4\SwtichCase;

require_once __DIR__ . '/SwtichCase.php';

$fileName = 'tests/SwitchCaseTest.php';
$breakline = '@@@';
$fileContent = file_get_contents($fileName);
$fileContent = str_replace("\n", $breakline, $fileContent);
$fileContent = preg_replace("/it\('can transform(.*)\);" . $breakline . "/", '', $fileContent);
$fileContent = str_replace($breakline, "\n", $fileContent);
while (substr($fileContent, -1) === "\n") {
    $fileContent = substr($fileContent, 0, -1);
}
$fileContent .= "\n\n";

foreach (SwtichCase::ALL_CASES as $case1) {
    foreach (SwtichCase::ALL_CASES as $case2) {
        $fileContent .= "it('can transform " . $case1 . " to " . $case2 . "', function () {
    expect(" . $case2 . "_EXAMPLE)->toBe(SwtichCase::change(" . $case1 . "_EXAMPLE, SwtichCase::" . $case2 . "));
});

";
    }
}

while (substr($fileContent, -1) === "\n") {
    $fileContent = substr($fileContent, 0, -1);
}
$fileContent .= "\n";

file_put_contents($fileName, $fileContent);

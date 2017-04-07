<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->exclude('src/XSD2PHP')
    ->files()
    ->name('*.php')
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(false)
    ->setRules([
        '@PSR2' => true,
        'array_syntax' => ['syntax' => 'long'],
    ])
    ->setUsingCache(true)
    ->setFinder($finder);
;

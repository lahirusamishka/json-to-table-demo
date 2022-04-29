<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude(
        [
            'storage/framework/views',
            'vendor',
        ]
    )
    ->in(__DIR__)
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true);

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PSR12' => true,
    'array_syntax' => [
        'syntax' => 'short',
    ],
    'array_indentation' => true,
    'binary_operator_spaces' => [
        'operators' => [
            '=' => 'single_space',
            '=>' => 'single_space',
        ]
    ],
    'blank_line_after_opening_tag' => true,
    'blank_line_before_statement' => true,
    'cast_spaces' => [
        'space' => 'single',
    ],
    'class_attributes_separation' => [
        'elements' => [
            'method' => 'one',
        ],
    ],
    'concat_space' => [
        'spacing' => 'one',
    ],
    'method_chaining_indentation' => true,
    'no_extra_blank_lines' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'no_unused_imports' => true,
    'no_whitespace_in_blank_line' => true,
    'ordered_class_elements' => [
        'sort_algorithm' => 'alpha',
    ],
    'ordered_imports' => [
        'imports_order' => [
            'class',
            'function',
            'const',
        ],
    ],
    'single_quote' => true,
    'trailing_comma_in_multiline' => true,
    'whitespace_after_comma_in_array' => true,
])
    ->setFinder($finder);
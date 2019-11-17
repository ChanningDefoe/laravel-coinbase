<?php

$finder = PhpCsFixer\Finder::create()
    ->in('src')
    ->in('config')
    ->in('tests')
;

return PhpCsFixer\Config::create()
    ->setUsingCache(false)
    ->setRules([
        '@PSR2' => true,
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'blank_line_before_statement' => true,
        'no_blank_lines_after_class_opening' => true,
        'no_blank_lines_after_phpdoc' => true,
        'cast_spaces' => true,
        'array_syntax' => ['syntax' => 'short'],
        'whitespace_after_comma_in_array' => true,
        'trailing_comma_in_multiline_array' => true,
        'array_indentation' => true,
        'function_typehint_space' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'no_unused_imports' => true,
        'return_type_declaration' => ['space_before' => 'one'],
        'ordered_imports' => ['sort_algorithm' => 'length'],
        'no_extra_blank_lines' => ['tokens' => ['extra']]
    ])
    ->setFinder($finder)
;
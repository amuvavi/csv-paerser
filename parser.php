<?php

require 'vendor/autoload.php';

use SupplierProductListProcessor\ProductProcessor;
use SupplierProductListProcessor\Parser\CsvParser;

// Command-line arguments
$options = getopt('', ['file:', 'unique-combinations:']);

if (!isset($options['file']) || !isset($options['unique-combinations'])) {
    die("Usage: php parser.php --file=<input_file> --unique-combinations=<output_file>\n");
}

$inputFile = $options['file'];
$outputFile = $options['unique-combinations'];

// Initialising parser and processor
$parser = new CsvParser();
$processor = new ProductProcessor($parser);

// Processing the file
$processor->process($inputFile, $outputFile);

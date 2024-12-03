<?php

namespace SupplierProductListProcessor;

use SupplierProductListProcessor\Parser\ParserInterface;

class ProductProcessor {
    private $parser;

    public function __construct(ParserInterface $parser) {
        $this->parser = $parser;
    }

    /**
     * Processing the file and generate unique combinations count.
     *
     * @param string $filePath
     * @param string $outputPath
     */
    public function process(string $filePath, string $outputPath): void {
        $products = $this->parser->parse($filePath);
        $combinations = [];

        foreach ($products as $product) {
            $key = $this->generateKey($product);
            if (!isset($combinations[$key])) {
                $combinations[$key] = 0;
            }
            $combinations[$key]++;
            echo $product . PHP_EOL;
        }

        $this->writeCombinations($combinations, $outputPath);
    }

    /**
     * Generating a unique key for the product combination.
     *
     * @param Product $product
     * @return string
     */
    private function generateKey(Product $product): string {
        return implode('|', [
            $product->getMake(),
            $product->getModel(),
            $product->getColour(),
            $product->getCapacity(),
            $product->getNetwork(),
            $product->getGrade(),
            $product->getCondition()
        ]);
    }

    /**
     * Writing the combinations to a file.
     *
     * @param array $combinations
     * @param string $outputPath
     */
    private function writeCombinations(array $combinations, string $outputPath): void {
        $file = fopen($outputPath, 'w');
        foreach ($combinations as $key => $count) {
            $data = explode('|', $key);
            $data[] = $count;
            fputcsv($file, $data);
        }
        fclose($file);
    }
}

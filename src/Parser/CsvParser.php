<?php

namespace SupplierProductListProcessor\Parser;

use SupplierProductListProcessor\ProductFactory;

class CsvParser implements ParserInterface {
    /**
     * Parsing the CSV file and return an array of Product objects.
     *
     * @param string $filePath
     * @return array
     */
    public function parse(string $filePath): array {
        $products = [];
        if (($handle = fopen($filePath, 'r')) !== false) {
            $headers = fgetcsv($handle, 1000, ",");
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $productData = array_combine($headers, $data);
                $products[] = ProductFactory::create($productData);
            }
            fclose($handle);
        }
        return $products;
    }
}

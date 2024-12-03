<?php

namespace SupplierProductListProcessor\Parser;

interface ParserInterface {
    /**
     * Parse the given file and return an array of Product objects.
     *
     * @param string $filePath
     * @return array
     */
    public function parse(string $filePath): array;
}

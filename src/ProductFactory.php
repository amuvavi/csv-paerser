<?php

namespace SupplierProductListProcessor;

class ProductFactory {
    /**
     * Creating a Product object from an array of data.
     *
     * @param array $data
     * @return Product
     */
    public static function create(array $data): Product {
        return new Product($data);
    }
}

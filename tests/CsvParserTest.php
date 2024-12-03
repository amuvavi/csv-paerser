<?php

use PHPUnit\Framework\TestCase;
use SupplierProductListProcessor\Parser\CsvParser;
use SupplierProductListProcessor\Product;

class CsvParserTest extends TestCase {
    public function testParseValidCsv() {
        $csvContent = "make,model,colour,capacity,network,grade,condition\nApple,iPhone 6s Plus,Red,256GB,Unlocked,Grade A,Working";
        $filePath = sys_get_temp_dir() . '/test.csv';
        file_put_contents($filePath, $csvContent);

        $parser = new CsvParser();
        $products = $parser->parse($filePath);

        $this->assertCount(1, $products);
        $this->assertInstanceOf(Product::class, $products[0]);
        $this->assertEquals('Apple', $products[0]->getMake());
        $this->assertEquals('iPhone 6s Plus', $products[0]->getModel());
        $this->assertEquals('Red', $products[0]->getColour());
        $this->assertEquals('256GB', $products[0]->getCapacity());
        $this->assertEquals('Unlocked', $products[0]->getNetwork());
        $this->assertEquals('Grade A', $products[0]->getGrade());
        $this->assertEquals('Working', $products[0]->getCondition());

        unlink($filePath);
    }

    public function testMissingRequiredFields() {
        $csvContent = "make,model\n,\n";
        $filePath = sys_get_temp_dir() . '/test_missing.csv';
        file_put_contents($filePath, $csvContent);

        $parser = new CsvParser();

        $this->expectException(InvalidArgumentException::class);
        $parser->parse($filePath);

        unlink($filePath);
    }
}

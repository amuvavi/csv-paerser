# Supplier Product List Processor

This PHP application processes supplier product lists in CSV format, converting them into `Product` objects and generating unique combination counts.

## Requirements

- PHP 7+
- Composer

## Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd SupplierProductListProcessor
   ```

2. Install dependencies using Composer:
   ```bash
   composer install
   ```

## Usage

Run the application from the command line:

```bash
php parser.php --file=examples/example_1.csv --unique-combinations=combination_count.csv
```

- `--file`: Path to the input CSV file.
- `--unique-combinations`: Path to the output file for unique combinations.

## Testing

Run the unit tests using PHPUnit:

```bash
vendor/bin/phpunit tests
```

## Design Principles

- Adheres to SOLID principles and OOP design patterns.
- Uses Dependency Injection for flexibility and testability.
- Supports future extension for additional file formats.

## Future Enhancements

- Support for JSON and XML file formats.
- Improved error handling and logging.
- Performance optimizations for large files.

<?php

namespace SupplierProductListProcessor;

class Product {
    private $make;
    private $model;
    private $colour;
    private $capacity;
    private $network;
    private $grade;
    private $condition;

    public function __construct(array $data) {
        if (empty($data['make']) || empty($data['model'])) {
            throw new \InvalidArgumentException('Make and model are required fields.');
        }
        $this->make = $data['make'];
        $this->model = $data['model'];
        $this->colour = $data['colour'] ?? null;
        $this->capacity = $data['capacity'] ?? null;
        $this->network = $data['network'] ?? null;
        $this->grade = $data['grade'] ?? null;
        $this->condition = $data['condition'] ?? null;
    }

    public function __toString() {
        return json_encode(get_object_vars($this));
    }

    public function getMake() {
        return $this->make;
    }

    public function getModel() {
        return $this->model;
    }

    public function getColour() {
        return $this->colour;
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function getNetwork() {
        return $this->network;
    }

    public function getGrade() {
        return $this->grade;
    }

    public function getCondition() {
        return $this->condition;
    }

}

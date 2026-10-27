<?php

class Validation {
    private array $errors = [];

    public function required($field, $value) {
        if (empty(trim($value))) {
            $this->errors[$field][] = ucfirst($field) . " is required.";
        }
    }

    public function email($field, $value) {
        if (!empty($value) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = ucfirst($field) . " must be a valid email address."; 
        }
    }

    public function min($field, $value, $minLimit) {
        if (!empty($value) && strlen(trim($value)) < $minLimit) {
            $this->errors[$field][] = ucfirst($field) . " must be at least $minLimit characters."; 
        }
    }

    public function hasError(): bool {
        return !empty($this->errors);
    }

    public function getErrors(): array {
        return $this->errors;
    }
}
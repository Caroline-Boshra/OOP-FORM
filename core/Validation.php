<?php

class Validation {

    private array $errors = [];
    private array $data = [];

    public function __construct(array $data = null) {
        $this->data = $data ?? $_POST;
    }

    public function validate(array $rules) {
        foreach ($rules as $field => $fieldRules) {
            $value = trim($this->data[$field] ?? '');

            foreach ($fieldRules as $rule) {
                $ruleName = $rule;
                $ruleParam = null;

                if (str_contains($rule, ':')) {
                    [$ruleName, $ruleParam] = explode(':', $rule);
                }

                switch ($ruleName) {
                    case 'required':
                        if (empty($value) && $value !== '0') {
                            $this->errors[$field][] = ucfirst($field) . " is required.";
                        }
                        break;

                    case 'email':
                        if (!empty($value) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $this->errors[$field][] = ucfirst($field) . " must be a valid email address.";
                        }
                        break;

                    case 'string':
                    case 'srting': 
                        if (!empty($value) && !is_string($value)) {
                            $this->errors[$field][] = ucfirst($field) . " must be a string.";
                        }
                        break;

                    case 'min':
                        if (!empty($value) && strlen($value) < (int)$ruleParam) {
                            $this->errors[$field][] = ucfirst($field) . " must be at least $ruleParam characters.";
                        }
                        break;
                }
            }
        }
    }

    public function getErrors(): array {
        return $this->errors;
    }
}

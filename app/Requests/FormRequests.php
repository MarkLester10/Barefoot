<?php
const RULE_REQUIRED = 'required';
const RULE_EMAIL = 'email';
const RULE_MIN = 'min';
const RULE_MAX = 'max';
const RULE_MATCH = 'match';
const RULE_UNIQUE = 'unique';
const RULE_EXISTS = 'exists';
function validate($request, $rulesArray)
{
  $errors = array();

  foreach ($rulesArray as $attribute => $rules) {
    $value = $request[$attribute];
    foreach ($rules as $rule) {
      $ruleName = $rule;

      if (!is_string($ruleName)) {
        $ruleName = $rule[0]; //first element in array as rule name
      }

      if ($ruleName === RULE_REQUIRED && empty($value)) {
        $attrName = ucfirst($attribute);
        // $errors[$attribute] = "{$attrName} is required.";
        $errors[$attribute] = "This field is required.";
      }

      if ($ruleName === RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $errors[$attribute] = "Email must be a valid email address.";
      }

      if ($ruleName === RULE_MIN && strlen($value) < $rule['min']) {
        $errors[$attribute] = "Minimum length of this field must be {$rule['min']}";
      }

      if ($ruleName === RULE_MAX && strlen($value) > $rule['max']) {
        $errors[$attribute] = "Maximun length of this field must be {$rule['max']}";
      }

      if ($ruleName === RULE_MATCH && $value !== $request[$rule['match']]) {
        $attr = $rule['match'];
        $errors[$attr] = "Please make sure your passwords match";
      }

      if ($ruleName === RULE_UNIQUE) {
        $uniqueAttr = $rule['unique'];
        $user = selectOne($rule['table'], [$uniqueAttr => $request[$uniqueAttr]]);
        if ($user) {
          $errors[$attribute] = "{$uniqueAttr} already exists.";
        }
      }

      if ($ruleName === RULE_EXISTS) {
        $existsAttr = $rule['exists'];
        $user = selectOne($rule['table'], [$existsAttr => $request[$existsAttr]]);
        if (!$user) {
          $attrName = ucfirst($existsAttr);
          $errors[$attribute] = "{$attrName} doesn't exists.";
        }
      }
    }
  }
  return $errors;
}
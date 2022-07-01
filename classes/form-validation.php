<?php

class Validator
{

  private $formData;
  private $errors = [];
  private $formFields = ['firstName', 'lastName', 'email'];

  public function __construct($formData)
  {
    $this->formData = $formData;
  }

  public function validateForm()
  {
    foreach ($this->formFields as $field) {
      if (!array_key_exists($field, $this->formData)) {
        trigger_error("$field is not present in data");
        return;
      }
    }

    $this->validateFirstName();
    $this->validateLastName();
    $this->validateEmail();

    return $this->errors;
  }

  private function validateFirstName()
  {
    $firstName = trim($this->formData['firstName']);

    if (empty($firstName)) {
      $this->addError("firstName", 'First name cannot be empty!');
    } else {
      if (preg_match('/[0-9]+/', $firstName)) {
        $this->addError("firstName", 'First name cannot contain numbers!');
      } else {
        if (!preg_match('/^[a-zA-Z]{2,50}$/', $firstName)) {
          $this->addError("firstName", 'First name must be 2-50 characters long!');
        }
      }
    }
  }

  private function validateLastName()
  {
    $lastName = trim($this->formData['lastName']);

    if (empty($lastName)) {
      $this->addError("lastName", 'Last name cannot be empty!');
    } else {
      if (preg_match('/[0-9]+/', $lastName)) {
        $this->addError("lastName", 'Last name cannot contain numbers!');
      } else {
        if (!preg_match('/^[a-zA-Z]{2,50}$/', $lastName)) {
          $this->addError("lastName", 'Last name must be 2-50 characters long!');
        }
      }
    }
  }

  private function validateEmail()
  {
    $email = trim($this->formData['email']);

    if (empty($email)) {
      $this->addError('email', 'email cannot be empty!');
    } else {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->addError('email', 'email is not valid!');
      }
    }
  }

  private function addError($key, $value)
  {
    $this->errors[$key] = $value;
  }
}
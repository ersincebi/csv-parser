<?php

namespace App\Results;

class ApiResult
{
    private bool $success = false;

    private string $message = '';

    private array $errors = [];

    private string|null $data = null;

    /**
     * @return bool
     */
    final public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @param bool $success
     */
    final public function setSuccess(bool $success): void
    {
        $this->success = $success;
    }

    /**
     * @return string
     */
    final public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    final public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return array
     */
    final public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    final public function setErrors(array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * @return void
     */
    final public function appendError(array $errors): void
    {
        $this->errors = array_merge($this->errors, $errors);
    }

    /**
     * @param array $error
     * @return void
     */
    final public function addError(array $error): void
    {
        $this->errors[] = $error;
    }

    /**
     * @return string|null
     */
    final public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    final public function setData(string $data): void
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    final public function toArray(): array
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
            'errors' => $this->errors,
            'data' => $this->data
        ];
    }
}

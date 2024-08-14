<?php

namespace App\Application\Services;
class ResponseService
{
    private array $data;
    private bool $isSuccess;

    /**
     * Create a new class instance.
     */
    public function __construct(array $data, bool $isSuccess = true)
    {
        $this->data = $data;
        $this->isSuccess = $isSuccess;
    }

    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    public function getData()
    {
        return $this->data;
    }

    public function toArray(): array
    {
        $result = [
            'success' => $this->isSuccess(),
        ];

        if ($this->isSuccess()) {
            $result['data'] = $this->getData();
        } else {
            $result['errors'] = $this->getData();
        }
        return $result;
    }
}

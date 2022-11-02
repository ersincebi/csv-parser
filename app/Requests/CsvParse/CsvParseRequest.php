<?php

namespace App\Requests\CsvParse;

class CsvParseRequest
{
    /**
     * @var int|null
     */
    private ?int $employeeId;

    /**
     * @var string|null
     */
    private ?string $name;

    /**
     * @var string|null
     */
    private ?string $surname;

    /**
     * @var string|null
     */
    private ?string $email;

    /**
     * @var string|null
     */
    private ?string $phone;

    /**
     * @var int|null
     */
    private ?int $point;

    /**
     * @param int $employeeId
     * @param string $name
     * @param string $surname
     * @param string $email
     * @param string $phone
     * @param int $point
     * @return void
     */
    public function __construct(
        string $name,
        string $surname,
        string $email,
        int $employeeId,
        string $phone,
        int $point
    )
    {
        $this->employeeId = $employeeId;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;

        if ($phone[0] !== '0' && preg_match('~(\d+)~', $phone)) {
            $this->phone = $phone;
        } else {
            $phone = preg_replace(['/\s+/','/-/'], ['_', ''], $phone);
            $this->phone = substr($phone, 1);
        }

        $this->point = $point;
    }
    /**
     * @return int|null
     */
    public function getEmployeeId(): ?int
    {
        return $this->employeeId;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return int|null
     */
    public function getPoint(): ?int
    {
        return $this->point;
    }
}

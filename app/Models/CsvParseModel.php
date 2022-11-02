<?php

namespace App\Models;

use App\Constants\EmployeeConstants;
use App\Requests\CsvParse\CsvParseRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CsvParseModel extends Model
{
    protected $table = 'employee';

    public $timestamps = false;

    /**
     * @param CsvParseRequest $csvParseRequest
     * @return bool
     */
    public static function add(CsvParseRequest $csvParseRequest): bool
    {
        $query = new self();

        $query[EmployeeConstants::EMPLOYEE_ID] = $csvParseRequest->getEmployeeId();
        $query[EmployeeConstants::NAME] = $csvParseRequest->getName();
        $query[EmployeeConstants::SURNAME] = $csvParseRequest->getSurname();
        $query[EmployeeConstants::PHONE] = $csvParseRequest->getPhone();
        $query[EmployeeConstants::POINT] = $csvParseRequest->getPoint();
        $query[EmployeeConstants::EMAIL] = $csvParseRequest->getEmail();

        return $query->save();
    }

    public static function hasEmployeeIdOrEmail(CsvParseRequest $csvParseRequest): bool
    {
        return self::where(EmployeeConstants::EMPLOYEE_ID, $csvParseRequest->getEmployeeId())
            ->orWhere(EmployeeConstants::NAME, $csvParseRequest->getName())
            ->count();
    }

    /**
     * @return Collection
     */
    public static function getList(): Collection
    {
        return self::all();
    }
}

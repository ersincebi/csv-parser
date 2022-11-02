<?php

namespace App\Mappers;

use App\Requests\CsvParse\CsvParseRequest;
use Illuminate\Http\Request;
use ReflectionClass;

abstract class CsvFileMapper
{
    /**
     * @param Request $request
     * @return array
     */
    public static function map(Request $request): array
    {
        $filePath = $request->file('csvFile')->getRealPath();

        if (($open = fopen($filePath, "r")) !== FALSE) {
            if(!feof($open)) { fgetcsv($open); }
            while (($row = fgetcsv($open, 1000, ",")) !== FALSE) {
                $reflect  = new ReflectionClass(CsvParseRequest::class);
                $data[] = $reflect->newInstanceArgs(explode(';', $row[0]));
            }
            fclose($open);
        }

        return $data;
    }
}

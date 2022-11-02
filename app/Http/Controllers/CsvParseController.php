<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Mappers\CsvFileMapper;
use App\Services\CsvParseService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JsonException;

class CsvParseController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     * @throws JsonException
     */
    public function index(Request $request)
    {
        return view('index', ['list' => CsvParseService::getList()]);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function uploadCsv(Request $request): JsonResponse
    {
        $csvMapRequest = CsvFileMapper::map($request);
        $csvResult = CsvParseService::add($csvMapRequest);

        return response()->json(GlobalHelper::objectToArray($csvResult));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws JsonException
     */
    public function getList(Request $request): JsonResponse
    {
        return response()->json(GlobalHelper::objectToArray(CsvParseService::getList()));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Services\BookService;

class BookController extends Controller
{

    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function schedule(ScheduleRequest $request)
    {
        $output = [
            'status' => "failed",
            'message' => '',
            'data' => []
        ];

        try{
            $output['status'] = "success";
            $output['data'] = $this->bookService->calculateSchedule($request->start_date, $request->chapter_sessions, $request->working_days, 30);
        }catch (\Exception $e)
        {
            $output['message'] = $e->getMessage();
        }
        return response()->json($output);
    }
}

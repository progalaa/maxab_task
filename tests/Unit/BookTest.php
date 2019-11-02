<?php

namespace Tests\Unit;

use App\Services\BookService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * Test Calculate Schedule method
     *
     * @return void
     */
    public function testCalculateSchedule()
    {
        $startDate = "2019-01-01";
        $chapterSessions = 2;
        $workingDays = [2,3,4];
        $chapterCount = 2;

        $expectedSchedules = ["2019-01-01","2019-01-06","2019-01-07","2019-01-08"];
        $realSchedules = app(BookService::class)->calculateSchedule($startDate, $chapterSessions, $workingDays, $chapterCount);
        $this->assertEquals($expectedSchedules, $realSchedules);
    }
}

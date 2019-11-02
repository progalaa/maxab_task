<?php
namespace App\Services;

use Carbon\Carbon;

class BookService
{
    /**
     * Get the sessions schedule for this student until he finishes the 30 chapters
     * @param $startDate
     * @param int $chapterSessions
     * @param array $workingDays
     * @param int $chapterCount
     * @return array
     * @throws \Exception
     */
    public function calculateSchedule($startDate, int $chapterSessions, array $workingDays, int $chapterCount = 30)
    {
        $sessions = [];

        //calculate total number of sessions for all chapters
        $allSessionsCount = $chapterCount * $chapterSessions;

        $currentDate = new Carbon($startDate);

        //loop on all of these weeks starting from today till finalizing all chapters
        while(count($sessions) != $allSessionsCount)
        {
            if( in_array( $this->convertDayFromISOToSystem($currentDate->dayOfWeekIso), $workingDays )){
                $sessions[] = $currentDate->toDateString();
            }
            $currentDate = $currentDate->addDay();
        }

        return $sessions;
    }

    /**
     * Convert day of week ISO number to Out System number
     * @param $dayOfWeekIso
     * @return mixed
     */
    private function convertDayFromISOToSystem($dayOfWeekIso){
        //map default week days with this system week days (ISO => our system)
        $days_map = [
            6 => 1, //Sat
            7 => 2, //Sun
            1 => 3, //Mon
            2 => 4, //Tue
            3 => 5, //Wed
            4 => 6, //Thu
            5 => 7  //Fri
        ];

        return $days_map[$dayOfWeekIso];
    }
}

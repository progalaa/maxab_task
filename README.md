# maxab_task

You can use this url to check the response http://localhost:8000/api/books/schedule?start_date=2019-11-01&working_days[0]=1&working_days[1]=2&working_days[2]=3&chapter_sessions=1

start_date: start date for reading this book

working_days: int array with number of days per week assuming the start of the week is Saturday.(from 1 to 7)

chapter_sessions: How many sessions required to finish one chapter.

You can Find Fils to Check: 
routes/api.php >> added route for API 
Controllers/BookController.php >> function code calling service
Services/BookService.php >> Sercice Layer class
Requests/ScheduleRequest.php >> Request validation
tests/unit/BookTest.php >> Unit testing for API.

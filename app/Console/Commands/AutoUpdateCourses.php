<?php

namespace App\Console\Commands;

use App\Models\Course;
use Illuminate\Console\Command;

class AutoUpdateCourses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:courses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Update Published In Courses';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $courses = Course::query()->where('published', 0)->get() ;
       foreach ($courses as $course){
          $course->update(['published' => 1]) ;
       }
    }
}

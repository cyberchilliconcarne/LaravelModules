<?php

namespace App\Http\Controllers\Admin\Task;

use App\Http\Controllers\Controller;
use App\Models\Task\Task;

class TasksCalendarController extends Controller
{
    public function index()
    {
        $events = Task::whereNotNull('due_date')->get();

        return view('admin.tasksCalendars.index', compact('events'));
    }
}

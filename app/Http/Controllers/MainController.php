<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class MainController extends Controller
{
    public function index() 
    {
        $courses = Course::all();
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;

        return view('main', compact('courses', 'userId', 'userName'));
    }

}

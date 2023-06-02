<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Course;

class MainController extends Controller
{
    public function index() 
    {
        $courses = Course::all();
        return view('admin.main', compact('courses'));
    }

}

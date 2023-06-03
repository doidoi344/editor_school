<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Course;

class MainController extends Controller
{
    public function index() 
    {
        $courses = Course::all();

        $admin_user_name = auth()->user()->name;
        return view('admin.main', compact('courses', 'admin_user_name'));
    }

}

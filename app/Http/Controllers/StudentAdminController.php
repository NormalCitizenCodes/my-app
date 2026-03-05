<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentAdminController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Only admin can see all students',
            'data' => Student::all(),
        ]);
    }
}


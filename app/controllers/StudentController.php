<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['student_access'] = true;

    $this->call->view('student/home');
}
    public function profile()
    {
        $student = [
            'student_id' => '2024-01607',
            'name' => 'Sarah Orzales',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => 'F6',
            'email' => 'sarahorzales@gmail.com'
        ];

    $data = [
        'student' => $student
        
            ];

        $this->call->view('student/profile', $data);
    }
    
}
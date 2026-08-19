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

        $student = [
            'student_id' => '2024-01607',
            'name' => 'Sarah Orzales',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => 'F6',
            'email' => 'sarahorzales@gmail.com',
            'address' => 'Personas, Calapan City',
            'skills' => [
                'Organization',
                'Flexibility',
                'UI/UX Design'
            ],
            'hobbies' => [
                'Reading',
                'Writing',
                'Cooking'
            ],
            'profile_description' =>
                'Just a girl in tech who is constantly seeking opportunities to enhance my skills and knowledge in the field of technology. I am a team player, adaptable, and always eager to take on new challenges.',
            'social_media' => [
                'tiktok' => 'https://www.tiktok.com/amidstdsea'
            ]
        ];

        $data = [
            'student' => $student
        ];

        $this->call->view('student/home', $data);
    }

    public function profile()
    {
        $student = [
            'student_id' => '2024-01607',
            'name' => 'Sarah Orzales',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => 'F6',
            'email' => 'sarahorzales@gmail.com',
            'address' => 'Personas, Calapan City',
            'skills' => [
                'Organization',
                'Flexibility',
                'UI/UX Design'
            ],
            'hobbies' => [
                'Reading',
                'Writing',
                'Cooking'
            ],
            'profile_description' =>
                'Just a girl in tech who is constantly seeking opportunities to enhance my skills and knowledge in the field of technology. I am a team player, adaptable, and always eager to take on new challenges.',
            'social_media' => [
                'tiktok' => 'https://www.tiktok.com/amidstdsea'
            ]
        ];

        $data = [
            'student' => $student
        ];

        $this->call->view('student/profile', $data);
    }
}
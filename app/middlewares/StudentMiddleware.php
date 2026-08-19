<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentMiddleware
{
    public function handle(Closure $next)
    {
        // Start the PHP session if it is not already active
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if student access is allowed
        if (!isset($_SESSION['student_access']) || $_SESSION['student_access'] !== true) {
            header('Location: /LavaLust/student');
            exit;
        }

        return $next();
    }
}
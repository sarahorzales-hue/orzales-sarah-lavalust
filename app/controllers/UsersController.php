<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->model('UsersModel');
        $this->call->library('form_validation');
    }

    // READ
    public function index()
    {
        $users = $this->UsersModel->all();

        $data = [
            'users' => $users
        ];

        $this->call->view('users/index', $data);
    }

    // CREATE
    public function create()
    {
        if ($this->form_validation->submitted()) {

            $valid = $this->form_validation->validate(
                [
                    'firstname|First Name' => 'required',
                    'lastname|Last Name' => 'required',
                    'year|Year' => 'required',
                    'course|Course' => 'required',
                    'username|Username' => 'required|min_length[5]',
                    'password|Password' => 'required|min_length[8]',
                    'confirm_password|Confirm Password' => 'required|matches[password]'
                ],
                [
                    'firstname' => [
                        'required' => 'First name is required.'
                    ],
                    'lastname' => [
                        'required' => 'Last name is required.'
                    ],
                    'year' => [
                        'required' => 'Year is required.'
                    ],
                    'course' => [
                        'required' => 'Course is required.'
                    ],
                    'username' => [
                        'required' => 'Username is required.',
                        'min_length' => 'Username requires 5 characters long.'
                    ],
                    'password' => [
                        'required' => 'Password is required.',
                        'min_length' => 'Password requires 8 characters long.'
                    ],
                    'confirm_password' => [
                        'required' => 'Please confirm your password.',
                        'matches' => 'Passwords do not match.'
                    ]
                ]
            );

            if ($valid) {

                $username = $this->io->post('username');

                $existing_user = $this->UsersModel->find_by(
                    'username',
                    $username
                );

                if ($existing_user) {

                    $data = [
                        'error' => 'Username already exists.'
                    ];

                    $this->call->view('users/create', $data);
                    return;
                }

                $password = password_hash(
                    $this->io->post('password'),
                    PASSWORD_DEFAULT
                );

                $this->UsersModel->insert([
                    'firstname' => $this->io->post('firstname'),
                    'lastname' => $this->io->post('lastname'),
                    'year' => $this->io->post('year'),
                    'course' => $this->io->post('course'),
                    'email' => '',
                    'username' => $username,
                    'password' => $password
                ]);

                redirect('/users');
                return;
            }
        }

        $this->call->view('users/create');
    }

    // UPDATE
    public function edit($id)
    {
        $user = $this->UsersModel->find($id);

        if (!$user) {
            redirect('/users');
            return;
        }

        $error = '';

        if ($this->form_validation->submitted()) {

            $valid = $this->form_validation->validate(
                [
                    'firstname|First Name' => 'required',
                    'lastname|Last Name' => 'required',
                    'year|Year' => 'required',
                    'course|Course' => 'required',
                    'username|Username' => 'required|min_length[5]'
                ],
                [
                    'firstname' => [
                        'required' => 'First name is required.'
                    ],
                    'lastname' => [
                        'required' => 'Last name is required.'
                    ],
                    'year' => [
                        'required' => 'Year is required.'
                    ],
                    'course' => [
                        'required' => 'Course is required.'
                    ],
                    'username' => [
                        'required' => 'Username is required.',
                        'min_length' => 'Username requires 5 characters long.'
                    ]
                ]
            );

            $password = $this->io->post('password');
            $confirm_password = $this->io->post('confirm_password');

            // Only validate password if the user entered a new password
            if ($valid && $password !== '') {

                $valid = $this->form_validation->validate(
                    [
                        'password|Password' => 'required|min_length[8]',
                        'confirm_password|Confirm Password' => 'required|matches[password]'
                    ],
                    [
                        'password' => [
                            'min_length' => 'Password requires 8 characters long.'
                        ],
                        'confirm_password' => [
                            'matches' => 'Passwords do not match.'
                        ]
                    ]
                );
            }

            if ($valid) {

                $username = $this->io->post('username');

                $existing_user = $this->UsersModel->find_by(
                    'username',
                    $username
                );

                if ($existing_user && $existing_user['id'] != $id) {

                    $error = 'Username already exists.';

                } else {

                    $update_data = [
                        'firstname' => $this->io->post('firstname'),
                        'lastname' => $this->io->post('lastname'),
                        'year' => $this->io->post('year'),
                        'course' => $this->io->post('course'),
                        'username' => $username
                    ];

                    if ($password !== '') {
                        $update_data['password'] = password_hash(
                            $password,
                            PASSWORD_DEFAULT
                        );
                    }

                    $this->UsersModel->update(
                        $id,
                        $update_data
                    );

                    redirect('/users');
                    return;
                }
            }
        }

        $user = $this->UsersModel->find($id);

        $data = [
            'user' => $user,
            'error' => $error
        ];

        $this->call->view('users/edit', $data);
    }

    // DELETE - SOFT DELETE
    public function delete($id)
    {
        $this->UsersModel->soft_delete($id);

        redirect('/users');
    }
}
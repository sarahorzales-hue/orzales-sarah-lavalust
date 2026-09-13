<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->model('ProductModel');
        $this->call->library('form_validation');
        $this->call->library('session');
    }

    // =========================
    // AUTHENTICATION
    // =========================

    private function check_login()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('/login');
            exit;
        }
    }

    // =========================
    // LOGIN
    // =========================

    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('/products');
            return;
        }

        $error = '';

        if ($this->form_validation->submitted()) {

            $username = $this->io->post('username');
            $password = $this->io->post('password');

            if ($username === 'admin' && $password === 'admin12345') {

                $this->session->set_userdata([
                    'logged_in' => true,
                    'username' => $username
                ]);

                redirect('/products');
                return;

            } else {

                $error = 'Invalid username or password.';
            }
        }

        $data = [
            'error' => $error
        ];

        $this->call->view('products/login', $data);
    }

    // =========================
    // LOGOUT
    // =========================

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('/login');
    }

    // =========================
    // READ - PRODUCT LIST
    // =========================

    public function index()
    {
        $this->check_login();

        $products = $this->ProductModel->all();

        $data = [
            'products' => $products
        ];

        $this->call->view('products/index', $data);
    }

    // =========================
    // CREATE
    // =========================

    public function create()
    {
        $this->check_login();

        if ($this->form_validation->submitted()) {

            $valid = $this->form_validation->validate(
                [
                    'product_name|Product Name' => 'required',
                    'description|Description' => 'required',
                    'price|Price' => 'required',
                    'quantity|Quantity' => 'required'
                ],
                [
                    'product_name' => [
                        'required' => 'Product name is required.'
                    ],
                    'description' => [
                        'required' => 'Description is required.'
                    ],
                    'price' => [
                        'required' => 'Price is required.'
                    ],
                    'quantity' => [
                        'required' => 'Quantity is required.'
                    ]
                ]
            );

            if ($valid) {

                $this->ProductModel->insert([
                    'product_name' => $this->io->post('product_name'),
                    'description' => $this->io->post('description'),
                    'price' => $this->io->post('price'),
                    'quantity' => $this->io->post('quantity')
                ]);

                redirect('/products');
                return;
            }
        }

        $this->call->view('products/create');
    }

    // =========================
    // UPDATE
    // =========================

    public function edit($id)
    {
        $this->check_login();

        $product = $this->ProductModel->find($id);

        if (!$product) {
            redirect('/products');
            return;
        }

        if ($this->form_validation->submitted()) {

            $valid = $this->form_validation->validate(
                [
                    'product_name|Product Name' => 'required',
                    'description|Description' => 'required',
                    'price|Price' => 'required',
                    'quantity|Quantity' => 'required'
                ],
                [
                    'product_name' => [
                        'required' => 'Product name is required.'
                    ],
                    'description' => [
                        'required' => 'Description is required.'
                    ],
                    'price' => [
                        'required' => 'Price is required.'
                    ],
                    'quantity' => [
                        'required' => 'Quantity is required.'
                    ]
                ]
            );

            if ($valid) {

                $this->ProductModel->update(
                    $id,
                    [
                        'product_name' => $this->io->post('product_name'),
                        'description' => $this->io->post('description'),
                        'price' => $this->io->post('price'),
                        'quantity' => $this->io->post('quantity')
                    ]
                );

                redirect('/products');
                return;
            }
        }

        $product = $this->ProductModel->find($id);

        $data = [
            'product' => $product
        ];

        $this->call->view('products/edit', $data);
    }

    // =========================
    // DELETE
    // =========================

    public function delete($id)
    {
        $this->check_login();

        $product = $this->ProductModel->find($id);

        if ($product) {
            $this->ProductModel->delete($id);
        }

        redirect('/products');
    }
}
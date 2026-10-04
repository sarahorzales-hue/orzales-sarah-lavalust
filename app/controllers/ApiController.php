<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiController extends Controller
{
    private $api;

    public function __construct()
    {
        parent::__construct();

        $this->call->model('ProductModel');
        $this->call->library('api');

        $this->api = $this->api;
    }

    /*
    |--------------------------------------------------------------------------
    | API LOGIN
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        $this->api->require_method('POST');

        $data = $this->api->body();

        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';

        /*
         * For this activity, use the same administrator credentials
         * already used by the existing ProductController login.
         */
        if ($username !== 'admin' || $password !== 'admin12345') {
            $this->api->respond_error('Invalid username or password.', 401);
        }

        $tokens = $this->api->issue_tokens([
            'id' => 1,
            'role' => 'admin',
            'scopes' => ['read', 'write']
        ]);

        $this->api->respond([
            'message' => 'Login successful.',
            'user' => [
                'id' => 1,
                'username' => 'admin',
                'role' => 'admin'
            ],
            'tokens' => $tokens
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | AUTHENTICATION
    |--------------------------------------------------------------------------
    */

    private function authenticate()
    {
        return $this->api->require_jwt();
    }

    /*
    |--------------------------------------------------------------------------
    | GET PRODUCTS
    |--------------------------------------------------------------------------
    */

    public function products()
    {
        $this->authenticate();

        $products = $this->ProductModel->all();

        $this->api->respond([
            'success' => true,
            'products' => $products
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function create_product()
    {
        $this->authenticate();

        $this->api->require_method('POST');

        $data = $this->api->body();

        $product_name = $data['product_name'] ?? '';
        $description = $data['description'] ?? '';
        $price       = $data['price'] ?? '';
        $quantity    = $data['quantity'] ?? '';

        if ($product_name === '' || $description === '' || $price === '' || $quantity === '') {
            $this->api->respond_error('All product fields are required.', 422);
        }

        $id = $this->ProductModel->insert([
            'product_name' => $product_name,
            'description'  => $description,
            'price'        => $price,
            'quantity'     => $quantity
        ]);

        $product = $this->ProductModel->find($id);

        $this->api->respond([
            'success' => true,
            'message' => 'Product created successfully.',
            'product' => $product
        ], 201);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function update_product($id)
    {
        $this->authenticate();

        $this->api->require_method('PUT');

        $product = $this->ProductModel->find($id);

        if (!$product) {
            $this->api->respond_error('Product not found.', 404);
        }

        $data = $this->api->body();

        $product_name = $data['product_name'] ?? '';
        $description = $data['description'] ?? '';
        $price       = $data['price'] ?? '';
        $quantity    = $data['quantity'] ?? '';

        if ($product_name === '' || $description === '' || $price === '' || $quantity === '') {
            $this->api->respond_error('All product fields are required.', 422);
        }

        $this->ProductModel->update(
            $id,
            [
                'product_name' => $product_name,
                'description'  => $description,
                'price'        => $price,
                'quantity'     => $quantity
            ]
        );

        $updated = $this->ProductModel->find($id);

        $this->api->respond([
            'success' => true,
            'message' => 'Product updated successfully.',
            'product' => $updated
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE PRODUCT
    |--------------------------------------------------------------------------
    */

    public function delete_product($id)
    {
        $this->authenticate();

        $this->api->require_method('DELETE');

        $product = $this->ProductModel->find($id);

        if (!$product) {
            $this->api->respond_error('Product not found.', 404);
        }

        $this->ProductModel->delete($id);

        $this->api->respond([
            'success' => true,
            'message' => 'Product deleted successfully.'
        ]);
    }
}
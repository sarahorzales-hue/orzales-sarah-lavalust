<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primary_key = 'id';

    protected $fillable = [
        'firstname',
        'lastname',
        'year',
        'course',
        'email',
        'username',
        'password'
    ];

    protected $guarded = [
        'id'
    ];

    protected $has_soft_delete = true;

    public function __construct()
    {
        parent::__construct();
    }
}
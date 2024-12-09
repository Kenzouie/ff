<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'role'
    ];

    // Disable timestamps since your table doesn't have created_at and updated_at fields
    protected $useTimestamps = false;

    // Add validation rules that match your table constraints
    protected $validationRules = [
        'first_name' => 'required|min_length[2]|max_length[50]',
        'last_name'  => 'required|min_length[2]|max_length[50]',
        'email'      => 'required|valid_email|max_length[100]|is_unique[users.email]',
        'password'   => 'required|min_length[6]|max_length[255]',
        'phone_number' => 'required|max_length[20]',
        'role'       => 'required|in_list[admin,dentist,patient]'
    ];
}
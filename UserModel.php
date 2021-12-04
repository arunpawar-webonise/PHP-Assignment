<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "contact_us";
    protected $allowedFields = ['name', 'email', 'phone','query'];
    
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'catalogue';
    protected $primaryKey = 'id';
    protected $userTimestamps = true;
}
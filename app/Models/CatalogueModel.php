<?php

namespace App\Models;

use CodeIgniter\Model;

class CatalogueModel extends Model
{
    protected $table = 'catalogue';
    protected $primaryKey = 'id';
    protected $userTimestamps = true;
}
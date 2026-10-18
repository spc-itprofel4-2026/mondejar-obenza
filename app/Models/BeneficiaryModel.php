<?php

namespace App\Models;

use CodeIgniter\Model;

class BeneficiaryModel extends Model
{
    protected $table         = 'beneficiarys';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['full_name', 'address', 'birth_date', 'monthly_income', 'is_verified', 'registered_at'];
}

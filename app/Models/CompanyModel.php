<?php
namespace App\Models;
use CodeIgniter\Model;

class CompanyModel extends Model{
    protected $table='company_table';
    protected $allowedFields=[
        'companyname',
        'email',
        'contact',
        'website',
        'address'
    ];
}

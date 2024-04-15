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
    public function insertClient($data)
    {
        // Insert data into the client table
        return $this->db->table('clients')->insert($data);
    }
    public function getclient()
    {
        return $this->db->table('clients')->get()->getResultArray();
    }
    
    public function updateStatus($clientId, $status)
{
    // Update the status in the 'clients' table
    $data = ['status' => $status]; // Data to be updated
    $this->db->table('clients')->where('client_id', $clientId)->update($data);
}
public function getClientById($clientId)
    {
        return $this->db->table('clients')->where('client_id', $clientId)->get()->getRowArray();
    }
    public function updateClient($clientId, $data)
{
    // Update the client's details in the 'clients' table
    $this->db->table('clients')->where('client_id', $clientId)->update($data);
}


public function softDeleteClient($clientId)
{
    try {
        // Perform the soft delete operation
        $affectedRows = $this->db->table('clients')
            ->where('client_id', $clientId)
            ->update(['is_deleted' => 1]);

        // Return true if at least one row is affected, indicating success
        return $affectedRows > 0;
    } catch (\Exception $e) {
        // Log the error or handle it as needed
        // You can also return a more specific error message if required
        return false;
    }
}








}

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
   /*  public function getclient()
    {
        return $this->db->table('clients')->get()->getResultArray();
    }*/
    
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

/*
public function deleteClient($clientId)
{
    // Delete the client from the 'clients' table
    return $this->db->table('clients')->where('client_id', $clientId)->delete();
}*/
public function deleteClient($clientId)
{
    // Update the 'is_deleted' field to mark the client as deleted
    $data = ['is_deleted' => 1];
    
    // Perform the update operation
    return $this->db->table('clients')->where('client_id', $clientId)->update($data);
}
public function getclient()
{
    return $this->db->table('clients')
                    ->where('is_deleted', 0) // Filter out deleted clients
                    ->get()
                    ->getResultArray();
}









}

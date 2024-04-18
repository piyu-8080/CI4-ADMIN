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
    public function __construct()
    {
        parent::__construct();
    
        // Load the database connection
        $this->db = \Config\Database::connect();
    }
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

public function insertProject($data)
{
    // Check if the 'client_id' key exists in the provided data
    if (!isset($data['client_id'])) {
        // If 'client_id' key is not provided, return false or throw an error
        return false; // You can also throw an exception here if you want
    }

    // Insert data into the projects table
    return $this->db->table('projects')->insert($data);
}

// Get all projects with client name
public function getProjects()
{
    return $this->db->table('projects')
                    ->select('projects.*, clients.client_name')
                    ->join('clients', 'clients.client_id = projects.client_id')
                    ->get()
                    ->getResultArray();
}

// Get project details by ID
public function getProjectById($projectId)
{
    return $this->db->table('projects')->where('project_id', $projectId)->get()->getRowArray();
}

// Update project details
public function updateProject($projectId, $data)
{
    return $this->db->table('projects')->where('project_id', $projectId)->update($data);
}

public function getClients()
{
    return $this->db->table('clients')
                    ->where('is_deleted', 0) // Filter out deleted clients
                    ->get()
                    ->getResultArray();
}

public function deleteProject($projectId)
{
    return $this->db->table('projects')->where('project_id', $projectId)->delete();
}
public function updateStatus1($projectId, $status)
{
    // Update the status in the 'projects' table
    $data = ['status' => $status]; // Data to be updated
    $this->db->table('projects')->where('project_id', $projectId)->update($data);
}



}

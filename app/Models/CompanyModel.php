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
//--------------------------------------Insert data in clients table-----------------------------------------------------------//

    public function insertClient($data)
    {
        // Insert data into the client table
        return $this->db->table('clients')->insert($data);
    }
   /*  public function getclient()
    {
        return $this->db->table('clients')->get()->getResultArray();
    }*/

    
//-----------------------------------update status of clients list table-----------------------------------------------------------//

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


//-----------------------------------Deleted client from client list -----------------------------------------------------------//

public function deleteClient($clientId)
{
    // Update the 'is_deleted' field to mark the client as deleted
    $data = ['is_deleted' => 1];
    
    // Perform the update operation
    return $this->db->table('clients')->where('client_id', $clientId)->update($data);
}

//-----------------------------------Fetch data from database clients table-----------------------------------------------------------//

public function getclient()
{
    return $this->db->table('clients')
                    ->where('is_deleted', 0) // Filter out deleted clients
                    ->get()
                    ->getResultArray();
}

//-----------------------------------Insert project of specific client-----------------------------------------------------------//

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


//-------------------------------------fetch data from projects table of database-----------------------------------------------------------//

// Get all projects with client name
/*public function getProjects()
{
    return $this->db->table('projects')
                    ->select('projects.*, clients.client_name')
                    ->join('clients', 'clients.client_id = projects.client_id')
                    ->get()
                    ->getResultArray();
}*/
public function getProjects()
{
    return $this->db->table('projects')
                    ->select('projects.*, clients.client_name')
                    ->join('clients', 'clients.client_id = projects.client_id')
                    ->where('projects.is_deleted', 0) // Adding condition for not deleted projects
                    ->get()
                    ->getResultArray();
}


// Get project details by ID
public function getProjectById($projectId)
{
    return $this->db->table('projects')->where('project_id', $projectId)->get()->getRowArray();
}


//-----------------------------------Update project details-----------------------------------------------------------//

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

//-----------------------------------Delete project of clients-----------------------------------------------------------//
/*
public function deleteProject($projectId)
{
    return $this->db->table('projects')->where('project_id', $projectId)->delete();
}*/

public function deleteProject($projectId)
{
    // Update the 'is_deleted' field to mark the client as deleted
    $data = ['is_deleted' => 1];
    
    // Perform the update operation
    return $this->db->table('projects')->where('project_id', $projectId)->update($data);
}


//-----------------------------------Update status of project list table-----------------------------------------------------------//

public function updateStatus1($projectId, $status)
{
    // Update the status in the 'projects' table
    $data = ['status' => $status]; // Data to be updated
    $this->db->table('projects')->where('project_id', $projectId)->update($data);
}


//-----------------------------------Insert SEO project-----------------------------------------------------------//

public function insertSEOProject($data)
{
    // Check if the 'project_id' key exists in the provided data
    if (!isset($data['project_id'])) {
        // If 'project_id' key is not provided, return false or throw an error
        return false; // You can also throw an exception here if you want
    }

    // Insert SEO project data into the database
    return $this->db->table('seo_projects')->insert($data);
}


/*public function getSEOProjects()
{
    // Fetch SEO projects data from the database
    return $this->db->table('seo_projects')->get()->getResultArray();
}*/


//--------------------------------------Display data fetched from database seo projects-----------------------------------------------------------//

public function getSEOProjects()
{
    return $this->db->table('seo_projects')
                    ->select('seo_projects.*, seo_projects.project_name')
                    ->join('projects', 'projects.project_id = seo_projects.project_id')
                    ->get()
                    ->getResultArray();
}

public function get_client_data()
{
    return $this->db->table('clients')
                    //->where('is_deleted', 0) // Filter out deleted clients
                    ->get()
                    ->getResultArray();
}


}

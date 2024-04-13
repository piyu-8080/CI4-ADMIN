<?php

namespace App\Controllers;

use App\Models\CompanyModel;
use CodeIgniter\Controller;

class CompanyController extends Controller
{
    public function __construct()
    {
        // Load necessary helpers and libraries
        helper(['form', 'url', 'session']);
        $this->db = \Config\Database::connect();
    }

//-----------------------------------It will add Company data-----------------------------------------------------------//

public function addCompany()
{
    // Load necessary helpers and libraries
    helper(['form']);

    // Load CompanyModel
    $companyModel = new CompanyModel();

    // Check if form is submitted
    if ($this->request->getMethod() === 'post') {
        // Validate the form input
        if ($this->validate([
            "companyname" => "required",
            "email" => "required|valid_email",
            "contact" => "required",
            "website" => "required",
            "address" => "required"
        ])) {
            // Form validation passed, proceed to insert data

            // Retrieve form data
            $data = [
                "companyname" => $this->request->getVar("companyname"),
                "email" => $this->request->getVar("email"),
                "contact" => $this->request->getVar("contact"),
                "website" => $this->request->getVar("website"),
                "address" => $this->request->getVar("address")
            ];

            // Insert data into the database
            if ($companyModel->insert($data)) {
                // Data inserted successfully
                $session = session();
                $session->setFlashdata("success_message", "Company registered successfully");
                return redirect()->to('company_details');
            } else {
                // Database insert failed
                $session = session();
                $session->setFlashdata("error_message", "Failed to register company. Please try again.");
                return redirect()->back()->withInput();
            }
        } else {
            // Form validation failed
            $session = session();
            $session->setFlashdata("error_message", "Form validation failed. Please check your input.");
            $session->setFlashdata("validation_errors", $this->validator->getErrors());
            
        }
    }

    // If form is not submitted or validation failed, simply load the view with flash data
    return view('company_data');
}





//----------------------------------- Edit Company data-----------------------------------------------------------//

    public function editCompany($id)
    {
        // Load CompanyModel
        $companyModel = new CompanyModel();

        // Fetch the company details from the database
        $data['company'] = $companyModel->find($id);

        // Pass the fetched data to the view
        return view('editCompany', $data);
    }




//-----------------------------------Update company data-----------------------------------------------------------//

    public function updateCompany($id)
{
    // Load necessary helpers and libraries
    helper(['form']);

    // Load CompanyModel
    $companyModel = new CompanyModel();

    // Fetch the company details from the database
    $company = $companyModel->find($id);

    // Check if company exists
    if (!$company) {
        // Company not found, redirect with error message or handle accordingly
        return redirect()->back()->with('error', 'Company not found.');
    }

    // Validate the form input
    if ($this->validate([
        "companyname" => "required",
        "email" => "required|valid_email",
        "contact" => "required",
        "website" => "required",
        "address" => "required"
    ])) {
        // Form validation passed, proceed to update data

        // Retrieve form data
        $data = [
            "companyname" => $this->request->getPost("companyname"),
            "email" => $this->request->getPost("email"),
            "contact" => $this->request->getPost("contact"),
            "website" => $this->request->getPost("website"),
            "address" => $this->request->getPost("address")
        ];

        // Update data in the database
        if ($companyModel->update($id, $data)) {
            // Data updated successfully
            return redirect()->to('company_details')->with('success', 'Company updated successfully.');
        } else {
            // Database update failed
            return redirect()->back()->withInput()->with('error', 'Failed to update company. Please try again.');
        }
    } else {
        // Form validation failed
        return redirect()->back()->withInput()->with('error', 'Validation error. Please check your input.');
    }
}




//-----------------------------------Delete Company data-----------------------------------------------------------//

public function deleteCompany($id)
{
    // Load CompanyModel
    $companyModel = new CompanyModel();

    // Find the company by id
    $company = $companyModel->find($id);

    // Check if company exists
    if (!$company) {
        // Company not found, redirect with error message or handle accordingly
        return redirect()->back()->with('error', 'Company not found.');
    }

    // Delete the company
    if ($companyModel->delete($id)) {
        // Company deleted successfully
        return redirect()->to('company_details')->with('success', 'Company deleted successfully.');
    } else {
        // Database delete failed
        return redirect()->back()->with('error', 'Failed to delete company. Please try again.');
    }
}




//-----------------------------------company details table-----------------------------------------------------------//
public function company_details()
{
    // Check if the user is logged in
    $session = session();
    if (!$session->isLoggedIn) {
        // If not logged in, redirect to the login page
        return redirect()->to('login');
    }

    // Retrieve first name and last name from session data
    $firstName = $session->firstname;
    $lastName = $session->lastname;

    // Load CompanyModel
    $companyModel = new CompanyModel();

    // Fetch all companies from the database sorted by 'id' column in ascending order
    $data['companies'] = $companyModel->orderBy('id', 'ASC')->findAll();

    // Add user data to the $data array
    $data['firstName'] = $firstName;
    $data['lastName'] = $lastName;

    // Pass the fetched data to the view
    return view('company_details', $data);
}


   
}


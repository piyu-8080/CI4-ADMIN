<?php

namespace app\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class SigninController extends Controller
{
    
    public function index()
    {
        helper(['form']);
        echo view('login');
    }
    public function __construct()
    {
        // Load necessary helpers and libraries
        helper(['form', 'url', 'session']);
        $this->db = \Config\Database::connect();
    }

    
//-----------------------------------Only registered users will login-----------------------------------------------------------//

    public function loginAuth(){
        $session=session();
        $userModel=new UserModel();
        $email=$this->request->getVar('email');
        $password=$this->request->getVar('password');
        $data=$userModel->where('email',$email)->first();
    
        if($data){
            $storedPassword=$data['password'];
    
            if(password_verify($password,$storedPassword)){
                $ses_data=[
                    'id'=>$data['id'],
                    'firstname'=>$data['firstname'],
                    'lastname'=>$data['lastname'],
                    'email'=>$data['email'],
                    'isLoggedIn'=>TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('company_details');
            }else{
                $session->setFlashdata('msg','Password is incorrect');
                return redirect()->to('login');
            }
        }else{
            $session->setFlashdata('msg','Email does not exist');
            return redirect()->to('login');
        }
    }

//-----------------------------------Edit table of registered users-----------------------------------------------------------//

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user) {
            $data['user'] = $user;
            return view('edit', $data);
        } else {
            return redirect()->to('error404');
        }
    }

//-----------------------------------After edit it will update data-----------------------------------------------------------//

public function update($id)
{
    // Load the UserModel
    $userModel = new UserModel();

    // Check if the user with the given ID exists
    $user = $userModel->find($id);

    // If the user does not exist, return a response or redirect
    if (!$user) {
        return redirect()->to('error404'); // Redirect to a 404 error page
    }

    // Handle POST request (update data)
    if ($this->request->getMethod() === 'post') {
        // Get the updated data from the form
        $updatedData = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'email' => $this->request->getPost('email'),
        ];

        // Check if a new password is provided
        $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updatedData['password'] = $hashedPassword;
        }

        // Update the user record in the database
        $userModel->update($id, $updatedData);

        // Redirect to a success page or show a success message
        return redirect()->to('tables')->with('success', 'User updated successfully.'); 
    }

    // Handle GET request (display form)
   
    $data['user'] = $user;

    // Load the edit view with the user data
    return view('edit', $data);
}


//-----------------------------------Delete the registered data from tables-----------------------------------------------------------//

public function confirmDelete($id)
{
    $userModel = new UserModel();

    // Check if the user exists
    $user = $userModel->find($id);
    if ($user) {
        // If the user exists, perform the deletion
        $userModel->delete($id);
        // Redirect to a success page or any other appropriate page
        return redirect()->to('tables')->with('success', 'User deleted successfully.');
    } else {
        // If the user does not exist, redirect to an error page or any other appropriate page
        return redirect()->to('404')->with('error', 'User not found.');
    }
}

public function cancelDelete()
{
    
    return redirect()->to('tables');
}

    
}

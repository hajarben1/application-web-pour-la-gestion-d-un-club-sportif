<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class Auth extends BaseController
{
    public function signIn()
    {
        $data = [];
        $data['main_content'] = 'Pages/SignIn';
        echo view('InnerPages/template', $data);
    }
    public function signUp()
    {
        $data = [];
        $data['main_content'] = 'Pages/SignUp';
        $data['isFooter'] = true;
        echo view('InnerPages/template', $data);
    }
    public function update()
    {
        $data = [];
        $data['main_content'] = 'Pages/Profile';
        echo view('InnerPages/template', $data);
    }
    public function create()
{
    // Validation des données du formulaire
    $validation = \Config\Services::validation();
    $validation->setRules([
        'PseudoNom' => 'required',
        'Nom' => 'required',
        'Prenom' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        'Adresse' => 'required',
        'Sexe' => 'required',
        'Profession' => 'required',
        'DateNaissance' => 'required|valid_date',
        'Password' => 'required',
        'CPassword' => 'required|matches[Password]',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->to(base_url('/sign-up'))->withInput()->with('errors', $validation->getErrors());
    }

    if ($this->request->getMethod() == 'post') {
        $user = new UserModel();

        // Handle image upload
        $image = $this->request->getFile('image');

        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            // Save user data
            $data = [
                'PseudoNom' => $this->request->getPost('PseudoNom'),
                'Nom' => $this->request->getPost('Nom'),
                'Prenom' => $this->request->getPost('Prenom'),
                'Adresse' => $this->request->getPost('Adresse'),
                'Sexe' => $this->request->getPost('Sexe'),
                'Profession' => $this->request->getPost('Profession'),
                'DateNaissance' => $this->request->getPost('DateNaissance'),
                'Password' => password_hash($this->request->getPost('Password'), PASSWORD_DEFAULT),
                'image' => $newName,
            ];

            $user->insert($data);
            return redirect()->to(base_url('/sign-in'));
        } else {
            // Handle image upload failure
            return redirect()->to(base_url('/sign-up'))->withInput()->with('errors', ['Image upload failed.']);
        }
    }
}

    public function login()
{
    // Validation des données du formulaire
    $validation = \Config\Services::validation();
    $validation->setRules([
        'PseudoNom' => 'required',
        'Password' => 'required',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->to(base_url('/'))->withInput()->with('errors', $validation->getErrors());
    }

    if ($this->request->getMethod() == 'post') {
        $user = new UserModel();
        $username = $this->request->getPost('PseudoNom');
        $password = $this->request->getPost('Password');
        $Cuser = $user->where('PseudoNom', $username)->first();

        if ($username === 'admin' && $password === 'admin') {
            session()->set('PseudoNom', "admin");
            return redirect()->to(base_url('/list-reclame'));
        }

        if ($Cuser && password_verify($password, $Cuser['Password'])) {
            session()->set('PseudoNom', $Cuser['PseudoNom']);
            return redirect()->to(base_url('/profile'));
        }
        return redirect()->to(base_url('/profile'))->with('session', ['error' => 'Nom d\'utilisateur ou mot de passe incorrect']);
    }
}

    public function logout()
    {
        session()->remove('PseudoNom');
        session()->destroy();
        return redirect()->to(base_url('/sign-in'));
    }
    // Import the necessary classes


    public function update_user()
    {
        // Retrieve the user's PseudoNom from the form
        $pseudoNom = $this->request->getPost('PseudoNom');
    
        // Retrieve the user data from the database
        $userModel = new UserModel();
        $userData = $userModel->where('PseudoNom', $pseudoNom)->first();
    
        // Check if the user exists
        if (!$userData) {
            // Handle the case where the user is not found
            return redirect()->to(base_url('/profile'))->with('error', 'User not found');
        }
    
        // Validation rules for the update form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'Nom' => 'required',
            'Prenom' => 'required',
            'Password' => 'required',
            'CPassword' => 'required|matches[Password]',
        ]);
    
        // Validate the form data
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to(base_url('/profile'))->withInput()->with('errors', $validation->getErrors());
        }
    
        // Update user information
        $userData['Nom'] = $this->request->getPost('Nom');
        $userData['Prenom'] = $this->request->getPost('Prenom');
    
        // Check if a new password is provided
        $newPassword = $this->request->getPost('Password');
        if (!empty($newPassword)) {
            // Update the password if a new one is provided
            $userData['Password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('./path/to/upload/directory', $newName);
            $userData['image'] = $newName;
        }
    
        // Save the updated user data to the database
        $userModel->update(['PseudoNom' => $pseudoNom], $userData);
    
        // Redirect to the profile page with a success message
        return redirect()->to(base_url('/profile'))->with('success', 'User information updated successfully');
    }
    

}

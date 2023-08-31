<?php

namespace App\Controllers;
use App\models\BookmarkModel;

class Home extends BaseController
{
    public function __construct(){
        helper(['url']);
        $this->user = new BookmarkModel();
    }
    public function index()
    {
        $data['user'] = $this->user->findAll();
        echo view('components/bookmark', $data);
    }
    public function saveBookmark()
    {
        // Load the validation library
        $validation = \Config\Services::validation();
    
        // Set validation rules
        $validation->setRules([
            'name' => 'required|max_length[255]',
            'email' => 'required|valid_email|max_length[255]',
            'contact' => 'required|max_length[20]'
        ]);
    
        // Run validation
        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, store validation errors in flash data
            session()->setFlashdata('validation_errors', $validation->getErrors());

            return redirect()->back()->withInput();
        }

        // Validation passed, proceed with saving data
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $contact = $this->request->getVar('contact'); // Changed to 'number' to match the form input name
    
        $data = [
            "name" => $name,
            "email" => $email,
            "contact" => $contact
        ];
    
        $this->user->save($data);
        session()->setFlashdata("success", "Data saved Successfully!");
        return redirect()->to(base_url());
    }
    

    public function displayList()
    {
        $data['user'] = $this->user->findAll();
        echo view('components/List', $data);
    }

    public function editBookmark($id)
    {
        $data['bookmark'] = $this->user->find($id);

        if (empty($data['bookmark'])) {
            // Handle case where bookmark is not found
            // For example, show an error or redirect
        }

        echo view('components/editBookmark', $data); // Assuming 'edit_bookmark' is the view for editing bookmarks
    }

    public function updateBookmark($id)
    {
        // Fetch updated data from the form
        $updatedData = [
            "name" => $this->request->getVar('name'),
            "email" => $this->request->getVar('email'),
            "contact" => $this->request->getVar('number')
        ];

        $this->user->update($id, $updatedData);

        session()->setFlashdata("success", "Bookmark updated Successfully!");
        return redirect()->to(base_url());
    }

    public function deleteBookmarkList($id)
    {
        $this->user->delete($id);
        session()->setFlashdata("delete", "Bookmark Deleted Successfully!");
        return redirect()->to(base_url("/List"));
    }

}

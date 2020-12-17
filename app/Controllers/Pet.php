<?php

namespace App\Controllers;

class Pet extends BaseController
{

    public function index()
    {

        $pets = $this->petModel->getPets();
        $data = [
            'title' => 'Pet List',
            'pets' => $pets
        ];
        return view('pets/index', $data);
    }

    public function detail($id)
    {
        // echo 'ini detail';
        // dd();
        $pet = $this->petModel->getDetail($id);
        $data = [
            'title' => 'Pet Detail',
            'pet' => $pet
        ];

        if (empty($data["pet"])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pet ' . $id . ' not found.');
        }
        return view('pets/detail', $data);
    }

    public function delete($id)
    {
        echo 'ini delete';

        $pet = $this->petModel->find($id);
        if ($pet['photo'] !== 'default.png') unlink('img/' . $pet['photo']);
        $this->petModel->delete($id);
        return redirect()->to('/pets');
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Pet',
            "validation" => \Config\Services::validation()
        ];
        return view('pets/create', $data);
    }

    public function save()
    {
        // 'title' => 'required|is_unique[comics.title]'
        if (!$this->validate([
            // 'title' => [
            //     'rules' => 'required|is_unique[comics.title]',
            //     'errors' => [
            //         'required' => '{field} is required',
            //         'is_unique' => 'This {field} is already been declared'
            //     ]
            // ],
            'photo' => [
                'rules' => 'max_size[photo,1024]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'too large file size',
                    'is_image' => 'file is not an image',
                    'mime_in' => 'file is not an image '
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/Comic/create')->withInput()->with('validation', $validation);
            return redirect()->to('/pets/new-pet')->withInput();
        }

        $photoFile = $this->request->getFile('photo');
        if ($photoFile->getError() == 4) {
            $photoName = 'default.jpg';
        } else {
            $photoName = $photoFile->getRandomName();
            // pindahkan file ke folder img
            $photoFile->move('img', $photoName);
        }

        $this->petModel->save([
            'photo' => $photoName,
            'name' => $this->request->getVar('name'),
            'species' => $this->request->getVar('species'),
            'birth_year' => $this->request->getVar('birth_year'),
        ]);

        session()->setFlashdata('message', 'Successfully add new pet');

        return redirect()->to('/pets');
    }

    public function edit($id)
    {

        $data = [
            'title' => 'Edit Pet Data',
            "validation" => \Config\Services::validation(),
            'pet' => $this->petModel->getDetail($id)
        ];
        return view('/pets/edit', $data);
    }

    public function update($id)
    {
        // $oldData = $this->petModel->getDetail($id);
        // if ($oldData['title'] == $this->request->getVar('title')) {
        //     $rule_title = 'required';
        // } else {
        //     $rule_title = 'required|is_unique[comics.title]';
        // }
        if (!$this->validate([
            // 'title' => [
            //     'rules' => $rule_title,
            //     'errors' => [
            //         'required' => '{field} is required',
            //         'is_unique' => 'This {field} is already been declared'
            //     ]
            // ],
            'photo' => [
                'rules' => 'max_size[photo,1024]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'too large file size',
                    'is_image' => 'file is not an image',
                    'mime_in' => 'file is not an image '
                ]
            ]
        ])) {

            return redirect()->to('/pets/edit/' . $this->request->getVar('id'))->withInput();
        }

        $photoFile = $this->request->getFile('photo');
        if ($photoFile->getError() == 4) {
            $photoName = $this->request->getVar('photoOld');
        } else {
            $photoName = $photoFile->getRandomName();
            // pindahkan file ke folder img
            $photoFile->move('img', $photoName);
            unlink('img/' . $this->request->getVar('photoOld'));
        }

        // $slug = url_title($this->request->getVar('title'), '-', true);
        $this->petModel->save([
            'id' => $id,
            'photo' => $photoName,
            'name' => $this->request->getVar('name'),
            'species' => $this->request->getVar('species'),
            'birth_year' => $this->request->getVar('birth_year'),
        ]);

        session()->setFlashdata('message', 'Successfully edit pet data');

        return redirect()->to('/pets');
    }
}

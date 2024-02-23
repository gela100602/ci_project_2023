<?php

namespace App\Controllers;

class Employees extends BaseController
{
    public function index(): string
    {
        // Get user id from session
        $myId = session()->get('myId');

        // Load models
        $employees = new \App\Models\EmployeeModel();
        $department = new \App\Models\DepartmentModel();
        $shift = new \App\Models\ShiftModel();

        // Retrieve data from models
        $data['employees'] = $employees->findAll();
        $data['department'] = $department->where('id', $myId)->findAll();
        $data['shift'] = $shift->where('id', $myId)->findAll();

        return view('employees/index', $data);
    }

    // Load the data to the add page
    public function add(): string
    {
        $departmentModel = new \App\Models\DepartmentModel();
        $shiftModel = new \App\Models\ShiftModel();

        $data['department'] = $departmentModel->findAll();
        $data['shift'] = $shiftModel->findAll();

        return view('employees/add', $data);
    }

    public function addEmployee()
    {
        $data = array();
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost(['full_name', 'email', 'contact_number', 'age', 'gender', 'birth_date', 'department_id', 'shift_id', 'hire_date']);

            $rules = [
                'full_name' => ['label' => 'Name', 'rules' => 'required'],
                'email' => ['label' => 'Email', 'rules' => 'required|valid_email|is_unique[employees.email]'],
                'contact_number' => ['label' => 'Contact Number', 'rules' => 'required|numeric'],
                'age' => ['label' => 'Age', 'rules' => 'required|numeric'],
                'gender' => ['label' => 'Gender', 'rules' => 'required'],
                'birth_date' => ['label' => 'Birth Date', 'rules' => 'required'],
                'department_id' => ['label' => 'Department', 'rules' => 'required'],
                'shift_id' => ['label' => 'Shift', 'rules' => 'required'],
                'hire_date' => ['label' => 'Hired Date', 'rules' => 'required'],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $employees = new \App\Models\EmployeeModel();
                $employees->save($post);

                $session = session();
                $session->setFlashdata('success-add-user', 'Employee successfully added!');
            }
            return redirect()->to('/employees/add');
        }
        return view('employees/add', $data);
    }

    public function view($id)
    {
        $myId = session()->get('myId');

        $employees = new \App\Models\EmployeeModel();
        $department = new \App\Models\DepartmentModel();
        $shift = new \App\Models\ShiftModel();

        $data['employees'] = $employees->find($id);
        $data['department'] = $department->where('id', $myId)->findAll();
        $data['shift'] = $shift->where('id', $myId)->findAll();

        return view('employees/view', $data);
    }

    public function edit($id)
    {
        $employees = new \App\Models\EmployeeModel();
        $department = new \App\Models\DepartmentModel();
        $shift = new \App\Models\ShiftModel();

        // Retrieve the employee data
        $data['employees'] = $employees->find($id);

        // Retrieve all departments and shifts
        $data['department'] = $department->findAll();
        $data['shift'] = $shift->findAll();

        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost([
                'full_name', 'email', 'contact_number', 'age', 'gender', 'birth_date', 'shift_id', 'hire_date'
            ]);

            // Add any missing keys with empty values to $post array
            $post += array_fill_keys(['full_name', 'email', 'contact_number', 'age', 'gender', 'birth_date', 'shift_id', 'hire_date'], '');

            $rules = [
                'full_name' => ['label' => 'Name', 'rules' => 'required'],
                'email' => [
                    'label' => 'email',
                    'rules' => 'required|valid_email|is_unique[employees.email,' . $employees->primaryKey . ',' . $id . ']',
                ],
                'contact_number' => ['label' => 'Contact Number', 'rules' => 'required'],
                'age' => ['label' => 'Age', 'rules' => 'required|numeric'],
                'gender' => ['label' => 'Gender', 'rules' => 'required'],
                'birth_date' => ['label' => 'Birth Date', 'rules' => 'required'],
                'shift_id' => ['label' => 'Shift', 'rules' => 'required'],
                'hire_date' => ['label' => 'Hired Date', 'rules' => 'required'],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                // Retrieve the current user data
                $editedData = $employees->find($id);

                // Convert the object to an array
                $editedDataArray = (array)$editedData;

                // Check for changes and update only the edited fields
                foreach ($post as $key => $value) {
                    if ($editedDataArray[$key] !== $value) {
                        $editedDataArray[$key] = $value;
                    }
                }

                // Save the changes to the database
                $employees->update($id, $editedDataArray);

                $session = session();
                $session->setFlashdata('success-update-user', 'Employee successfully updated!');

                // Return user list page
                return redirect()->to('/employees/edit/' . $id);
            }
        }
        return view('employees/edit', $data);
    }


    public function delete($id)
    {
        $employees = new \App\Models\EmployeeModel();
        $data['employees'] = $employees->find($id);

        if ($this->request->getMethod() == 'post') {
            $employees->delete($id);
            $session = session();
            $session->setFlashdata('success-delete-user', 'User successfully deleted!');

            // Return employee list page 
            return redirect()->to('/employees');
        }
        return view('employees', $data);
    }
}

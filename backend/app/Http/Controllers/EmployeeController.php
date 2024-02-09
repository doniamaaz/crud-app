<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    public function getEmployee()
    {
        return response()->json(Employee::all(), 200);
    }

    public function getEMployeeById($id)
    {
        $employee = Employee::find($id);
        if (is_null($employee)) {
            return response()->json(['message' => 'Employee Not Found'], 404);
        }
        return response()->json($employee::find($id), 202);
    }
    public function addEmployee(Request $request){
        // Récupérer le dernier ID existant dans la table
        $lastEmployee = Employee::orderBy('id', 'desc')->first();

        // Calculer le nouvel ID
        $newId = $lastEmployee ? $lastEmployee->id + 1 : 1;

        // Créer un nouvel employé avec l'ID calculé
        $employee = new Employee();
        $employee->id = $newId;
        $employee->name = $request->input('name'); // Mettez les autres champs en conséquence
        $employee->email = $request->input('email');
        $employee->salary = $request->input('salary');
        $employee->save();

        return response()->json($employee, 201);
    }

    public function updateEmployee(Request $request, $id){
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json(['message' => 'Employee Not Found'], 404);
        }
        $employee->update($request->all());
        return response($employee, 200);

    }
    public function deleteEmployee(Request $request, $id){
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json(['message' => 'Employee Not Found'], 404);

        }
        $employee->delete();
        return response()->json(null, 204);

    }

    }


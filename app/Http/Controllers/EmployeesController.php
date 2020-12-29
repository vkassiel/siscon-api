<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStorePostRequest;
use App\Http\Requests\EmployeeUpdatePutRequest;
use App\Models\Employee;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    // Show all employees (GET)
    public function index()
    {
        try {
            $employees = Employee::all();

            if (count($employees) > 0) {
                return response()->json($employees, 200);
            } else {
                return response()->json(["error" => "Nenhum registro encontrado!"], 406);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(["error" => $th->getMessage()], 502);
        }
    }

    // Create a new employee regist (POST)
    public function store(EmployeeStorePostRequest $request)
    {
        try {
            $data = $request->validated();  

            $new = Employee::create($data);
            
            if($new){
                return response()->json(["success" => "Funcionário adicionado com sucesso!"], 200);
            }else{
                return response()->json(["error" => "Houve um erro ao adicionar o funcionário!"], 502);
            }

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 502);
        }
    }

    // Find a specific employee regist by id (GET)
    public function show($id)
    {
        try {
            $employee = Employee::find($id);

            if ($employee != '') {
                return response()->json($employee, 200);
            } else {
                return response()->json(["error" => "Nenhum registro encontrado com o ID informado!"], 406);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(["error" => $th->getMessage()], 502);
        }
    }

    // Update a employee regist (PUT/PATCH)
    public function update(EmployeeUpdatePutRequest $request)
    {
        try {
            $data = $request->validated();
            $id = $data['id'];
            
            $employee = Employee::find($id);

            if($employee){
                $update = Employee::updateOrCreate(['id' => $id], $data);

                return $update;
            }else{
                return response()->json(["error" => "Nenhum registro encontrado com o ID informado!"], 406);
            }
            
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    // Delete a employee regist (DELETE)
    public function destroy($id)
    {
        try {
            $employee = Employee::destroy($id);

            if($employee){
                return response()->json(["success" => "Funcionário excluído com sucesso!"], 200);
            }else{
                return response()->json(["error" => "Houve um erro ao tentar remover o funcionário!"], 200);
            }
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 502);
        }
    }
}

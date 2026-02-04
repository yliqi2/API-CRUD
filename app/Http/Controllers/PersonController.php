<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Animals;
use Illuminate\Http\Request;

class PersonController extends Controller
{   
    //muestra todas las personas get
    public function index()
    {
        return Person::all();
    }

    //funcion que es llamada al hacer post
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'first_name' => 'required|string|min:1',
                'last_name' => 'required|string|min:1',
            ], [
                'first_name.required' => 'The first name field is required',
                'last_name.required' => 'The last name field is required',
            ]);

            $person = Person::create($validated);
            
            return response()->json([
                'message' => 'Person created successfully',
                'data' => $person
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating person',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //funcion que es llamada al hacer get con un id
    public function show($id)
    {
        $person = Person::find($id);
        if (!$person) {
            return response()->json([
                'error' => 'Person not found'
            ], 404);
        }
        return $person;
    }

    //funcion que es llamada al hacer put con un id
    public function update(Request $request, $id)
    {
        try {
            $person = Person::find($id);
            if (!$person) {
                return response()->json([
                    'error' => 'Person not found'
                ], 404);   
            }  

            $validated = $request->validate([
                'first_name' => 'sometimes|required|string|min:1',
                'last_name' => 'sometimes|required|string|min:1',
            ], [
                'first_name.required' => 'The first name field is required',
                'last_name.required' => 'The last name field is required',
            ]);
            
            $person->update($validated);

            return response()->json([
                'message' => 'Person updated successfully',
                'data' => $person
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating person',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //funcion que es llamada al hacer delete con un id
    public function destroy($id)
    {
        $person = Person::find($id);
        if (!$person) {
            return response()->json([
                'error' => 'Person not found'
            ], 404);
        }

        // Eliminar todos los animales asociados
        Animals::where('person_id', $person->person_id)->delete();

        // Eliminar la persona
        $person->delete();

        return response()->json([
            'message' => 'Person and associated animals deleted successfully'
        ], 200);
    }
}
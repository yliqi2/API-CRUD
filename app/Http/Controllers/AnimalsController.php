<?php

namespace App\Http\Controllers;

use App\Models\animals;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    /*
        200: OK → la petición salió bien.
        201: Created → se creó un recurso.
        404: Not Found → no existe el recurso.
        422: Unprocessable Entity → error de validación.
        500: Server Error → error interno del servidor.
    */

    //muestra todos los animales get
    public function index()
    {
        return animals::all();
    }

    //funcion que es llamada al hacer post
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|min:1',
                'species' => 'required|in:dog,cat,hamster,bunny',
                'weight' => 'nullable|numeric|min:0',
                'disease' => 'nullable|string',
                'comments' => 'nullable|string',
                'person_id' => 'nullable|exists:person,person_id',
            ], [
                'name.required' => 'The name field is required',
                'species.required' => 'The species field is required',
                'species.in' => 'The species must be: dog, cat, hamster, or bunny',
                'weight.numeric' => 'The weight must be a number',
                'weight.min' => 'The weight cannot be negative',
                'person_id.exists' => 'The specified person_id does not exist',
            ]);

            $animal = animals::create($validated);
            
            return response()->json([
                'message' => 'Animal created successfully',
                'data' => $animal
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating animal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //funcion que es llamada al hacer get con un id
    public function show($id)
    {
        $animal = animals::find($id);

        if (!$animal) {
            return response()->json([
                'error' => 'Animal not found'
            ], 404);
        }

        return $animal;
    }

    //funcion que es llamada al hacer put con un id
    public function update(Request $request, $id)
    {
        try {
            $animal = animals::find($id);

            if (!$animal) {
                return response()->json([
                    'message' => 'Animal not found'
                ], 404);
            }

            $validated = $request->validate([
                'name' => 'sometimes|string|min:1',
                'species' => 'sometimes|in:dog,cat,hamster,bunny',
                'weight' => 'nullable|numeric|min:0',
                'disease' => 'nullable|string',
                'comments' => 'nullable|string',
                'person_id' => 'nullable|exists:person,person_id',
            ], [
                'species.in' => 'The species must be: dog, cat, hamster, or bunny',
                'weight.numeric' => 'The weight must be a number',
                'weight.min' => 'The weight cannot be negative',
                'person_id.exists' => 'The specified person_id does not exist',
            ]);

            $animal->update($validated);
            
            return response()->json([
                'message' => 'Animal updated successfully',
                'data' => $animal
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating animal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //funcion que es llamada al hacer delete con un id
    public function destroy($id)
    {
        $animal = animals::find($id);

        if (!$animal) {
            return response()->json([
                'error' => 'Animal not found'
            ], 404);
        }

        $animal->delete();
        return response()->json(['message' => 'Animal deleted successfully'], 200);
    }
}

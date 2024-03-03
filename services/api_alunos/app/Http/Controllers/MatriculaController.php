<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatriculaRequest;
use App\Http\Requests\UpdateMatriculaRequest;
use App\Models\Matricula;
use Illuminate\Http\JsonResponse;

class MatriculaController extends Controller
{


    public function __construct(private Matricula $matricula) {  }

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        return response()->json($this->matricula->paginate(perPage:20, columns:['*'], pageName:'page'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Matricula $matricula) : JsonResponse
    {
        return response()->json($matricula);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matricula $matricula)
    {
        //
    }
}

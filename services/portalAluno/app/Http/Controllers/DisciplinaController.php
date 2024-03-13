<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreDisciplinaRequest;
use App\Http\Requests\UpdateDisciplinaRequest;
use App\Models\Disciplina;
use App\Models\Docente;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class DisciplinaController extends Controller
{
    
    public function __construct(private Disciplina $disciplina) {}
   
   
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->disciplina->paginate(
                perPage:20,
                columns:['*'],
                pageName: 'page'
            )
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Disciplina $disciplina) : JsonResponse
    {
        return response()->json($disciplina, JsonResponse::HTTP_OK);
    }
}

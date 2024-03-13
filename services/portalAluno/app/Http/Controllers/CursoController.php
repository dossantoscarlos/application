<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;
use App\Models\Curso;
use Illuminate\Http\JsonResponse;

class CursoController extends Controller
{

    public function __construct(private Curso $curso){}

    public function show(Curso $curso) : JsonResponse
    {
        return response()->json(data: $curso, status: JsonResponse::HTTP_OK);
    }

}

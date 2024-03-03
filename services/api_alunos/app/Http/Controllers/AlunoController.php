<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlunoController extends Controller
{

    private $rules = [
        'nome' => 'required',
        'sobrenome'=>'required',
        'dataNascimento' => 'required',
        'sexo' => 'required',
        'turma_codigo' => 'required'
    ];

    public function __construct(private Aluno $aluno){}


    public function index(): JsonResponse
    {
        return response()->json($this->aluno->paginate(20,['*'],'page'));
    }

    public function store(Request $request) : Response
    {
        $request->validate($this->rules);

        $aluno = $this->aluno->cadastraAluno($request->all());
        
        return response('',Response::HTTP_CREATED,[
            'accept' => 'application/json',
            'Location' => url('/api/aluno/'.$aluno->id)
        ]);
    }

    public function show(Aluno $aluno) : JsonResponse
    {
        return response()->json(['aluno' => $aluno]);
    }
}

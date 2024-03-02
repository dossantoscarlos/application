<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDisciplinaRequest;
use App\Http\Requests\UpdateDisciplinaRequest;
use App\Models\Disciplina;
use App\Models\Docente;
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
     * Store a newly created resource in storage.
     */
    public function store(StoreDisciplinaRequest $request)
    {

        $docente = Docente::find($request->input('docente'));
        $disciplina = $docente->disciplinas()->create([
                'codigo' => Hash::make(now()),
                'nome' => $request->input('nome'),
                'descricao' => $request->input('descricao')            
        ]);

        return response(status:Response::HTTP_CREATED, 
            headers:[
                'Accept' => 'application/json',
                'Location' => url("/api/disciplina/{$disciplina->id}")
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Disciplina $disciplina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disciplina $disciplina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDisciplinaRequest $request, Disciplina $disciplina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disciplina $disciplina)
    {
        //
    }
}

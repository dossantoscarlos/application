<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocenteRequest;
use App\Http\Requests\UpdateDocenteRequest;
use App\Models\Docente;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DocenteController extends Controller
{

    public function __construct(private Docente $docente) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            $this->docente->paginate(
                perPage: 20,
                columns: ['*'],
                pageName: 'page'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocenteRequest $request)
    {
        $docente = $this->docente->create([
            'nome' => $request->input('nome'),
            'sobrenome' => $request->input('sobrenome')
        ]);   
        
        return response(
            status:Response::HTTP_CREATED, 
            headers: [
                'Accept' =>'application/json',
                'Location' => url("/api/docente/{$docente->id}")
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Docente $docente): JsonResponse
    {
        return response()->json(data: $docente, status: JsonResponse::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocenteRequest $request, Docente $docente)
    {

        $docente->update($request->all()); 

        return response(
            status:Response::HTTP_ACCEPTED, 
            headers:[
                'Accept' => 'application/json',
                'Location' => url("/api/docente/{$docente->id}")
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Docente $docente)
    {
        //
    }
}

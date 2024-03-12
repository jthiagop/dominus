<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateOrganismoFormRequest;
use App\Models\Matriz;
use App\Models\Organismo;
use Illuminate\Http\Request;

class MatrizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matrizes = Matriz::get();

        return view('admin.matriz.index', compact('matrizes'));
    }

    public function listen()
    {
        $matrizes = Matriz::get();

        return view('admin.matriz.listen', compact('matrizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.matriz.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateOrganismoFormRequest $request, Matriz $matriz, Organismo $organismo)
    {
        $data = $request->all();
        $data['natureza'] = 'matriz';

        $matriz = $request->user()->matriz()->create($data);
        $matriz = $request->user()->organismo()->create($data);



        return redirect()
        ->route('matriz.listen')
            ->withSucess('Cadastro Realizado com Sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

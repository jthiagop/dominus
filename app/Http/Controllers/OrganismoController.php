<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Http\Requests\StoreUpdateOrganismoFormRequest;
use App\Models\Organismo;
use Illuminate\Http\Request;

class OrganismoController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function listen()
    {
        $organismos = Organismo::get();

        return view('admin.organismos.listen', compact('organismos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.organismos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateOrganismoFormRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $name = Str::kebab($request->cnpj);
            $extension = $request->image->extension();
            $nameImage = "{$name}.$extension";

            $data['image'] = $nameImage;

            $upload = $request->image->storeAs('organismos', $nameImage);

            if (!$upload){
                return redirect()->route('organismo.listen')->with('errors', ['Falha no Upload']);
            }
        }

        $data['natureza'] = 'filial';

        $organismo = $request->user()->organismo()->create($data, $request->all());

        return redirect()
                ->route('organismo.listen')
                    ->withSucess('Cadastro Realizado com Sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string|int $id)
    {
        if(!$organismo = Organismo::find($id)){
            return redirect()->back();
        }

        return view('org.organismo.show', compact('organismo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organismo $organismo, string|int $id)
    {
        if(!$organismo = $organismo->where('id', $id)->first()){
            return redirect()->back();
        }

        return view('admin.organismos.edit', compact('organismo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organismo $organismo, string|int $id)
    {
        if(!$organismo = $organismo->where('id', $id)->first()){
            return redirect()->back();
        }

        $organismo->update($request->all());

        return redirect()->route('organismo.listen')->with('msg', 'Organismo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

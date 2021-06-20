<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ClubeRepository;
use App\Http\Requests\Clube\StoreRequest;
use App\Http\Requests\Clube\UpdateRequest;

class ClubeController extends Controller
{
    private ClubeRepository $repository;

    public function __construct()
    {
        $this->repository = new ClubeRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubes = $this->repository->getAll();
        return view('clubes.index', ['clubes' => $clubes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clubes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $fileUrl = $this->repository->storeFile($request->file('escudo'));
        $data = ['nome' => $request->validated()['nome'], 'escudo' => $fileUrl];
        $this->repository->create($data);
        return redirect()->route('clubes.index')->with('success', 'O clube foi criado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clube = $this->repository->getByIdOrFail($id);
        return view('clubes.edit', ['clube' => $clube]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $clube = $this->repository->getByIdOrFail($id);
        $data = ['nome' => $request->validated()['nome'] || $clube->nome];

        if ($request->hasFile('escudo')) {
            $data['escudo'] = $this->repository->storeFile($request->file('escudo'));
        }

        $this->repository->update($id, $data);
        return redirect()->route('clubes.index')->with('success', 'O clube foi atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clube = $this->repository->getByIdOrFail($id);
        $this->repository->deleteFile($clube->escudo);
        $this->repository->delete($id);
        return redirect()->route('clubes.index')->with('success', 'O clube foi excluído com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\PosicaoRepository;
use App\Http\Requests\Posicao\StoreRequest;
use App\Http\Requests\Posicao\UpdateRequest;

class PosicaoController extends Controller
{
    private PosicaoRepository $repository;

    public function __construct()
    {
        $this->repository = new PosicaoRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posicoes = $this->repository->getAll();
        return view('posicoes.index', ['posicoes' => $posicoes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posicoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->repository->create($request->validated());
        return redirect()->route('posicoes.index')->with('success', 'A posição foi criada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posicao = $this->repository->getByIdOrFail($id);
        return view('posicoes.edit', ['posicao' => $posicao]);
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
        $this->repository->getByIdOrFail($id);
        $this->repository->update($id, $request->validated());
        return redirect()->route('posicoes.index')->with('success', 'A posição foi atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->getByIdOrFail($id);
        $this->repository->delete($id);
        return redirect()->route('posicoes.index')->with('success', 'A posição foi excluída com sucesso!');
    }
}

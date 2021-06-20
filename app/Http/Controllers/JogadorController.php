<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\JogadorRepository;
use App\Repository\ClubeRepository;
use App\Repository\PosicaoRepository;
use App\Http\Requests\Jogador\StoreRequest;
use App\Http\Requests\Jogador\UpdateRequest;

class JogadorController extends Controller
{
    private JogadorRepository $repository;
    private ClubeRepository $clubeRepository;
    private PosicaoRepository $posicaoRepository;

    public function __construct()
    {
        $this->repository = new JogadorRepository();
        $this->clubeRepository = new ClubeRepository();
        $this->posicaoRepository = new PosicaoRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogadores = $this->repository->getAll();
        return view('jogadores.index', ['jogadores' => $jogadores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubes = $this->clubeRepository->getAll();
        $posicoes = $this->posicaoRepository->getAll();

        return view('jogadores.create', [
            'clubes' => $clubes,
            'posicoes' => $posicoes,
        ]);
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
        return redirect()->route('jogadores.index')->with('success', 'O jogador foi criado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clubes = $this->clubeRepository->getAll();
        $posicoes = $this->posicaoRepository->getAll();
        $jogador = $this->repository->getByIdOrFail($id);

        return view('jogadores.edit', [
            'jogador' => $jogador,
            'clubes' => $clubes,
            'posicoes' => $posicoes,
        ]);
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
        return redirect()->route('jogadores.index')->with('success', 'O jogador foi atualizado com sucesso!');
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
        return redirect()->route('jogadores.index')->with('success', 'O jogador foi excluído com sucesso!');
    }
}

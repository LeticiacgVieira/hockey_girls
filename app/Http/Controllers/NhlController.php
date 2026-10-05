<?php

namespace App\Http\Controllers;

use App\Services\NhlApiService;
use Illuminate\Http\Request;

class NhlController extends Controller
{
    protected NhlApiService $nhlService;

    // O Laravel injeta automaticamente o seu serviço criado no construtor
    public function __construct(NhlApiService $nhlService)
    {
        $this->nhlService = $nhlService;
    }

    /**
     * Exibe o perfil do jogador de destaque da NHL
     */
    public function exibirPerfilJogador()
    {
        // Exemplo usando o ID do Connor McDavid (8478402) presente nos seus arquivos
        $playerId = 8478402; 
        
        $perfil = $this->nhlService->getPlayerLanding($playerId);
        $historicoGeral = $this->nhlService->getPlayerGameLog($playerId, 20232024, 2);

        if (!$perfil) {
            abort(404, 'Jogador não encontrado na API da NHL.');
        }

        return view('nhl.player', [
            'jogador' => $perfil,
            'jogos'   => $historicoGeral['gameLog'] ?? []
        ]);
    }

    /**
     * Exibe a classificação atual da NHL
     */
    public function exibirClassificacao()
    {
        $dadosClassificacao = $this->nhlService->getCurrentStandings();

        return view('nhl.standings', [
            'times' => $dadosClassificacao['standings'] ?? []
        ]);
    }
}

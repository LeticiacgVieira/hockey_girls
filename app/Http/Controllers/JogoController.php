<?php

namespace App\Http\Controllers;

use App\Services\NhlApiService;
use Illuminate\Http\Request;

class JogoController extends Controller
{
    protected NhlApiService $nhlService;

    public function __construct(NhlApiService $nhlService)
    {
        $this->nhlService = $nhlService;
    }

    public function index()
    {
        // 1. Descobre a temporada atual dinamicamente do servidor da NHL
        $temporadaAtual = $this->nhlService->getCurrentSeasonId();

        // 2. Busca o histórico de partidas atuais
        $dadosApi = $this->nhlService->getPlayerGameLog(8478402, $temporadaAtual, 2);
        $logs = $dadosApi['gameLog'] ?? [];

        // 3. Fallback de segurança: se o jogador não jogou nesta temporada ainda, traz a anterior
        if (empty($logs)) {
            $anoInicioAnterior = (int)substr((string)$temporadaAtual, 0, 4) - 1;
            $anoFimAnterior = (int)substr((string)$temporadaAtual, 4, 4) - 1;
            $temporadaAnterior = (int)($anoInicioAnterior . $anoFimAnterior);
            
            $dadosApi = $this->nhlService->getPlayerGameLog(8478402, $temporadaAnterior, 2);
            $logs = $dadosApi['gameLog'] ?? [];
        }

        // 4. Busca a classificação oficial da liga para preencher a tabela
        $dadosClassificacao = $this->nhlService->getCurrentStandings();
        $timesClassificacao = $dadosClassificacao['standings'] ?? [];

        // Define com total segurança o primeiro objeto de jogo válido da lista
        $jogoEmDestaque = !empty($logs) && is_array($logs) ? $logs[0] : null;

        return view('index', [
            'jogoAoVivo'    => $jogoEmDestaque, 
            'ultimosJogos'  => $logs,
            'classificacao' => $timesClassificacao
        ]);
    }
}

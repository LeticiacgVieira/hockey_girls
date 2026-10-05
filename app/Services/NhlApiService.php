<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NhlApiService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = rtrim(env('NHL_API_URL', 'https://api-web.nhle.com'), '/');
    }

    /**
     * Obtém informações gerais e estatísticas consolidadas de um jogador.
     * Endpoint: /v1/player/{player}/landing
     */
    public function getPlayerLanding(int $playerId): ?array
    {
        // O método withoutVerifying() ignora a checagem SSL local
        $response = Http::withoutVerifying()
            ->get("{$this->baseUrl}/v1/player/{$playerId}/landing");

        return $response->successful() ? $response->json() : null;
    }

    /**
     * Obtém o histórico de jogos de um jogador para uma temporada específica.
     * Endpoint: /v1/player/{player}/game-log/{season}/{game-type}
     */
    public function getPlayerGameLog(int $playerId, int $season, int $gameType = 2): ?array
    {
        // O método withoutVerifying() corrige o erro cURL error 60 nesta linha
        $response = Http::withoutVerifying()
            ->get("{$this->baseUrl}/v1/player/{$playerId}/game-log/{$season}/{$gameType}");

        return $response->successful() ? $response->json() : null;
    }

    /**
     * Obtém a classificação atual das equipes na liga.
     * Endpoint: /v1/standings/now
     */
    public function getCurrentStandings(): ?array
    {
        $response = Http::withoutVerifying()
            ->get("{$this->baseUrl}/v1/standings/now");

        return $response->successful() ? $response->json() : null;
    }

    /**
     * Obtém os líderes atuais de estatísticas de patinadores (ex: gols, assistências).
     * Endpoint: /v1/skater-stats-leaders/current
     */
    public function getSkaterLeaders(string $category = 'goals', int $limit = 5): ?array
    {
        $response = Http::withoutVerifying()
            ->get("{$this->baseUrl}/v1/skater-stats-leaders/current", [
                'categories' => $category,
                'limit' => $limit
            ]);

        return $response->successful() ? $response->json() : null;
    }

        /**
     * Descobre o ID da temporada atual dinamicamente.
     * Endpoint: /v1/schedule/now
     */
    public function getCurrentSeasonId(): int
    {
        try {
            $response = Http::withoutVerifying()->get("{$this->baseUrl}/v1/schedule/now");
            
            if ($response->successful() && isset($response->json()['currentSeasonId'])) {
                return (int) $response->json()['currentSeasonId'];
            }
        } catch (\Exception $e) {
            // Caso ocorra falha de conexão, retorna o ano atual calculado como fallback
            logger('Falha ao buscar temporada dinâmica da NHL: ' . $e->getMessage());
        }

        // Fallback de segurança baseado no mês atual (Temporadas começam em Outubro)
        $anoAtual = (int) date('Y');
        $mesAtual = (int) date('m');
        
        if ($mesAtual >= 10) {
            return (int) ($anoAtual . ($anoAtual + 1)); // Ex: 20262027
        }
        
        return (int) (($anoAtual - 1) . $anoAtual); // Ex: 20252026
    }

}

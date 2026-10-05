<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hockey Girls</title>
    <link rel="icon" type="image/png" href="{{ asset('imagens/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="navbar">
        <nav>
            <a href="#home" class="nav-btn">HOME</a>
            <a href="#jogos" class="nav-btn">JOGOS</a>
            <a href="#sobre" class="nav-btn">SOBRE</a>
        </nav>
    </header>

    <div id="home" class="container-section">
        <img src="{{ asset('imagens/nuvem.png') }}" class="decoracao nuvem-topo-esq" alt="Nuvem">
        <img src="{{ asset('imagens/nuvem.png') }}" class="decoracao nuvem-topo-dir" alt="Nuvem">
        <img src="{{ asset('imagens/nuvem.png') }}" class="decoracao nuvem-baixo-esq" alt="Nuvem">
        <img src="{{ asset('imagens/nuvem.png') }}" class="decoracao nuvem-baixo-dir" alt="Nuvem">

        

        <div class="container">
            
            
            <section class="hero">
                <div class="logo-wrapper">
                    <img src="{{ asset('imagens/tacos.png') }}" alt="Bastões de Hóquei" class="tacos-bg">

                    <img src="{{ asset('imagens/brilho.png') }}" class="decoracao brilho-pos-1" alt="Brilho Maior">
                    <img src="{{ asset('imagens/brilho.png') }}" class="decoracao brilho-pos-2" alt="Brilho Maior">
                    <img src="{{ asset('imagens/brilho.png') }}" class="decoracao brilho-pos-3" alt="Brilho Maior">
                    <img src="{{ asset('imagens/brilho.png') }}" class="decoracao brilho-pos-4" alt="Brilho Maior">
                        
                        
                        
                    <img src="{{ asset('imagens/br.png') }}" class="decoracao brilho-topo-1" alt="Brilho">
                    <img src="{{ asset('imagens/br.png') }}" class="decoracao brilho-direito-2" alt="Brilho">
                        
                    <img src="{{ asset('imagens/coracao.png') }}" class="decoracao coracao-dir" alt="Coração">
                        
                    <img src="{{ asset('imagens/estrela.png') }}" class="decoracao estrela-dir" alt="Estrela">

                    <h1 class="logo-title">
                        <span class="hockey">HOCKEY</span>
                        <span class="girls">Girls</span>
                    </h1>

                </div>

                <p class="description"> 
                        Acompanhe jogos <br> placares e próximos confrontos
                    </p>
            </section>
        </div>
    </div>

        <section id="jogos" class="section-content">
        @if(isset($jogoAoVivo) && $jogoAoVivo)
            <!-- CARD AO VIVO DINÂMICO -->
            <div class="card-aovivo">
                <div class="card-aovivo-topo-rosa">
                   <div class="status-badge active" id="aovivo-status">
                       <span class="ponto-vermelho"></span> Ao vivo
                   </div>
               </div>
               
               <div class="card-aovivo-conteudo">
                   <div class="placar-container">
                       
                       <!-- Time de Casa -->
                       <div class="time-block time-casa">
                           <!-- Pega a primeira letra do time se não houver logo -->
                           <span class="letra-time-grande" id="aovivo-letra-casa">
                               {{ substr($jogoAoVivo['commonName']['default'] ?? 'H', 0, 1) }}
                           </span>
                           <span class="nome-time" id="aovivo-nome-casa">
                               {{ strtoupper($jogoAoVivo['commonName']['default'] ?? 'Time Casa') }}
                           </span>
                       </div>
                    
                    <!-- Centro do Placar -->
                    <div class="centro-placar-block">
                                                <div class="numeros-placar">
                            <!-- Placar do Time da Casa -->
                            <div class="score" id="aovivo-score-casa">
                                @if(isset($jogoAoVivo['homeRoadFlag']) && $jogoAoVivo['homeRoadFlag'] === 'H')
                                    {{ $jogoAoVivo['goals'] ?? 0 }}
                                @else
                                    {{ $jogoAoVivo['points'] ?? 0 }}
                                @endif
                            </div>
                            
                            <div class="vs-x">X</div>
                            
                            <!-- Placar do Time de Fora -->
                            <div class="score" id="aovivo-score-fora">
                                @if(isset($jogoAoVivo['homeRoadFlag']) && $jogoAoVivo['homeRoadFlag'] === 'R')
                                    {{ $jogoAoVivo['goals'] ?? 0 }}
                                @else
                                    {{ $jogoAoVivo['plusMinus'] ?? 0 }}
                                @endif
                            </div>
                        </div>

                        
                        <div class="info-periodo">
                            <span id="aovivo-periodo">Temporada Regular</span>
                            <span class="divisor-bolinha"></span>
                            <span id="aovivo-tempo">Tempo: {{ $jogoAoVivo['toi'] ?? '00:00' }}</span>
                        </div>
                    </div>

                    <!-- Time de Fora -->
                    <div class="time time-fora">
                        <span class="letra-time-grande" id="aovivo-letra-fora">
                            {{ substr($jogoAoVivo['opponentCommonName']['default'] ?? 'A', 0, 1) }}
                        </span>
                        <span class="nome-time" id="aovivo-nome-fora">
                            {{ strtoupper($jogoAoVivo['opponentCommonName']['default'] ?? 'Visitante') }}
                        </span>
                    </div>
                   </div>
                <div class="barra-periodo-wrapper">
                    <div class="barra-periodo-progresso" id="aovivo-progresso" style="width: {{ $jogoAoVivo['shifts'] ?? 50 }}%;"></div>
                </div>
            </div>
        </div>
        @else
            <!-- Caso não venha nenhum jogo da API, mostra um estado amigável -->
            <div class="card-aovivo">
                <div class="card-aovivo-topo-rosa" style="background-color: #6c757d;">
                   <div class="status-badge">Nenhum jogo ocorrendo agora</div>
               </div>
               <div class="card-aovivo-conteudo" style="text-align: center; padding: 20px;">
                   <p>Acompanhe os próximos confrontos abaixo.</p>
               </div>
            </div>
        @endif

        <!-- BLOCO DE PROGRAMAÇÃO (PRÓXIMOS E CALENDÁRIO) -->
        <div class="programacao-container">
            <div class="bloco-programacao proximos-jogos">
                <div class="topo-bloco topo-roxo">
                    <h3>Últimos Confrontos</h3>
                </div>
                <div class="conteudo-bloco">
                    @if(isset($ultimosJogos) && count($ultimosJogos) > 0)
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            @foreach(array_slice($ultimosJogos, 0, 3) as $partida)
                                <li style="padding: 8px 0; border-bottom: 1px solid #eee; font-size: 0.9em;">
                                    <strong>{{ \Carbon\Carbon::parse($partida['gameDate'])->format('d/M') }}</strong> - 
                                    {{ $partida['teamAbbrev'] }} vs {{ $partida['opponentAbbrev'] }} 
                                    ({{ $partida['goals'] }} - {{ $partida['points'] }})
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Estrutura de próximos jogos pronta</p>
                    @endif
                </div>
            </div>

            <div class="bloco-programacao calendario">
                <div class="topo-bloco topo-rosa-escuro">
                    <h3>Calendário</h3>
                </div>
                <div class="conteudo-bloco">
                    <p>Estrutura calendário pronta</p>
                </div>
            </div>
        </div>
    </section>

    <section id="sobre" class="section-content">

        <img src="{{ asset('imagens/tc.png') }}" class="taco-fundo-sobre" alt="Taco de Hóquei">
        
        <div class="card-sobre">
            <div class="card-sobre-topo-rosa">
                <h3>SOBRE O  HOCKEY GIRLS</h3>
            </div>

            <div class="card-sobre-conteudo">

                
                <div class="widgets-container">

                    <div class="widget-box ">
                        <div class="widget-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h4>ACOMPANHAR JOGOS</h4>
                        <p>Veja os jogos dos dia e acompanhe cada partida em tempo real.</p>
                    </div>

                    <div class="widget-box ">
                        <div class="widget-icon">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        <h4>VISUALIZAR STATUS</h4>
                        <p>Fique por dentro dos placares, períodos e atualizações ao vivo.</p>
                    </div>


                    <div class="widget-box ">
                        <div class="widget-icon">
                            <i class="fa-regular fa-calendar-days"></i>
                        </div>
                        <h4>DESCOBRIR PARTIDAS</h4>
                        <p>Confira as próximas partidas, horários, arenas e confrontos.</p>
                    </div>
                </div>

                <div class="btn-container-sobre">
                    <a href="{{ route('fa') }}" class="btn-central-fa">CENTRAL DO FÃ &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    
    
    <script src="{{ asset('js/script.js') }}"></script>
</body>
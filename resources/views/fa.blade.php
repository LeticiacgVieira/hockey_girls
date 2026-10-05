<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Central do Fã - Hockey Girls</title>
    <link rel="icon" type="image/png" href="{{ asset('imagens/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fa.css') }}">
</head>
<body>
    <header class="navbar-container">
        <div class="nav-links">
            <a href="{{ route('home') }}" class="btn-voltar">← VOLTAR PARA HOME</a>
        </div>
    </header>

    <main id="sobre" class="container-section">
        
        <img src="{{ asset('imagens/tc.png') }}" class="taco-fundo-sobre" alt="Taco de Hóquei">

        <img src="{{ asset('imagens/br.png') }}" class="decoracao brilho-pos-1" alt="Brilho">
        <img src="{{ asset('imagens/br.png') }}" class="decoracao brilho-pos-2" alt="Brilho">
        <img src="{{ asset('imagens/coracao.png') }}" class="decoracao coracao-dir" alt="Coração">
        <img src="{{ asset('imagens/nuvem.png') }}" class="decoracao nuvem-baixo-dir" alt="Nuvem">

        <div class="wrapper-fa">
            
            

            <div class="card-fa">
                <div class="card-fa-topo-rosa">
                    <h3>CENTRAL DO FÃ</h3>
                </div>

                <div class="card-sobre-conteudo">
                    <p class="subtitulo-fa">
                        ⭐ Aprenda as regras, posições, competições e curiosidades do hockey no gelo.
                    </p>

                    <div class="grid-fa">
                        
                        <a href="#" class="item-fa">
                            <div class="icon-wrapper-fa"><i class="fa-solid fa-person-skating"></i></div>
                            <span>O QUE É HOCKEY?</span>
                        </a>

                        <a href="#" class="item-fa">
                            <div class="icon-wrapper-fa"><i class="fa-regular fa-file-lines"></i></div>
                            <span>REGRAS</span>
                        </a>

                        <a href="#" class="item-fa">
                            <div class="icon-wrapper-fa"><i class="fa-regular fa-clock"></i></div>
                            <span>COMO FUNCIONA UMA PARTIDA?</span>
                        </a>

                        <a href="#" class="item-fa">
                            <div class="icon-wrapper-fa"><i class="fa-solid fa-trophy"></i></div>
                            <span>COMO FUNCIONA UMA COMPETIÇÃO?</span>
                        </a>

                        <a href="#" class="item-fa">
                            <div class="icon-wrapper-fa"><i class="fa-solid fa-bullseye"></i></div>
                            <span>COMO MARCAR PONTOS?</span>
                        </a>

                        <a href="#" class="item-fa">
                            <div class="icon-wrapper-fa"><i class="fa-solid fa-book-open"></i></div>
                            <span>TERMOS IMPORTANTES</span>
                        </a>

                        <a href="#" class="item-fa">
                            <div class="icon-wrapper-fa"><i class="fa-solid fa-users"></i></div>
                            <span>QUEM JOGA?</span>
                        </a>

                        <a href="#" class="item-fa">
                            <div class="icon-wrapper-fa"><i class="fa-regular fa-circle-question"></i></div>
                            <span>PERGUNTAS FREQUENTES</span>
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </main>

    <div id="modal-fa" class="modal-overlay">
        <div class="modal-wrapper">
            <div class="modal-header">
                <h2 id="modal-titulo">O QUE É HOCKEY?</h2>
                <button id="modal-fechar" class="btn-fechar">X</button>
            </div>
            <div id="modal-conteudo" class="modal-body">
                </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
// Selecionar os botões
const navButtons = document.querySelectorAll('.nav-btn');
const sections = document.querySelectorAll('.container-section, .section-content');

window.addEventListener('scroll', () => {
    let currentSectionId = '';

    const scrollPosition = window.scrollY || document.documentElement.scrollTop;

    // Verifica a seção que esta sendo exibida na tela
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;

        // Adiciona uma margem de tolerância para acionar o botão
        if (scrollPosition >= (sectionTop - 200) && scrollPosition < (sectionTop + sectionHeight - 200)) {
            currentSectionId = section.getAttribute('id');
        }
    })

    // Adiciona a classe active apenas ao botão da seção atual
    navButtons.forEach(button => {

        button.classList.remove('active'); 

        if (button.getAttribute('href') === `#${currentSectionId}`) {
            button.classList.add('active');
        }
    })
});

window.dispatchEvent(new Event('scroll'));



// Banco de dados com os conteúdos de cada card
const conteudosCards = {
    "O QUE É HOCKEY?": `
        <p>O hockey no gelo é um esporte disputado entre duas equipes que competem para marcar gols utilizando um disco chamado puck. O objetivo é simples: marcar mais gols que o adversário antes do término da partida.</p>
        <p>O esporte é conhecido por sua velocidade, intensidade física e estratégia. As partidas acontecem em uma pista de gelo chamada rink, onde os jogadores utilizam patins para se locomover.</p>
        <h3>Objetivo do jogo</h3>
        <ul>
            <li>Marcar gols na baliza adversária.</li>
            <li>Defender a própria baliza.</li>
            <li>Terminar a partida com mais gols que o oponente.</li>
        </ul>
        <h3>Curiosidade</h3>
        <p>O puck pode ultrapassar velocidades de 160 km/h em arremessos profissionais.</p>
    `,
    "REGRAS": `
        <p>Existem muitas regras, mas três delas são essenciais para entender praticamente qualquer partida.</p>
        <h3>Offside (Impedimento)</h3>
        <p>A equipe atacante não pode entrar na zona ofensiva antes do puck.</p>
        <h4>Imagine a situação:</h4>
        <p>❌ Jogador entra primeiro.</p>
        <p>❌ Puck entra depois.</p>
        <p>Resultado:</p>
        <p> Offside.</p>
        <p>O jogo é interrompido.</p>
        <h4>Forma simples de lembrar</h4>
        <p>"O puck deve entrar primeiro."</p>
        <p>_________________________________</p>
        <h3>Icing</h3>
        <p>Ocorre quando um jogador lança o puck de sua metade da pista até a linha de fundo adversária sem que ninguém toque nele.</p>
        <h4>Por que essa regra existe?</h4>
        <p>Para evitar que equipes apenas joguem o puck para longe quando estão sob pressão.</p>
        <p>Resultado:</p>
        <p> Interrupção da partida.</p>
        <p>_________________________________</p>
        <h3>Penalidades</h3>
        <p>Quando um jogador comete uma infração, ele é enviado para o banco de penalidades.</p>
        <p>Geralmente permanece fora por:</p>
        <p>2 minutos</p>
        <p>Durante esse período sua equipe fica com menos jogadores.</p>
        <p>_________________________________</p>
        <h3>Infrações mais comuns</h3>
        <p><b>Tripping</b></p>
        <p>Derrubar um adversário.</p>
        <p><b>Hooking</b></p>
        <p>Puxar o adversário usando o taco.</p>
        <p><b>Holding</b></p>
        <p>Segurar o adversário.</p>
        <p><b>High-Sticking</b></p>
        <p>Atingir alguém com o taco elevado.</p>
    `,
    "COMO FUNCIONA UMA PARTIDA?": `
        <p>Uma partida possui três períodos de 20 minutos, totalizando 60 minutos de jogo efetivo.</p>
        <p>O cronômetro para sempre que ocorre uma interrupção, como faltas, gols ou quando o puck sai da área de jogo.</p>
        <p>Diferente do futebol, as substituições acontecem constantemente durante a partida, sem necessidade de interromper o jogo.</p>

        <br>
        
        <h4>Estrutura da partida</h4>
        <ol>
          <li>Primeiro período</li>
          <li>Segundo período</li>
          <li>Terceiro período</li>
        </ol>
        <br>

        <h4>Se houver empate</h4>
        <p>Dependendo da competição:</p>
        <ul>
          <li>Prorrogação (Overtime)</li>
          <li>Shootout (disputa individual contra o goleiro)</li>
        </ul>
        
        <br>

        <h4>O que é um Faceoff?</h4>
        <p>Sempre que o jogo é interrompido, ele recomeça através de um <i>faceoff</i>.</p>
        <p>Nesse momento, um árbitro deixa o puck cair entre dois jogadores adversários, que disputam sua posse.</p>
        <p>É o equivalente ao reinício de uma jogada.</p>
    `,
    "COMO FUNCIONA UMA COMPETIÇÃO?": `
        <p>Durante a temporada, as equipes disputam dezenas de partidas.</p>
        <p>Cada resultado gera pontos na classificação.</p>
        
        <h3>Sistema de pontos</h3>
        <br>
        <p>Vitória:</p>
        <p>+ 2 pontos</p>
        <br>
        <p>Derrota na prorrogação:</p>
        <p>+ 1 ponto</p>
        <br>
        <p>Derrota no tempo normal:</p>
        <p> + 0 pontos</p>
        <br>
        <p>Ao final da temporada regular, as equipes com melhor desempenho avançam para os playoffs.</p>
        <br>
        <h3>Playoffs</h3>
        <p>São fases eliminatórias.</p>
        <p>As equipes disputam séries de até sete jogos.</p>
        <p>Quem vencer quatro partidas primeiro avança.</p>
        
        <br>
        
        <p>Exemplo:</p>
        <p>Time A vence: 4 jogos</p>
        <p>Time B vence: 2 jogos</p>
        <p>Resultado: Time A avança.</p>
    `,
    "COMO MARCAR PONTOS?": `
        <p>Marcar um gol é simples: o puck precisa atravessar completamente a linha da baliza adversária.</p>
        <p>Cada gol vale um ponto no placar.</p>

        <br>
        <h4>Exemplo</h4>
        <p>Equipe A: 3 gols</p>
        <p>Equipe B: 2 gols</p>
        <p>Resultado: Vitória da Equipe A por 3 a 2.</p>

        <br>
        <h4>Como os gols geralmente acontecem?</h4>
        <ul>
          <li>Arremessos de longa distância.</li>
          <li>Finalizações próximas ao gol.</li>
          <li>Rebotes deixados pelo goleiro.</li>
          <li>Jogadas coletivas envolvendo vários passes.</li>
        </ul>

        <br>
        <h4>O que é uma assistência?</h4>
        <p>Quando um jogador realiza o passe que resulta diretamente em um gol.</p>
        <p>Esse jogador também recebe crédito pela jogada.</p>
    `,
    "TERMOS IMPORTANTES": `
        <p>O hockey possui diversos termos próprios que podem parecer confusos para quem está começando. Conhecer os conceitos básicos torna muito mais fácil entender partidas, estatísticas e comentários dos narradores.</p>

        <br>
        <h4>🏒 Puck</h4>
        <p>Disco de borracha utilizado durante a partida. É o equivalente à bola em outros esportes e pode atingir velocidades extremamente altas durante os arremessos.</p>

        <br>
        <h4>🥅 Goal</h4>
        <p>Termo utilizado para indicar um gol. Um gol é marcado quando o puck atravessa completamente a linha da baliza adversária.</p>

        <br>
        <h4>🧤 Goalie</h4>
        <p>Nome dado ao goleiro. É o jogador responsável por defender a baliza e impedir que a equipe adversária marque gols.</p>

        <br>
        <h4>🎯 Assist</h4>
        <p>Passe realizado por um jogador que contribui diretamente para um gol. Os jogadores podem receber créditos por assistências em suas estatísticas.</p>

        <br>
        <h4>🔄 Faceoff</h4>
        <p>Forma de reiniciar uma jogada após uma interrupção. O árbitro deixa o puck cair entre dois jogadores adversários que disputam sua posse.</p>

        <br>
        <h4>⚡ Power Play</h4>
        <p>Situação em que uma equipe possui mais jogadores no gelo devido a uma penalidade sofrida pelo adversário. É uma grande oportunidade para marcar gols.</p>

        <br>
        <h4>🛡️ Penalty Kill</h4>
        <p>Oposto do Power Play. A equipe com menos jogadores tenta defender seu gol até o término da penalidade.</p>

        <br>
        <h4>🚫 Offside</h4>
        <p>Ocorre quando um jogador entra na zona ofensiva antes do puck. A jogada é interrompida e reiniciada com um faceoff.</p>

        <br>
        <h4>📏 Icing</h4>
        <p>Infração que acontece quando o puck é lançado da própria metade da pista até a linha de fundo adversária sem que ninguém o toque.</p>

        <br>
        <h4>⏳ Overtime</h4>
        <p>Prorrogação disputada quando a partida termina empatada e o regulamento exige um vencedor.</p>

        <br>
        <h4>🎯 Shootout</h4>
        <p>Desempate em que jogadores enfrentam o goleiro adversário individualmente para decidir o vencedor da partida.</p>

        <br>
        <h4>🎩 Hat Trick</h4>
        <p>Expressão utilizada quando um jogador marca três gols em uma única partida.</p>

        <br>
        <h4>⭐ MVP</h4>
        <p>Sigla para Most Valuable Player (Jogador Mais Valioso), concedida ao atleta que teve maior impacto em uma partida ou competição.</p>
    `,
    "QUEM JOGA?": `
        <p>Cada equipe possui seis jogadores no gelo.</p>

        <br>
        <h4>🧤 Goleiro</h4>
        <p>É o jogador responsável por defender a baliza.</p>
        <p>Seu principal objetivo é impedir que o puck entre no gol.</p>

        <br>
        <h4>🛡️ Defensores</h4>
        <p>Normalmente dois jogadores.</p>
        <br>
        <p>Funções:</p>
        <ul>
          <li>Impedir ataques adversários.</li>
          <li>Recuperar o puck.</li>
          <li>Iniciar contra-ataques.</li>
        </ul>

        <br>
        <h4>⚡ Atacantes</h4>
        <p>Normalmente três jogadores.</p>
        <br>
        <p>Funções:</p>
        <ul>
          <li>Criar oportunidades de gol.</li>
          <li>Pressionar a defesa adversária.</li>
          <li>Finalizar as jogadas.</li>
        </ul>

        <br>
        <h4>Importante</h4>
        <p>Os jogadores trocam constantemente durante a partida.</p>
        <p>Uma mesma equipe pode realizar dezenas de substituições em um único jogo.</p>
    `,
    "PERGUNTAS FREQUENTES": `
        <h4>É permitido contato físico?</h4>
        <p>Sim.</p>
        <p>O hockey permite contato físico, mas existem limites. Contatos perigosos ou irregulares geram penalidades.</p>

        <br>
        <h4>O goleiro pode sair do gol?</h4>
        <p>Sim.</p>
        <p>Em algumas situações, especialmente no final do jogo, a equipe pode retirar o goleiro para colocar mais um jogador de linha.</p>

        <br>
        <h4>Por que os jogadores trocam tanto?</h4>
        <p>Porque o esporte exige muito esforço físico. Os atletas normalmente permanecem no gelo entre 30 segundos e 1 minuto antes de serem substituídos.</p>

        <br>
        <h4>O goleiro pode sair do gol?</h4>
        <p>Não.</p>
        <ul>
          <li>como marcar gols;</li>
          <li>offside;</li>
          <li>icing;</li>
          <li>penalidades;</li>
          <li>power play;</li>
        </ul>
        <p>você já conseguirá acompanhar grande parte das partidas sem dificuldade.</p>
    `
};

// Certifica-se de que o código só roda após o HTML estar totalmente carregado
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById('modal-fa');
    const modalTitulo = document.getElementById('modal-titulo');
    const modalConteudo = document.getElementById('modal-conteudo');
    const btnFechar = document.getElementById('modal-fechar');
    const cards = document.querySelectorAll('.item-fa');

    if (!modal) {
        console.error("Erro: Não foi encontrado o elemento com id 'modal-fa' no HTML.");
        return;
    }

    // Adiciona evento de clique em cada card
    cards.forEach(card => {
        card.addEventListener('click', (e) => {
            e.preventDefault(); // Impede o comportamento padrão do link
            
            // Procura o <span> dentro do card clicado para pegar o texto correto
            const spanElement = card.querySelector('span');
            if (!spanElement) return;

            const tituloCard = spanElement.innerText.trim().toUpperCase();
            
            // Verifica se o texto coincide com a nossa lista de conteúdos
            if (conteudosCards[tituloCard]) {
                modalTitulo.innerText = tituloCard;
                modalConteudo.innerHTML = conteudosCards[tituloCard];
                modal.classList.add('ativo');
            } else {
                console.warn("Nenhum conteúdo encontrado para o card:", tituloCard);
            }
        });
    });

    // Função para fechar o pop-up
    function fecharModal() {
        modal.classList.remove('ativo');
    }

    // Eventos para fechar
    if (btnFechar) btnFechar.addEventListener('click', fecharModal);
    
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            fecharModal();
        }
    });
});


// Controle do Pop-up (Modal)
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById('modal-fa');
    const modalTitulo = document.getElementById('modal-titulo');
    const modalConteudo = document.getElementById('modal-conteudo');
    const btnFechar = document.getElementById('modal-fechar');
    const cards = document.querySelectorAll('.item-fa');

    if (!modal) return;

    // Adiciona evento de clique em cada card
    cards.forEach(card => {
        card.addEventListener('click', (e) => {
            e.preventDefault(); 
            
            const spanElement = card.querySelector('span');
            if (!spanElement) return;

            const tituloCard = spanElement.innerText.trim().toUpperCase();
            
            if (conteudosCards[tituloCard]) {
                modalTitulo.innerText = tituloCard;
                modalConteudo.innerHTML = conteudosCards[tituloCard];
                
                modal.classList.add('ativo');
                document.body.classList.add('modal-aberto'); // <--- TRAVA O SCROLL DO FUNDO
            }
        });
    });

    // Função para fechar o pop-up
    function fecharModal() {
        modal.classList.remove('ativo');
        document.body.classList.remove('modal-aberto'); // <--- LIBERA O SCROLL DO FUNDO
    }

    if (btnFechar) btnFechar.addEventListener('click', fecharModal);
    
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            fecharModal();
        }
    });
});
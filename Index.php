<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoMaster</title>
    <link rel="stylesheet" href="./FrontEnd/Estilo.css">
</head>
<body>
<?php
   include './Paginas/Topo.php'
    ?>

    <section class="hero-index">
        <div class="index-container hero-conteudo">
            <h1>
                Cuidando do seu veículo<br>
                com <span>excelência</span>
            </h1>

            <p>
                Oficina mecânica especializada com mais de 15 anos de experiência.<br>
                Serviços de qualidade, preço justo e atendimento personalizado.
            </p>

            <div class="hero-botoes">
                <a href="/Paginas/Agendar.php" class="btn-vermelho">Agendar Serviço</a>
                <a href="#servicos" class="btn-branco">Nossos Serviços</a>
            </div>
        </div>
    </section>

    <section class="servicos-index" id="servicos">
        <div class="index-container">
            <h2>Nossos <span>Serviços</span></h2>
            <p class="subtitulo-index">
                Oferecemos uma gama completa de serviços automotivos para manter seu
                veículo funcionando perfeitamente
            </p>

            <div class="grid-servicos">
                <div class="card-servico destaque">
                    <div class="icone-servico">🔧</div>
                    <h3>Manutenção Preventiva</h3>
                    <p>Revisões regulares para manter seu veículo em perfeito estado</p>
                </div>

                <div class="card-servico">
                    <div class="icone-servico">⚙️</div>
                    <h3>Manutenção Corretiva</h3>
                    <p>Diagnóstico e reparo de problemas mecânicos e elétricos</p>
                </div>

                <div class="card-servico">
                    <div class="icone-servico">🛞</div>
                    <h3>Alinhamento e Balanceamento</h3>
                    <p>Serviço especializado para melhor desempenho dos pneus</p>
                </div>

                <div class="card-servico">
                    <div class="icone-servico">⚡</div>
                    <h3>Injeção Eletrônica</h3>
                    <p>Diagnóstico e manutenção do sistema de injeção</p>
                </div>
            </div>

            <div class="centro-botao">
                <a href="#" class="btn-borda">Ver Todos os Serviços</a>
            </div>
        </div>
    </section>

    <section class="porque-index">
        <div class="index-container">
            <h2>Por que escolher a <span>AutoMaster</span>?</h2>

            <div class="grid-beneficios">
                <div class="beneficio-item">
                    <div class="icone-beneficio">🛡️</div>
                    <h3>Garantia de Qualidade</h3>
                    <p>Todos os serviços com garantia de 90 dias</p>
                </div>

                <div class="beneficio-item">
                    <div class="icone-beneficio">🕒</div>
                    <h3>Atendimento Rápido</h3>
                    <p>Agilidade sem comprometer a qualidade</p>
                </div>

                <div class="beneficio-item">
                    <div class="icone-beneficio">⭐</div>
                    <h3>Profissionais Certificados</h3>
                    <p>Equipe treinada e qualificada</p>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-index">
        <div class="index-container cta-conteudo">
            <h2>Pronto para cuidar do seu veículo?</h2>
            <p>Agende seu serviço agora e tenha a tranquilidade de um trabalho bem feito</p>
            <a href="agendar.php" class="btn-preto">Agendar Agora</a>
        </div>
    </section>

    <section class="comentarios-index">
        <div class="index-container">
            <h2>O que nossos <span>clientes</span> dizem</h2>

            <div class="grid-comentarios">
                <div class="card-comentario-index">
                    <div class="estrelas">★★★★★</div>
                    <p>"Excelente atendimento e serviço de qualidade. Meu carro ficou perfeito!"</p>
                    <h3>Carlos Mendes</h3>
                </div>

                <div class="card-comentario-index">
                    <div class="estrelas">★★★★★</div>
                    <p>"Confio na AutoMaster há anos. Sempre atenciosos e honestos."</p>
                    <h3>Ana Paula</h3>
                </div>

                <div class="card-comentario-index">
                    <div class="estrelas">★★★★★</div>
                    <p>"Melhor custo-benefício da região. Recomendo!"</p>
                    <h3>Roberto Lima</h3>
                </div>
            </div>
        </div>
    </section>
<?php
    include './Paginas/Rodape.php'
    ?>



</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../FrontEnd/Estilo.css">
    <title>Agendar</title>
</head>
<body>
    <?php include 'Topo.php'; ?>
    <div class="agendar-page-container">
    
    <div class="titulos">
        <h1>Agendar Serviço</h1>
        <h2>Preencha o formulário abaixo e entraremos em contato para confirmar seu agendamento</h2>
    </div>
        <div id="agendar">
            <form action="">
                <h2>Dados do Agendamento</h2>
                <div class="dados_pessoais">
                    <h3 class="full">Dados Pessoais</h3>
                    <div class="campo">
                        <label>Nome:</label>
                        <input type="text" placeholder="Seu Nome"
                    </div>

                    <div class="campo">
                        <label>Telefone:</label>
                        <input type="text" placeholder="(XX) XXXXX-XXXX">
                    </div>
                </div>
                <div class="email">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" placeholder="seu@email.com">
                </div>
                <div class="dados_veiculo">
                    <h3>Dados do Veículo</h3>
                    <label for="dados_veiculo">Veículo</label>
                    <input type="text" name="modelo" id="dados_veiculo" placeholder="Ex: Honda Civic 2020">
                </div>
                <div class="servicos">
                    <h3>Serviços Desejados</h3>
                    <label for="servicos_desejados">Tipo de Serviço:</label>
                    <select name="servicos_desejados" id="servicos_desejados">
                        <option value="">Selecione um serviço</option>
                        <option value="revisao">Revisão Completa</option>
                        <option value="troca_oleo">Troca de Óleo</option>
                        <option value="alinhamento">Alinhamento e Balanceamento</option>
                        <option value="freios">Freios</option>
                        <option value="suspensao">Suspensão</option>
                        <option value="arcondicionado">Ar Condicionado</option>
                        <option value="injecao">Injeção Eletrônica</option>
                        <option value="sistema_eletrico">Sistema Elétrico</option>
                        <option value="diagnostico_computadorizado">Diagnostico Computadorizado</option>
                        <option value="outros">Outros</option>
                    </select>    
                </div>
                <div class="data_hora">
                    <h3 class="full">Data e Hora</h3>
                    <div class="campo">
                        <label for="data_agendamento">Data Preferida:</label>
                        <input type="date" name="data_agendamento" id="data_agendamento">
                    </div>
                    <div class="campo">
                        <label for="hora_agendamento">Horário:</label>
                        <input type="time" name="hora_agendamento" id="hora_agendamento">
                    </div>
                </div>
                <div class="observaçoes">
                    <h3>Observações Adicionais</h3>
                    <label for="observacoes">Observações:</label><br>
                    <textarea name="observacoes" id="observacoes" placeholder="Descreva o problema ou serviço necessário....."></textarea>
                </div>
                <div class="botao_agendar">
                    <button type="submit">Confirmar Agendamento</button>
                </div>
            </form>
            <div class="sidebar">
                <div class="contato">
                    <h3>Informações de Contato</h3>
                    <p><strong>Telefone</strong><br>📞(11) 3456-7890</p><br>
                    <p><strong>E-mail</strong><br>✉️ contato@automaster.com.br</p><br>
                    <p><strong>⏰ Horário</strong><br>
                            Seg a Sex: 8h às 18h<br>
                            Sáb: 8h às 12h
                    </p>
                </div>
                <div class="box">
                    <h3>Como Funciona</h3>
                    <ul class="steps">
                    <li><div class="circulo">1</div> Preencha o formulário com seus dados</li>
                    <li><div class="circulo">2</div> Aguarde nossa confirmação por telefone</li>
                    <li><div class="circulo">3</div> Compareça no dia e horário agendado</li>
                    <li><div class="circulo">4</div> Seu veículo será atendido com qualidade</li>
                    </ul>
                </div>
            </div>
        </div>
</div>

    <?php include 'Rodape.php'; ?>
</body>
</html>
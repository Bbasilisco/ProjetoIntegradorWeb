<section class="agendamento">

<div class="container-agendamento">

    <!-- LADO ESQUERDO -->
    <div class="formulario">

        <h2>Dados do Agendamento</h2>

        <form action="agendar.php" method="POST">

            <h3>Dados Pessoais</h3>

            <div class="linha">
                <div class="campo">
                    <label>Nome:</label>
                    <input type="text" name="nome" placeholder="Seu Nome">
                </div>

                <div class="campo">
                    <label>Telefone:</label>
                    <input type="text" name="telefone" placeholder="(XX) XXXXX-XXXX">
                </div>
            </div>

            <div class="campo">
                <label>E-mail:</label>
                <input type="email" name="email" placeholder="seu@email.com">
            </div>

            <h3>Dados do Veículo</h3>

            <div class="campo">
                <label>Veículo</label>
                <input type="text" name="veiculo" placeholder="Ex: Honda Civic 2020">
            </div>

            <h3>Serviços Desejados</h3>

            <div class="campo">
                <label>Tipo de Serviço:</label>

                <select name="servico">
                    <option>Selecione um serviço</option>
                    <option>Troca de óleo</option>
                    <option>Revisão</option>
                    <option>Freios</option>
                    <option>Alinhamento</option>
                </select>
            </div>

            <h3>Data e Hora</h3>

            <div class="linha">

                <div class="campo">
                    <label>Data Preferida:</label>
                    <input type="date" name="data">
                </div>

                <div class="campo">
                    <label>Horário:</label>
                    <input type="time" name="hora">
                </div>

            </div>

            <div class="campo">
                <label>Observações</label>
                <textarea name="observacao"></textarea>
            </div>

            <button class="btn-agendar">
                Confirmar Agendamento
            </button>

        </form>

    </div>


    <!-- LADO DIREITO -->
    <div class="sidebar">

        <div class="card">

            <h3>Informações de Contato</h3>

            <p><strong>Telefone</strong><br>
            📞 (11) 3456-7890</p>

            <p><strong>E-mail</strong><br>
            ✉️ contato@automaster.com.br</p>

            <p><strong>Horário</strong><br>
            Seg a Sex: 8h às 18h<br>
            Sáb: 8h às 12h</p>

        </div>

        <div class="card">

            <h3>Como Funciona</h3>

            <ul class="passos">

                <li><span>1</span> Preencha o formulário</li>

                <li><span>2</span> Aguarde nossa confirmação</li>

                <li><span>3</span> Compareça no dia agendado</li>

                <li><span>4</span> Seu veículo será atendido</li>

            </ul>

        </div>

    </div>

</div>

</section>
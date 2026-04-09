<form action="agendar.php" method="POST">

<h2>Dados do Agendamento</h2>

<h3>Dados Pessoais</h3>

<label>Nome:</label>
<input type="text" name="nome" placeholder="Seu Nome" required>

<label>Telefone:</label>
<input type="text" name="telefone" placeholder="(XX) XXXXX-XXXX" required>

<label>E-mail:</label>
<input type="email" name="email" placeholder="seu@email.com" required>

<h3>Dados do Veículo</h3>

<label>Veículo</label>
<input type="text" name="veiculo" placeholder="Ex: Honda Civic 2020" required>

<h3>Serviços Desejados</h3>

<select name="servico">
<option value="">Selecione um serviço</option>
<option value="1">Revisão Completa</option>
<option value="2">Troca de Óleo</option>
<option value="3">Alinhamento e Balanceamento</option>
<option value="4">Freios</option>
<option value="5">Suspensão</option>
<option value="6">Ar Condicionado</option>
<option value="7">Injeção Eletrônica</option>
<option value="8">Sistema Elétrico</option>
<option value="9">Diagnóstico Computadorizado</option>
<option value="10">Outros</option>
</select>

<h3>Data e Hora</h3>

<label>Data Preferida:</label>
<input type="date" name="data">

<label>Horário:</label>
<input type="time" name="hora">

<h3>Observações</h3>

<textarea name="observacao" placeholder="Descreva o problema ou serviço necessário"></textarea>

<button type="submit">Confirmar Agendamento</button>

</form>
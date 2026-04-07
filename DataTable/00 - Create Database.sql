CREATE DATABASE jpAutoCenter;

USE jpAutoCenter;
     
CREATE TABLE tblTipoVeiculo(
    id INT PRIMARY KEY,
    tipoVeiculo VARCHAR(50)
); 
CREATE TABLE tblEstado(
    id INT PRIMARY KEY,
    estado VARCHAR(2)
); 
CREATE TABLE tblStatusAgendamento(
    id INT PRIMARY KEY,
    statusAgendamento VARCHAR(10)
); 
CREATE TABLE tblStatusOrdemServico(
    id INT PRIMARY KEY,
    statusOrdemServico VARCHAR(10)
); 
CREATE TABLE tblTiposServicos(
    id INT PRIMARY KEY,
    TipoServico VARCHAR(10),
    Valor decimal(10,2)
); 
CREATE TABLE tblTipoTelefone(
    id INT PRIMARY KEY,
    tipoTelefone VARCHAR(20)
);

CREATE TABLE tblMarcaVeiculo(
    id INT PRIMARY KEY,
    MarcaVeiculo VARCHAR(50),
    idTipoVeiculo INT,
    FOREIGN KEY(idTipoVeiculo) REFERENCES tblTipoVeiculo(id)
); 
CREATE TABLE tblCidade(
    id INT PRIMARY KEY,
    cidade VARCHAR(100),
    idEstado INT,
    FOREIGN KEY(idEstado) REFERENCES tblEstado(id)
); 
CREATE TABLE tblProprietario(
    id INT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(50),
    cpf VARCHAR(11)
);

CREATE TABLE tblVeiculo(
    id INT PRIMARY KEY,
    modelo VARCHAR(50),
    ano DATE,
    idMarcaVeiculo INT,
    idProprietario INT,
    FOREIGN KEY(idMarcaVeiculo) REFERENCES tblMarcaVeiculo(id),
    FOREIGN KEY(idProprietario) REFERENCES tblProprietario(id)
); 
CREATE TABLE tblEndereco(
    id INT PRIMARY KEY,
    endereco VARCHAR(100),
    numero VARCHAR(5),
    complemento VARCHAR(50),
    cep VARCHAR(8),
    bairro VARCHAR(50),
    idProprietario INT,
    idCidade INT,
    FOREIGN KEY(idProprietario) REFERENCES tblProprietario(id),
    FOREIGN KEY(idCidade) REFERENCES tblCidade(id)
); 
CREATE TABLE tblTelefone(
    id INT PRIMARY KEY,
    telefone VARCHAR(15),
    idProprietario INT,
    idTipoTelefone INT,
    FOREIGN KEY(idProprietario) REFERENCES tblProprietario(id),
    FOREIGN KEY(idTipoTelefone) REFERENCES tblTipoTelefone(id)
); 
CREATE TABLE tblAgendamento(
    id INT PRIMARY KEY,
    DATA DATETIME,
    agendamento VARCHAR(100),
    idStatusAgendamento INT,
    idProprietario INT,
    FOREIGN KEY(idStatusAgendamento) REFERENCES tblStatusAgendamento(id),
    FOREIGN KEY(idProprietario) REFERENCES tblProprietario(id)
); 
CREATE TABLE tblOrdemServico(
    id INT PRIMARY KEY,
    comentario VARCHAR(100),
    idTipoServico INT,
    idStatusOrdemServico INT,
    idProprietario INT,
    FOREIGN KEY(idTipoServico) REFERENCES tblTiposServicos(id),
    FOREIGN KEY(idStatusOrdemServico) REFERENCES tblStatusOrdemServico(id),
    FOREIGN KEY(idProprietario) REFERENCES tblProprietario(id)
);

USE jpAutoCenter;

INSERT INTO tblProprietario (id, placa, nome, email, cpf) VALUES (3, 'ABC1D23', 'Marcos Vinicius', 'marcos.v@email.com', '33344455566');
INSERT INTO tblProprietario (id, placa, nome, email, cpf) VALUES (1, 'JPA0C01', 'Ricardo Oliveira', 'ricardo@email.com', '11122233344');
INSERT INTO tblProprietario (id, placa, nome, email, cpf) VALUES (2, 'KRT4F88',  'Beatriz Souza', 'bia.souza@email.com', '22233344455');
INSERT INTO tblProprietario (id, placa, nome, email, cpf) VALUES (4, 'BEE7G21',  'Ana Paula Silva', 'anapaula@email.com', '44455566677');
INSERT INTO tblProprietario (id, placa, nome, email, cpf) VALUES (5, 'LNX9H45',  'Carlos Eduardo', 'cadu.camionete@email.com', '55566677788');
INSERT INTO tblProprietario (id, placa, nome, email, cpf) VALUES (6, 'MXP2J10',  'Juliana Mendes', 'ju.mendes@email.com', '66677788899');
INSERT INTO tblProprietario (id, placa, nome, email, cpf) VALUES (7, 'RST5K88',  'Roberto Carlos', 'rc.fretes@email.com', '77788899900');
INSERT INTO tblProprietario (id, placa, nome, email, cpf) VALUES (8, 'TVG5J99',  'Fernanda Lima', 'fer.lima@email.com', '88899900011');
INSERT INTO tblProprietario (id, placa, nome, email, cpf) VALUES (9, 'LOL6A15',  'Tiago Ramos', 'tiago.moto@email.com', '99900011122');
INSERT INTO tblProprietario (id, placa, nome, email, cpf) VALUES (10,'OIU8H82',  'Sandra Helena', 'sandra.h@email.com', '00011122233');
INSERT INTO tblProprietario (id, placa, nome, email, cpf) VALUES (11,'GAY1E50',  'Zeke', 'aizedamanga@yahoo.com', '65584475399');

INSERT INTO tblVeiculo (id, modelo, ano, idMarcaVeiculo, idProprietario) VALUES (1, 'D20 Custom Diesel', '1994-01-01', 3, 5);
INSERT INTO tblVeiculo (id, modelo, ano, idMarcaVeiculo, idProprietario) VALUES (2, 'R 1250 GS', '2023-01-01', 14, 5);
INSERT INTO tblVeiculo (id, modelo, ano, idMarcaVeiculo, idProprietario) VALUES (3, 'Civic LXR', '2016-01-01', 11, 1);
INSERT INTO tblVeiculo (id, modelo, ano, idMarcaVeiculo, idProprietario) VALUES (4, 'Uno Vivace', '2012-01-01', 2, 2);
INSERT INTO tblVeiculo (id, modelo, ano, idMarcaVeiculo, idProprietario) VALUES (5, 'Ranger Limited', '2021-01-01', 21, 3);
INSERT INTO tblVeiculo (id, modelo, ano, idMarcaVeiculo, idProprietario) VALUES (6, 'Ninja 400', '2020-01-01', 15, 9);
INSERT INTO tblVeiculo (id, modelo, ano, idMarcaVeiculo, idProprietario) VALUES (7, 'XY 50 Q (Bequinha)', '2022-01-01', 18, 10);
INSERT INTO tblVeiculo (id, modelo, ano, idMarcaVeiculo, idProprietario) VALUES (8, 'Corolla XEi', '2019-01-01', 6, 8);
INSERT INTO tblVeiculo (id, modelo, ano, idMarcaVeiculo, idProprietario) VALUES (9, 'Fiorino Endurance', '2022-01-01', 2, 7);
INSERT INTO tblVeiculo (id, modelo, ano, idMarcaVeiculo, idProprietario) VALUES (10, 'Onix Plus', '2021-01-01', 3, 4);
INSERT INTO tblVeiculo (id, modelo, ano, idMarcaVeiculo, idProprietario) VALUES (11, 'Peugeot 207 Passion', '2012-01-01', 10, 11);


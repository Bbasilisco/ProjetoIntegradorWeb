USE jpAutoCenter;


INSERT INTO tblTipoVeiculo (id, tipoVeiculo) VALUES (1, 'Carro');
INSERT INTO tblTipoVeiculo (id, tipoVeiculo) VALUES (2, 'Moto');
INSERT INTO tblTipoVeiculo (id, tipoVeiculo) VALUES (3, 'Motoneta / Scooter');
INSERT INTO tblTipoVeiculo (id, tipoVeiculo) VALUES (4, 'Utilitário Leve (Picape/Furgão)');
INSERT INTO tblTipoVeiculo (id, tipoVeiculo) VALUES (5, 'SUV');
INSERT INTO tblTipoVeiculo (id, tipoVeiculo) VALUES (6, 'Camionete / Utilitário Pesado');

INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (1, 'Volkswagen', 1);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (2, 'Fiat', 1);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (3, 'Chevrolet', 1);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (4, 'Renault', 1);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (5, 'Hyundai', 1);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (6, 'Toyota', 1);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (7, 'Jeep', 1);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (8, 'Caoa Chery', 1);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (9, 'Citroën', 1);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (10, 'Peugeot', 1);

INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (11, 'Honda', 2);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (12, 'Yamaha', 2);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (13, 'Suzuki', 2);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (14, 'BMW', 2); 
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (15, 'Kawasaki', 2);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (16, 'Harley-Davidson', 2);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (17, 'Royal Enfield', 2);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (18, 'Shineray', 2);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (19, 'Bajaj', 2);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (20, 'Triumph', 2);

INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (21, 'Ford', 6);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (22, 'Mitsubishi', 6);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (23, 'Nissan', 6);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (24, 'RAM', 6);
INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (25, 'Iveco', 6);

INSERT INTO tblMarcaVeiculo (id, MarcaVeiculo, idTipoVeiculo) VALUES (99, 'Outros (Importados / Antigos)', 1);

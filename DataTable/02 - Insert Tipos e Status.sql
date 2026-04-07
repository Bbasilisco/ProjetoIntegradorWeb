
INSERT INTO tblTipoTelefone (id, tipoTelefone) VALUES (1, 'Celular/WhatsApp');
INSERT INTO tblTipoTelefone (id, tipoTelefone) VALUES (2, 'Fixo Residencial');
INSERT INTO tblTipoTelefone (id, tipoTelefone) VALUES (3, 'Comercial');

INSERT INTO tblStatusAgendamento (id, statusAgendamento) VALUES (1, 'Pendente');
INSERT INTO tblStatusAgendamento (id, statusAgendamento) VALUES (2, 'Confirmado');
INSERT INTO tblStatusAgendamento (id, statusAgendamento) VALUES (3, 'Cancelado');

INSERT INTO tblStatusOrdemServico (id, statusOrdemServico) VALUES (1, 'Aberta');
INSERT INTO tblStatusOrdemServico (id, statusOrdemServico) VALUES (2, 'Em Exec.');
INSERT INTO tblStatusOrdemServico (id, statusOrdemServico) VALUES (3, 'Aguard Pec');
INSERT INTO tblStatusOrdemServico (id, statusOrdemServico) VALUES (4, 'Finalizada');
INSERT INTO tblStatusOrdemServico (id, statusOrdemServico) VALUES (5, 'Entregue');

INSERT INTO tblTiposServicos (id, TipoServico, Valor) VALUES (1, 'Troca Óleo', 150.00);
INSERT INTO tblTiposServicos (id, TipoServico, Valor) VALUES (2, 'Revisão', 450.00);
INSERT INTO tblTiposServicos (id, TipoServico, Valor) VALUES (3, 'Freios', 280.50);
INSERT INTO tblTiposServicos (id, TipoServico, Valor) VALUES (4, 'Suspensão', 600.00);
INSERT INTO tblTiposServicos (id, TipoServico, Valor) VALUES (5, 'Diagnóstico', 120.00);
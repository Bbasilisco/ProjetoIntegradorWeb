USE jpAutoCenter;

INSERT INTO tblAgendamento (id, data, agendamento, idStatusAgendamento, idProprietario) VALUES (1, '2026-03-27 08:30:00', 'Revisão periódica - Civic', 2, 1);
INSERT INTO tblAgendamento (id, data, agendamento, idStatusAgendamento, idProprietario) VALUES (2, '2026-03-27 10:00:00', 'Verificação de travões - Uno', 2, 2);
INSERT INTO tblAgendamento (id, data, agendamento, idStatusAgendamento, idProprietario) VALUES (3, '2026-03-27 14:00:00', 'Barulho na suspensão - Ranger', 1, 3);
INSERT INTO tblAgendamento (id, data, agendamento, idStatusAgendamento, idProprietario) VALUES (4, '2026-03-28 09:00:00', 'Troca de óleo e filtros - Onix', 2, 4);
INSERT INTO tblAgendamento (id, data, agendamento, idStatusAgendamento, idProprietario) VALUES (5, '2026-03-28 11:00:00', 'Manutenção bomba injetora - D20', 2, 5);
INSERT INTO tblAgendamento (id, data, agendamento, idStatusAgendamento, idProprietario) VALUES (6, '2026-03-30 08:00:00', 'Revisão Motorrad - BMW R1250', 2, 5);
INSERT INTO tblAgendamento (id, data, agendamento, idStatusAgendamento, idProprietario) VALUES (7, '2026-03-30 13:30:00', 'Elétrica geral - Importado', 1, 6);
INSERT INTO tblAgendamento (id, data, agendamento, idStatusAgendamento, idProprietario) VALUES (8, '2026-03-31 10:00:00', 'Reparo suspensão traseira - Fiorino', 2, 7);
INSERT INTO tblAgendamento (id, data, agendamento, idStatusAgendamento, idProprietario) VALUES (9, '2026-03-31 15:00:00', 'Alinhamento e balanceamento - Corolla', 2, 8);
INSERT INTO tblAgendamento (id, data, agendamento, idStatusAgendamento, idProprietario) VALUES (10, '2026-04-01 09:00:00', 'Ajuste de corrente e embreagem - Ninja', 1, 9);
INSERT INTO tblAgendamento (id, data, agendamento, idStatusAgendamento, idProprietario) VALUES (11, '2026-04-01 14:00:00', 'Limpeza de carburador - Shineray', 2, 10);
INSERT INTO tblAgendamento (id, data, agendamento, idStatusAgendamento, idProprietario) VALUES (12, '2026-04-02 08:00:00', 'Diagnóstico de falha na partida - Peugeot', 1, 11);


INSERT INTO tblOrdemServico (id, comentario, idTipoServico, idStatusOrdemServico, idProprietario) VALUES (1, 'Revisão periódica de 60 mil km e troca de filtros.', 2, 1, 1);
INSERT INTO tblOrdemServico (id, comentario, idTipoServico, idStatusOrdemServico, idProprietario) VALUES (2, 'Pedal de freio baixo. Verificar pastilhas e fluído.', 3, 2, 2);
INSERT INTO tblOrdemServico (id, comentario, idTipoServico, idStatusOrdemServico, idProprietario) VALUES (3, 'Barulho de metal batendo na suspensão dianteira direita.', 4, 1, 3);
INSERT INTO tblOrdemServico (id, comentario, idTipoServico, idStatusOrdemServico, idProprietario) VALUES (4, 'Troca de óleo 5W30 sintético e filtro de óleo.', 1, 2, 4);
INSERT INTO tblOrdemServico (id, comentario, idTipoServico, idStatusOrdemServico, idProprietario) VALUES (5, 'Vazamento na bomba injetora e dificuldade na partida a frio.', 5, 3, 5);
INSERT INTO tblOrdemServico (id, comentario, idTipoServico, idStatusOrdemServico, idProprietario) VALUES (6, 'Revisão de 10 mil km e check-up eletrônico via scanner.', 2, 1, 5);
INSERT INTO tblOrdemServico (id, comentario, idTipoServico, idStatusOrdemServico, idProprietario) VALUES (7, 'Troca de amortecedores traseiros reforçados para carga.', 4, 1, 7);
INSERT INTO tblOrdemServico (id, comentario, idTipoServico, idStatusOrdemServico, idProprietario) VALUES (8, 'Alinhamento, balanceamento e rodízio de pneus.', 5, 2, 8);
INSERT INTO tblOrdemServico (id, comentario, idTipoServico, idStatusOrdemServico, idProprietario) VALUES (9, 'Ajuste e lubrificação da relação e limpeza de bicos.', 2, 1, 9);
INSERT INTO tblOrdemServico (id, comentario, idTipoServico, idStatusOrdemServico, idProprietario) VALUES (10, 'Limpeza de carburador e troca da vela de ignição.', 5, 4, 10);
INSERT INTO tblOrdemServico (id, comentario, idTipoServico, idStatusOrdemServico, idProprietario) VALUES (11, 'Falha crônica na partida. Verificar aterramento e módulo BSM.', 5, 1, 11);
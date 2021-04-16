<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

// Pacientes
$router->get('/pacientes', 'PatientsController@index');
$router->get('/pacientes/cadastro', 'PatientsController@cadastro');
$router->post('/pacientes/cadastro', 'PatientsController@cadastroAction');
$router->get('/pacientes/agendamento/{id}', 'PatientsController@agendamento');
$router->get('/pacientes/procedimentos/consulta', 'PatientsController@consulta');
$router->get('/pacientes/procedimentos/anamnese', 'PatientsController@anamnese');
$router->get('/pacientes/procedimentos/exames', 'PatientsController@exames');
$router->get('/pacientes/procedimentos/diagnostico', 'PatientsController@diagnostico');
$router->get('/pacientes/procedimentos/evolucao', 'PatientsController@evolucao');
$router->get('/pacientes/arquivo', 'PatientsController@arquivo');
$router->get('/pacientes/arquivo/prontuario', 'PatientsController@prontuario');
$router->get('/pacientes/arquivo/informacoes', 'PatientsController@informacoes');
$router->get('/pacientes/arquivo/informacoes/editar', 'PatientsController@informacoesEditar');

// Consultas
$router->get('/consultas', 'QueryController@index');

// Agenda
$router->get('/agenda', 'ScheduleController@index');
$router->get('/agenda/horarios', 'ScheduleController@horarios');

// Financeiro
$router->get('/financeiro/fluxo-de-caixa', 'FinancesController@movimentacao');
$router->get('/financeiro/contas-a-pagar', 'FinancesController@pagar');
$router->get('/financeiro/contas-a-receber', 'FinancesController@receber');

// Configurações
$router->get('/configuracao/usuarios', 'SettingsController@user');
$router->get('/configuracao/usuarios/novo', 'SettingsController@newUser');
$router->post('/configuracao/usuarios/novo', 'SettingsController@newUserAction');
$router->get('/configuracao/modalidades', 'SettingsController@modalidades');
$router->get('/configuracao/modalidades/nova', 'SettingsController@newModalidades');
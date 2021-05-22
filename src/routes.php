<?php
use core\Router;

$router = new Router();

$router->get('/login', 'LoginController@login');
$router->post('/login', 'LoginController@loginAction');
$router->get('/sair', 'LoginController@logout');

$router->get('/', 'HomeController@index');

// Pacientes
$router->get('/pacientes', 'PatientsController@index');
$router->get('/pacientes/cadastro', 'PatientsController@cadastro');
$router->post('/pacientes/cadastro', 'PatientsController@cadastroAction');
$router->get('/pacientes/agendamento/{id}', 'PatientsController@agendamento');
$router->post('/pacientes/agendamento/{id}', 'PatientsController@agendamentoAction');
$router->get('/pacientes/arquivo', 'PatientsController@arquivo');
$router->get('/pacientes/arquivo/prontuario', 'PatientsController@prontuario');
$router->get('/pacientes/arquivo/informacoes', 'PatientsController@informacoes');
$router->get('/pacientes/arquivo/informacoes/editar', 'PatientsController@informacoesEditar');

// Consultas
$router->get('/consultas', 'QueryController@index');
$router->get('/consultas/cancelar/{id}', 'QueryController@cancelar');
$router->get('/procedimentos/consulta/{idagendamento}/{idpaciente}', 'QueryController@consulta');
$router->post('/procedimentos/consulta/{idagendamento}/{idpaciente}', 'QueryController@consultaAction');
$router->post('/procedimentos/consulta/{idagendamento}', 'QueryController@cancelarAgendamento');
$router->get('/procedimentos/evolucao/{id}', 'QueryController@evolucao');

// Agenda
$router->get('/agenda', 'ScheduleController@index');
$router->get('/agenda/horarios', 'ScheduleController@horarios');
$router->get('/agendamentos', 'ScheduleController@agendamento');

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

// Consultas de API
$router->get('/api/agendamentos/{idprofissional}/{data}', 'ApiController@getTime');
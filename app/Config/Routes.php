<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/listaPersonas', 'ABM::listarPersonas');
$routes->post('/autosPersona', 'ABM::autosPersona');
$routes->get('verAutos', 'ABM::listarAutosConDuenio');


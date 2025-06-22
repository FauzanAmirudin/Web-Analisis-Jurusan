<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Landing Page
$routes->get('/', 'Home::index');

// Authentication Routes
$routes->group('auth', function($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::processLogin');
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::processRegister');
    $routes->get('logout', 'AuthController::logout');
    $routes->get('forgot-password', 'AuthController::forgotPassword');
    $routes->post('forgot-password', 'AuthController::processForgotPassword');
    $routes->get('reset-password/(:any)', 'AuthController::resetPassword/$1');
    $routes->post('reset-password', 'AuthController::processResetPassword');
});

// Dashboard Routes (Protected)
$routes->group('dashboard', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'DashboardController::index');
    $routes->get('profile', 'DashboardController::profile');
    $routes->post('profile', 'DashboardController::updateProfile');
    $routes->get('history', 'DashboardController::history');
    $routes->get('history/(:num)', 'DashboardController::viewResult/$1');
    // $routes->get('history/pdf/(:num)', 'DashboardController::downloadPDF/$1');
    $routes->get('history/pdf/(:num)', 'DashboardController::downloadPDF/$1');
    $routes->get('history/delete/(:num)', 'DashboardController::deleteTestHistory/$1');
});

// Assessment Routes (Protected)
$routes->group('test', ['filter' => 'auth'], function($routes) {
    $routes->get('start', 'AssessmentController::start');
    $routes->get('(:any)', 'AssessmentController::test/$1');
    $routes->post('save', 'AssessmentController::saveAnswers');
    $routes->post('previous', 'AssessmentController::previousStep');
    $routes->get('result/(:any)', 'AssessmentController::result/$1');
    $routes->get('major/(:num)', 'AssessmentController::majorDetail/$1');
    $routes->get('pdf/(:any)', 'AssessmentController::downloadPDF/$1');
});

// Major Detail Route
$routes->get('major/(:num)', 'AssessmentController::majorDetail/$1');

// API Routes
$routes->group('api', function($routes) {
    $routes->post('save-progress', 'ApiController::saveProgress');
    $routes->get('get-progress/(:any)', 'ApiController::getProgress/$1');
    $routes->get('test-result/(:num)', 'ApiController::getTestResult/$1');
});
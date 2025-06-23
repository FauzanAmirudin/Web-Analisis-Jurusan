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

// Payment Routes (Protected)
$routes->group('payment', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'PaymentController::index');
    $routes->post('process', 'PaymentController::processPayment');
    $routes->get('simulate', 'PaymentController::simulatePayment');
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

// Admin Routes (Protected with Admin Filter)
$routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('/', 'AdminController::index');
    
    // User Management Routes
    $routes->get('users', 'AdminController::users');
    $routes->get('users/create', 'AdminController::createUser');
    $routes->post('users/store', 'AdminController::storeUser');
    $routes->get('users/edit/(:num)', 'AdminController::editUser/$1');
    $routes->post('users/update/(:num)', 'AdminController::updateUser/$1');
    $routes->get('users/activities/(:num)', 'AdminController::userActivities/$1');
    $routes->post('users/delete/(:num)', 'AdminController::deleteUser/$1');
    $routes->post('users/adjust-credits/(:num)', 'AdminController::adjustCredits/$1');
    $routes->get('users/toggle-status/(:num)', 'AdminController::toggleStatus/$1');
    $routes->post('users/reset-password/(:num)', 'AdminController::resetPassword/$1');
    
    // Question Management Routes
    $routes->get('questions', 'AdminController::questions');
    $routes->get('questions/create', 'AdminController::createQuestion');
    $routes->post('questions/store', 'AdminController::storeQuestion');
    $routes->get('questions/edit/(:num)', 'AdminController::editQuestion/$1');
    $routes->post('questions/update/(:num)', 'AdminController::updateQuestion/$1');
    $routes->post('questions/delete/(:num)', 'AdminController::deleteQuestion/$1');
    $routes->get('questions/preview', 'AdminController::previewQuestions');
    $routes->get('questions/toggle-status/(:num)', 'AdminController::toggleQuestionStatus/$1');
    
    $routes->get('get-csrf-token', 'AdminController::getCsrfToken');
});

// API Routes
$routes->group('api', function($routes) {
    $routes->post('save-progress', 'ApiController::saveProgress');
    $routes->get('get-progress/(:any)', 'ApiController::getProgress/$1');
    $routes->get('test-result/(:num)', 'ApiController::getTestResult/$1');
});
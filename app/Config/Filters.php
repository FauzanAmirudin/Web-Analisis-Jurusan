<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    public array $aliases = [
        'csrf'          => \CodeIgniter\Filters\CSRF::class,
        'toolbar'       => \CodeIgniter\Filters\DebugToolbar::class,
        'honeypot'      => \CodeIgniter\Filters\Honeypot::class,
        'invalidchars'  => \CodeIgniter\Filters\InvalidChars::class,
        'secureheaders' => \CodeIgniter\Filters\SecureHeaders::class,
        'auth'          => \App\Filters\AuthFilter::class,
        'admin'         => \App\Filters\AdminFilter::class,
    ];

    public array $globals = [
        'before' => [
            'honeypot',
            'csrf' => ['except' => ['api/*']],
            'invalidchars',
        ],
        'after' => [
            'toolbar',
            'honeypot',
            'secureheaders',
        ],
    ];

    public array $methods = [];

    public array $filters = [];
}
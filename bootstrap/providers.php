<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    // No es necesario si usas Laravel 9+ y el package está instalado vía composer
    Laravel\Sanctum\SanctumServiceProvider::class,

];

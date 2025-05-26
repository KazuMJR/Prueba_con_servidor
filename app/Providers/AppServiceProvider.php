<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use App\Models\Alumno;
use App\Models\Escuela;
use App\Models\Catedratico;
use App\Models\Curso;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // En producción forzar http
        if (config('app.env') === 'production') {
            URL::forceScheme('http');
        }

        // Para evitar errores de longitud en migraciones
        Schema::defaultStringLength(191);

        // Compartir estadísticas globalmente con todas las vistas
        View::composer('*', function ($view) {
            $view->with([
                'totalAlumnos' => Alumno::count(),
                'totalEscuelas' => Escuela::count(),
                'totalCatedraticos' => Catedratico::count(),
                'totalCursos' => Curso::count(),
            ]);
        });
    }
}

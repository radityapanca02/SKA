<?php

namespace App\Providers;

use App\Models\Marquee;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

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
        if (app()->environment('production') || str_contains(config('app.url'), 'https')) {
            URL::forceScheme('https');
            $this->app['request']->server->set('HTTPS', true);
        }

        SymfonyRequest::setTrustedProxies(
            ['*'],
            SymfonyRequest::HEADER_X_FORWARDED_FOR |
            SymfonyRequest::HEADER_X_FORWARDED_HOST |
            SymfonyRequest::HEADER_X_FORWARDED_PROTO |
            SymfonyRequest::HEADER_X_FORWARDED_PORT
        );

        View::composer('*', function ($view) {
            $view->with('assetBase', rtrim(config('app.url'), '/'));
        });

        View::composer('*', function ($view) {
            try {
                $marquees = Marquee::query()
                    ->orderBy('urutan')
                    ->orderBy('nama')
                    ->get();
                $view->with('marquees', $marquees);
            } catch (\Exception $e) {
                $view->with('marquees', collect());
            }
        });
    }
}

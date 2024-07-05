<?php

namespace App\Providers;

use App\Interfaces\AuthInterface;
use App\Interfaces\AuthorInterface;
use App\Interfaces\BookInterface;
use App\Repositories\AuthorRepository;
use App\Repositories\AuthRepository;
use App\Repositories\BookRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class, AuthRepository::class);
        $this->app->bind(AuthorInterface::class, AuthorRepository::class);
        $this->app->bind(BookInterface::class, BookRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

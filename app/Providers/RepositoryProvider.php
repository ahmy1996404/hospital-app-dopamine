<?php

namespace App\Providers;

use App\Interfaces\UploadFile\UploadFileRepositoryInterface;
use App\Repositories\UploadFile\UploadFileRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UploadFileRepositoryInterface::class, UploadFileRepository::class);
    }
}

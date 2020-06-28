<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// load interface
use App\Repositories\Master\Interfaces\GenderRepositoryInterface;
use App\Repositories\Master\Interfaces\BankRepositoryInterface;
use App\Repositories\Master\Interfaces\BloodTypeRepositoryInterface;
use App\Repositories\Master\Interfaces\DepartmentRepositoryInterface;
use App\Repositories\Master\Interfaces\DesignationRepositoryInterface;
use App\Repositories\Master\Interfaces\JobStatusRepositoryInterface;
use App\Repositories\Master\Interfaces\MaritalRepositoryInterface;
use App\Repositories\Master\Interfaces\ReligionRepositoryInterface;
use App\Repositories\Master\Interfaces\TaxesRepositoryInterface;

// load repository
use App\Repositories\Master\GenderRepository;
use App\Repositories\Master\BankRepository;
use App\Repositories\Master\BloodTypeRepository;
use App\Repositories\Master\DepartmentRepository;
use App\Repositories\Master\DesignationRepository;
use App\Repositories\Master\JobStatusRepository;
use App\Repositories\Master\MaritalRepository;
use App\Repositories\Master\ReligionRepository;
use App\Repositories\Master\TaxesRepository;

class MasterRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            GenderRepositoryInterface::class,
            GenderRepository::class
        );

        $this->app->bind(
            BankRepositoryInterface::class,
            BankRepository::class
        );

        $this->app->bind(
            BloodTypeRepositoryInterface::class,
            BloodTypeRepository::class
        );

        $this->app->bind(
            DepartmentRepositoryInterface::class,
            DepartmentRepository::class
        );


        $this->app->bind(
            DesignationRepositoryInterface::class,
            DesignationRepository::class
        );

        $this->app->bind(
            JobStatusRepositoryInterface::class,
            JobStatusRepository::class
        );

        $this->app->bind(
            MaritalRepositoryInterface::class,
            MaritalRepository::class
        );

        $this->app->bind(
            ReligionRepositoryInterface::class,
            ReligionRepository::class
        );

        $this->app->bind(
            TaxesRepositoryInterface::class,
            TaxesRepository::class
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Models\Application;
use App\Models\Company;
use App\Models\Resume;
use App\Models\Vacancy;
use App\Policies\ApplicationPolicy;
use App\Policies\CompanyPolicy;
use App\Policies\ResumePolicy;
use App\Policies\VacancyPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::policy(Vacancy::class, VacancyPolicy::class);
        Gate::policy(Company::class, CompanyPolicy::class);
        Gate::policy(Application::class, ApplicationPolicy::class);
        Gate::policy(Resume::class, ResumePolicy::class);

        Paginator::defaultView('vendor.pagination.bootstrap-5');
        Paginator::defaultSimpleView('vendor.pagination.bootstrap-5');
    }
}

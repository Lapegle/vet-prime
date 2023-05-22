<?php

namespace App\Providers;

use App\Nova\Dashboards\Main;
use App\Nova\Resources\Answer;
use App\Nova\Resources\Breed;
use App\Nova\Resources\Client;
use App\Nova\Resources\Medicament;
use App\Nova\Resources\Pet;
use App\Nova\Resources\Procedure;
use App\Nova\Resources\Question;
use App\Nova\Resources\SentSurvey;
use App\Nova\Resources\Species;
use App\Nova\Resources\Survey;
use App\Nova\Resources\User;
use App\Nova\Resources\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuGroup;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::dashboard(Main::class)->icon('home'),

                MenuSection::make(__('Journal'), [
                    MenuItem::resource(Client::class),
                    MenuItem::resource(Pet::class),
                    MenuItem::resource(Visit::class)
                ])
                    ->collapsable()
                    ->icon('archive'),

                MenuSection::make(__('Taxonomies'), [
                    MenuGroup::make(__('Services'), [
                        MenuItem::resource(Medicament::class),
                        MenuItem::resource(Procedure::class),
                    ]),
                    MenuGroup::make(__('Animal Classifiers'), [
                        MenuItem::resource(Species::class),
                        MenuItem::resource(Breed::class),
                    ])
                ])
                    ->collapsable()
                    ->icon('database'),

                MenuSection::make(__('Surveys'), [
                    MenuItem::resource(Survey::class),
                    MenuItem::resource(Question::class),
                    MenuItem::resource(SentSurvey::class),
                    MenuItem::resource(Answer::class)
                ])
                    ->collapsable()
                    ->icon('document-text'),

                MenuSection::resource(User::class)
                    ->icon('identification')
            ];
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new \Badinansoft\LanguageSwitch\LanguageSwitch(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

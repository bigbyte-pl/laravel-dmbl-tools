<?php

/**
 * Laravel DBML Tools
 *
 * @author    Marek Wysocki <maras3000@gmail.com>
 * @copyright 2020 Marek Wysocki / BigByte.pl (https://www.bigbyte.pl)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/bigbyte-pl/laravel-dbml-tools
 */

namespace BigbytePl\LaravelDbmlTools;

use BigbytePl\LaravelDbmlTools\Console\MigrationCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;

class DbmlToolsServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
//        if ($this->app->has('view')) {
//            $viewPath = __DIR__ . '/../resources/views';
//            $this->loadViewsFrom($viewPath, 'dbml-tools');
//        }

        $configPath = __DIR__ . '/../config/dbml-tools.php';
        if (function_exists('config_path')) {
            $publishPath = config_path('dbml-tools.php');
        } else {
            $publishPath = base_path('config/dbml-tools.php');
        }
        $this->publishes([$configPath => $publishPath], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/dbml-tools.php';
        $this->mergeConfigFrom($configPath, 'dbml-tools');

        $this->app->singleton(
            'command.dbml-tools.migration',
            function ($app) {
                return new MigrationCommand($app['files']);
            }
        );

        $this->app->singleton(
            'command.dbml-tools.migration2',
            function ($app) {
                return new MigrationCommand($app['files']);
            }
        );

        $this->commands(
            'command.dbml-tools.migration',
            'command.dbml-tools.migration2'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('command.dbml-tools.migration', 'command.dbml-tools.migration2');
    }
}

<?php

namespace FlyingLuscas\Laker;

use Bitbucket\API\Repositories\Issues;
use Bitbucket\API\Authentication\Basic;
use Illuminate\Support\ServiceProvider;

class LakerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/config.php', 'laker');

        $this->publishes([
            __DIR__.'/config.php' => config_path('laker.php'),
        ]);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->setUpBitbucketIssueTracker();
    }

    /**
     * Set up the Bitbucket issue tracker service.
     *
     * @return void
     */
    private function setUpBitbucketIssueTracker()
    {
        $this->app->singleton('BitbucketIssuesTracker', function () {
            $issues = new Issues;

            $username = config('laker.auth.username');
            $password = config('laker.auth.password');

            $basicAuth = new Basic($username, $password);

            $issues->setCredentials($basicAuth);

            return $issues;
        });
    }
}

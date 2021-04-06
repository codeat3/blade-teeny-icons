<?php

declare(strict_types=1);

namespace Codeat3\BladeTeenyIcons;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

final class BladeTeenyIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('teeny-icons', [
                'path' => __DIR__.'/../resources/svg',
                'prefix' => 'ti',
            ]);
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-ti'),
            ], 'blade-ti');
        }
    }
}

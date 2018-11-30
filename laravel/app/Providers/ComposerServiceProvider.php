<?php
/**
 * Created by PhpStorm.
 * User: vu.dovan
 * Date: 11/30/2018
 * Time: 9:48 AM
 */

namespace App\Providers;

use Arcanedev\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*', 'App\Http\ViewComposers\LayoutComposer');
    }
}
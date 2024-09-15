<?php

namespace App\Providers;

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
        //1
        // view()->share('recentPosts', Post::recent());
        // global $recentPosts for all views

        /* Blade::directive('ifGuest', function () {
            return "<?php if (auth()->guest()): ?>";
        });  */
        // add @ifGuest directive

        //Blade::component('partials.modal', 'modal');
        /*   <!-- в шаблоне -->
        @modal
        Modal content here
        @endmodal  */
    }
}

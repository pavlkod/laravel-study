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

        //2
        /* view()->composer(
            ['partials. header', 'partials. footer'],
            function ($view) {
                $view->with('recentPosts', Post::recent());
            }
        ); */

        // Привязка
        /* Blade::if('ifPubic', function () {
            return (app('context'))->isPublic();
        });  */
        // add @ifPubic directive

        /* Blade::directive('ifGuest', function () {
            return "<?php if (auth()->guest()): ?>";
        });  */
        // add @ifGuest directive

        // Связывание
        /* Blade: :directive('newlinesToBr', function ($expression) {
            return "<?php echo nl2br({$expression}); ?>";
        });
        // В использовании
        <p>@newlinesToBr($message->body)</p>  */

        //Blade::component('partials.modal', 'modal');
        /*   <!-- в шаблоне -->
        @modal
        Modal content here
        @endmodal  */

        //3
        /* view()->composer(
            'partials.sidebar',
            \App\Http\Viewcomposers\RecentPostsComposer::class
        ); */

        //creating event
        /* $thirdPartyService = new SomeThirdPartyService;
        Contact::creating(function ($contact) use ($thirdPartyService) {
            try {
                $thirdPartyService->addContact($contact);
            } catch (Exception $е) {
                Log::error('Failed adding contact to ThirdPartyService; canceled. ');
                return false; //Отменяет create() Eloquent
            }
        }); */
    }
}

<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
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
        view()->composer(
            ['partials. header', 'partials. footer'],
            function ($view) {
                $view->with('recentPosts', Post::recent());
            }
        );

         //3
        view()->composer(
            'partials.sidebar',
            \App\Http\Viewcomposers\RecentPostsComposer::class
        );

        // Привязка
        Blade::directive('ifPubic', function () {
            return "<?php (app('context'))->isPublic()?>";
        });
        // or
        Blade::if('ifPubic', function () {
            return (app('context'))->isPublic();
        });
        // add @ifPubic directive

        Blade::directive('ifGuest', function () {
            return "<?php if (auth()->guest()): ?>";
        });
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



        //creating event
        /* $thirdPartyService = new SomeThirdPartyService;
        Post::creating(function ($post) use ($thirdPartyService) {
            try {
                $thirdPartyService->addPost($post);
            } catch (Exception $е) {
                Log::error('Failed adding post to ThirdPartyService; canceled. ');
                return false; //Отменяет create() Eloquent
            }
        }); */

        // custom response
        Response::macro('myJson', function ($content) {
            return response(json_encode($content))
                ->withHeaders(['Content-Type' => 'application/json']);
        });
        // response()->myJson(['name' => 'Sangeetha']);
    }
}

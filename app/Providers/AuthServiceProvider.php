<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Gate для администраторов
        Gate::define('access-admin', function ($user) {
            return $user->role === 'admin';
        });

        // Gate для модераторов
        Gate::define('moderate-content', function ($user) {
            return in_array($user->role, ['admin', 'moderator']);
        });

        // Gate для обновления поста
        Gate::define('update-post', function ($user, $post) {
            return $user->id === $post->user_id || $user->role === 'admin';
        });

        // Gate для удаления комментария
        Gate::define('delete-comment', function ($user, $comment) {
            return $user->id === $comment->user_id
                || $user->role === 'admin'
                || $user->role === 'moderator';
        });

        // Gate с несколькими параметрами
        Gate::define('edit-settings', function ($user, $project, $setting) {
            return $user->id === $project->owner_id
                && in_array($setting, $user->allowed_settings);
        });


        // global events
        // Before хук - выполняется перед всеми проверками
        Gate::before(function ($user, $ability) {
            // Супер-админ может всё
            if ($user->role === 'super-admin') {
                return true;
            }
        });

        // After хук - выполняется после всех проверок
        Gate::after(function ($user, $ability, $result, $arguments) {
            // Логируем все проверки прав
            Log::info('Проверка прав', [
                'user' => $user->id,
                'ability' => $ability,
                'result' => $result,
                'arguments' => $arguments,
            ]);
        });
    }
}

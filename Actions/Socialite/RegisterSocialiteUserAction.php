<?php
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 * ---
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Events\SocialiteUserConnected;
use Spatie\QueueableAction\QueueableAction;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;

class RegisterSocialiteUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $provider, SocialiteUserContract $oauthUser, Authenticatable $user)
    {
        // Create a new SocialiteUser instance
        $socialiteUser = app(CreateSocialiteUserAction::class)
            ->execute(
                provider: $provider,
                oauthUser: $oauthUser,
                user: $user,
            );

        // Assign default roles to user, if needed
        app(
            SetDefaultRolesBySocialiteUserAction::class,
            [
                'provider' => $provider,
                'userModel' => $user,
            ]
        )->execute(userModel: $user, oauthUser: $oauthUser);

        // Dispatch the socialite user connected event
        SocialiteUserConnected::dispatch($socialiteUser);

        // Login the user
        return app(LoginUserAction::class)->execute($socialiteUser);
    }
}

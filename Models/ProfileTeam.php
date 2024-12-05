<?php

declare(strict_types=1);

namespace Modules\User\Models;

/**
 * @property \Modules\Blog\Models\Profile|null $creator
 * @property \Modules\Blog\Models\Profile|null $updater
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProfileTeam query()
 *
 * @mixin \Eloquent
 */
class ProfileTeam extends TeamUser
{
}

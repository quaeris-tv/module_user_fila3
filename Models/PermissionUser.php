<?php

declare(strict_types=1);

namespace Modules\User\Models;

/**
 * @property \Modules\Blog\Models\Profile|null $creator
 * @property \Modules\Blog\Models\Profile|null $updater
 *
 * @method static \Modules\User\Database\Factories\PermissionUserFactory       factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionUser query()
 *
 * @mixin \Eloquent
 */
class PermissionUser extends ModelHasPermission
{
}

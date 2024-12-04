<?php

declare(strict_types=1);

namespace Modules\User\Models;

/**
 * @property \Modules\Blog\Models\Profile|null $creator
 * @property Device|null                       $device
 * @property \Modules\Blog\Models\Profile|null $profile
 * @property \Modules\Blog\Models\Profile|null $updater
 * @property User|null                         $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceProfile query()
 *
 * @mixin \Eloquent
 */
class DeviceProfile extends DeviceUser
{
}

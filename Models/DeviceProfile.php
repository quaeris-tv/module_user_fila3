<?php

declare(strict_types=1);

namespace Modules\User\Models;

/**
 * 
 *
 * @property-read \Modules\Blog\Models\Profile|null $creator
 * @property-read \Modules\User\Models\Device|null $device
 * @property-read \Modules\Blog\Models\Profile|null $profile
 * @property-read \Modules\Blog\Models\Profile|null $updater
 * @property-read \Modules\User\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceProfile query()
 * @mixin \Eloquent
 */
class DeviceProfile extends DeviceUser
{

}
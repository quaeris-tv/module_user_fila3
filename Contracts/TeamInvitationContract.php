<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * Modules\User\Contracts\TeamInvitationContract.
 *
 * @property int          $id
 * @property int          $team_id
 * @property string       $email
 * @property string|null  $role
 * @property Carbon|null  $created_at
 * @property Carbon|null  $updated_at
 * @property TeamContract $team
 *
 * @method static Builder|TeamInvitation newModelQuery()
 * @method static Builder|TeamInvitation newQuery()
 * @method static Builder|TeamInvitation query()
 * @method static Builder|TeamInvitation whereCreatedAt($value)
 * @method static Builder|TeamInvitation whereEmail($value)
 * @method static Builder|TeamInvitation whereId($value)
 * @method static Builder|TeamInvitation whereRole($value)
 * @method static Builder|TeamInvitation whereTeamId($value)
 * @method static Builder|TeamInvitation whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
interface TeamInvitationContract
{
    public function delete(): void;
}
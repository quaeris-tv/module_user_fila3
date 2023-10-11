<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Illuminate\Console\Command;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\text;

class AssignTeamCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'user:assign-team';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign a team to user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = text('email ?');
        $user = User::firstWhere(['email' => $email]);
        $xot = XotData::make();
        $teamClass = $xot->getTeamClass();

        $opts = $teamClass::all()->pluck('name', 'id');

        $rows = multiselect(
            label: 'What teams',
            options: $opts,
            required: true,
            scroll: 10,
            // validate: function (array $values) {
            //  return ! \in_array(\count($values), [1, 2], true)
            //    ? 'A maximum of two'
            //  : null;
            // }
        );

        $user->teams()->sync($rows);
        /*
        foreach ($rows as $row) {
            $role = Role::firstOrCreate(['name' => $row]);
            $user->assignRole($role);
        }
        */
        $this->info(implode(', ', $rows) . ' assigned to ' . $email);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     *               protected function getArguments()
     *               {
     *               return [
     *               ['example', InputArgument::REQUIRED, 'An example argument.'],
     *               ];
     *               }
     */
    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
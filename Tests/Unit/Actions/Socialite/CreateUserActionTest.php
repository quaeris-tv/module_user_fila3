<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\CreateUserAction;
use Tests\TestCase;

/**
 * Class CreateUserActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\CreateUserAction
 */
final class CreateUserActionTest extends TestCase
{
    private CreateUserAction $createUserAction;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->createUserAction = new CreateUserAction();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createUserAction);
    }

    public function testExecute(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
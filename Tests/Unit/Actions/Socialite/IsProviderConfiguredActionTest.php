<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Modules\User\Actions\Socialite\IsProviderConfiguredAction;
use Tests\TestCase;

/**
 * Class IsProviderConfiguredActionTest.
 *
 * @covers \Modules\User\Actions\Socialite\IsProviderConfiguredAction
 */
final class IsProviderConfiguredActionTest extends TestCase
{
    private IsProviderConfiguredAction $isProviderConfiguredAction;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->isProviderConfiguredAction = new IsProviderConfiguredAction();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->isProviderConfiguredAction);
    }

    public function testExecute(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
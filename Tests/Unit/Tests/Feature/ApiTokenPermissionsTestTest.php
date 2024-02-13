<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Tests\Feature;

use Modules\User\Tests\Feature\ApiTokenPermissionsTest;
use Tests\TestCase;

/**
 * Class ApiTokenPermissionsTestTest.
 *
 * @covers \Modules\User\Tests\Feature\ApiTokenPermissionsTest
 */
final class ApiTokenPermissionsTestTest extends TestCase
{
    private ApiTokenPermissionsTest $apiTokenPermissionsTest;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->apiTokenPermissionsTest = new ApiTokenPermissionsTest();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->apiTokenPermissionsTest);
    }

    public function testApiTokenPermissionsCanBeUpdated(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
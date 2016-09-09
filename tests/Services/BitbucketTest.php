<?php

namespace FlyingLuscas\Laker\Tests\Services;

use Mockery;
use Exception;
use Buzz\Message\Response;
use FlyingLuscas\Laker\Issue;
use Bitbucket\API\Repositories\Issues;
use FlyingLuscas\Laker\Tests\TestCase;
use FlyingLuscas\Laker\Services\Bitbucket;

class BitbucketTest extends TestCase
{
    public function testCreateIssue()
    {
        $issue = Mockery::mock(Issue::class)
                        ->shouldReceive('getTitle', 'getBody')
                        ->andReturn('Some title', 'Some body')->mock();

        $track = Mockery::mock(Issues::class)
                        ->shouldReceive('create')
                        ->with('account', 'slug', [])
                        ->andReturn(Response::class)
                        ->mock();

        $bibucket = new Bitbucket;

        $this->assertInstanceOf(Response::class, $bibucket->createIssue($issue));
    }
}

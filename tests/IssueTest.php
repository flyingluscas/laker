<?php

namespace FlyingLuscas\Laker\Tests;

use Mockery;
use Exception;
use Buzz\Message\Response;
use FlyingLuscas\Laker\Issue;
use FlyingLuscas\Laker\Services\Bitbucket;

class IssueTest extends TestCase
{
    public function testIssueTitle()
    {
        $issue = new Issue(new Exception);
        $expectedIssueTitle = sprintf('%s in %s line %d', 'Exception', basename(__FILE__), (__LINE__ - 1));

        $this->assertEquals($expectedIssueTitle, $issue->getTitle(), "The title of the issue is not equals to '{$expectedIssueTitle}'.");
    }

    public function testIssueBody()
    {
        $message = 'Some dummy message';
        $body = sprintf("%s in %s line %d\n\n%s", Exception::class, __FILE__, (__LINE__ + 1), $message);
        $issue = new Issue(new Exception($message));

        $this->assertEquals($body, $issue->getBody(), "The body of the issue is not equals to the exception's message.");
    }

    /**
     * @dataProvider dataServicesProvider
     */
    public function testCreateIssue($service)
    {
        $issue = new Issue(new Exception('Some dummy message'));

        $service = Mockery::mock($service);
        $service->shouldReceive('createIssue')
                ->with($issue)
                ->andReturn(Response::class)
                ->mock();

        $this->assertNull($issue->createOn($service));
    }

    public function dataServicesProvider()
    {
        return [
            [Bitbucket::class],
        ];
    }
}

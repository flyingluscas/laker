<?php

namespace FlyingLuscas\Laker\Tests;

use Exception;
use FlyingLuscas\Laker\Issue;

class IssueTest extends TestCase
{
    protected $body = 'Donkeys can not fly';

    public function testIssueTitle()
    {
        $issue = new Issue(new Exception($this->body));
        $expectedIssueTitle = sprintf('%s in %s line %d', 'Exception', basename(__FILE__), (__LINE__ - 1));

        $this->assertEquals($expectedIssueTitle, $issue->getTitle(), "The title of the issue is not equals to '{$expectedIssueTitle}'.");
    }

    public function testIssueBody()
    {
        $issue = new Issue(new Exception($this->body));

        $this->assertEquals($this->body, $issue->getBody(), "The body of the issue is not equals to the exception's message.");
    }
}

<?php

namespace FlyingLuscas\Laker\Contracts;

use FlyingLuscas\Laker\Issue;

interface ServiceContract
{
    /**
     * Create a new issue.
     *
     * @param \FlyingLuscas\Laker\Issue $issue
     *
     * @return bool
     */
    public function createIssue(Issue $issue);
}

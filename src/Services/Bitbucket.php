<?php

namespace FlyingLuscas\Laker\Services;

use FlyingLuscas\Laker\Issue;
use FlyingLuscas\Laker\Contracts\ServiceContract;

class Bitbucket implements ServiceContract
{
    /**
     * Create a new issue on bitbucket.
     *
     * @param \FlyingLuscas\Laker\Issue $issue
     *
     * @return bool
     */
    public function createIssue(Issue $issue)
    {
        //
    }
}

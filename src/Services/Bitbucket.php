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
     * @return \Buzz\Message\Response
     */
    public function createIssue(Issue $issue)
    {
        $account = $this->getAccountSlug();
        $respository = $this->getRepositorySlug();

        return $this->getIssueTrackerInstance()->create($account, $respository, [
            'title' => $issue->getTitle(),
            'content' => $issue->getBody(),
            'kind' => 'bug',
            'priority' => 'blocker',
        ]);
    }

    /**
     * Get Bitbucket respository slug.
     *
     * @return string
     */
    private function getRepositorySlug()
    {
        return config('laker.repository_slug');
    }

    /**
     * Get Bibucket account slug.
     *
     * @return string
     */
    private function getAccountSlug()
    {
        return config('laker.account_slug');
    }

    /**
     * Get issue tracker.
     *
     * @return \Bitbucket\API\Repositories\Issues
     */
    private function getIssueTrackerInstance()
    {
        return app('BitbucketIssuesTracker');
    }
}

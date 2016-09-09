<?php

namespace FlyingLuscas\Laker;

use Exception;
use ReflectionClass;
use FlyingLuscas\Laker\Contracts\ServiceContract;

class Issue
{
    /**
     * The title of the issue.
     *
     * @var string
     */
    protected $title;

    /**
     * The body of the issue.
     *
     * @var string
     */
    protected $body;

    /**
     * Create a new class instance.
     *
     * @param Exception $e
     */
    public function __construct(Exception $e)
    {
        $this->setTitle($this->getIssueTitleFromException($e));
        $this->setBody($e->getMessage());
    }

    /**
     * Create issue on the given service.
     *
     * @param  \FlyingLuscas\Laker\Contracts\ServiceContract $service
     *
     * @return void
     */
    public function createOn(ServiceContract $service)
    {
        $service->createIssue($this);
    }

    /**
     * Get the title of the issue from an exception.
     *
     * @param Exception $e
     *
     * @return string
     */
    private function getIssueTitleFromException(Exception $e)
    {
        $reflection = new ReflectionClass($e);

        return sprintf('%s in %s line %d', $reflection->getShortName(), basename($e->getFile()), $e->getLine());
    }

    /**
     * Set the title of the issue.
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set the body of the issue.
     *
     * @param string $body
     *
     * @return self
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get the issue title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the body of the issue.
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
}

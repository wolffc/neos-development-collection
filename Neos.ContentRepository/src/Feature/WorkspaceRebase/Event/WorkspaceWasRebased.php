<?php
declare(strict_types=1);
namespace Neos\ContentRepository\Feature\WorkspaceRebase\Event;

/*
 * This file is part of the Neos.ContentRepository package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\ContentRepository\SharedModel\Workspace\ContentStreamIdentifier;
use Neos\ContentRepository\SharedModel\User\UserIdentifier;
use Neos\ContentRepository\SharedModel\Workspace\WorkspaceName;
use Neos\ContentRepository\EventStore\EventInterface;
use Neos\Flow\Annotations as Flow;

/**
 * @Flow\Proxy(false)
 */
class WorkspaceWasRebased implements EventInterface
{
    private WorkspaceName $workspaceName;

    /**
     * The new content stream identifier (after the rebase was successful)
     */
    private ContentStreamIdentifier $newContentStreamIdentifier;

    /**
     * The old content stream identifier (which is not active anymore now)
     */
    private ContentStreamIdentifier $previousContentStreamIdentifier;

    private UserIdentifier $initiatingUserIdentifier;

    public function __construct(
        WorkspaceName $workspaceName,
        ContentStreamIdentifier $newContentStreamIdentifier,
        ContentStreamIdentifier $previousContentStreamIdentifier,
        UserIdentifier $initiatingUserIdentifier
    ) {
        $this->workspaceName = $workspaceName;
        $this->newContentStreamIdentifier = $newContentStreamIdentifier;
        $this->previousContentStreamIdentifier = $previousContentStreamIdentifier;
        $this->initiatingUserIdentifier = $initiatingUserIdentifier;
    }

    public function getWorkspaceName(): WorkspaceName
    {
        return $this->workspaceName;
    }

    public function getNewContentStreamIdentifier(): ContentStreamIdentifier
    {
        return $this->newContentStreamIdentifier;
    }

    public function getPreviousContentStreamIdentifier(): ContentStreamIdentifier
    {
        return $this->previousContentStreamIdentifier;
    }

    public function getInitiatingUserIdentifier(): UserIdentifier
    {
        return $this->initiatingUserIdentifier;
    }
}

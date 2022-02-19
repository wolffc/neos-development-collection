<?php
declare(strict_types=1);
namespace Neos\EventSourcedContentRepository\Domain\Context\ContentStream\Command;

/*
 * This file is part of the Neos.ContentRepository package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\ContentRepository\Domain\ContentStream\ContentStreamIdentifier;
use Neos\EventSourcedContentRepository\Domain\ValueObject\UserIdentifier;

/**
 * Command to remove an existing content stream
 */
final class RemoveContentStream
{
    private ContentStreamIdentifier $contentStreamIdentifier;

    private UserIdentifier $initiatingUserIdentifier;

    public function __construct(
        ContentStreamIdentifier $contentStreamIdentifier,
        UserIdentifier $initiatingUserIdentifier
    ) {
        $this->contentStreamIdentifier = $contentStreamIdentifier;
        $this->initiatingUserIdentifier = $initiatingUserIdentifier;
    }

    public function getContentStreamIdentifier(): ContentStreamIdentifier
    {
        return $this->contentStreamIdentifier;
    }

    public function getInitiatingUserIdentifier(): UserIdentifier
    {
        return $this->initiatingUserIdentifier;
    }
}

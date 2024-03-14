<?php

declare(strict_types=1);

namespace Neos\ContentRepository\Core\Feature\ContentStreamClosing\Event;

/*
 * This file is part of the Neos.ContentRepository package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\ContentRepository\Core\EventStore\EventInterface;
use Neos\ContentRepository\Core\SharedModel\Workspace\ContentStreamId;

/**
 * @api events are the persistence-API of the content repository
 */
final readonly class ContentStreamWasClosed implements EventInterface
{
    public function __construct(
        public ContentStreamId $contentStreamId,
    ) {
    }

    public static function fromArray(array $values): self
    {
        return new self(
            ContentStreamId::fromString($values['contentStreamId']),
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'contentStreamId' => $this->contentStreamId,
        ];
    }
}

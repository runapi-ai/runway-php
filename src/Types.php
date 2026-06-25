<?php

declare(strict_types=1);

namespace RunApi\Runway;

/**
 * Constants for model slugs supported by the Runway PHP SDK.
 */
final class Types
{
    /** @var list<string> */
    public const TEXT_TO_VIDEO_MODELS = ['runway'];

    /** @var list<string> */
    public const EXTEND_VIDEO_MODELS = ['runway'];

    private function __construct()
    {
    }
}

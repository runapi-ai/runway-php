<?php

declare(strict_types=1);

namespace RunApi\Runway;

use RunApi\Core\BaseClient;
use RunApi\Core\ClientOptions;
use RunApi\Runway\Resources\ExtendVideo;
use RunApi\Runway\Resources\TextToVideo;

/**
 * Provides Runway video generation and extension operations.
 *
 * Exposes typed model resources plus the universal files and account resources.
 */
final class RunwayClient extends BaseClient
{
    /**
     * Text to video operations.
     */
    public readonly TextToVideo $textToVideo;
    /**
     * Extend video operations.
     */
    public readonly ExtendVideo $extendVideo;

    /**
     * Create a Runway client with optional API key, base URL, and transport overrides.
     */
    public function __construct(ClientOptions $options = new ClientOptions())
    {
        parent::__construct($options);
        $this->textToVideo = TextToVideo::fromHttp($this->http);
        $this->extendVideo = ExtendVideo::fromHttp($this->http);
    }
}

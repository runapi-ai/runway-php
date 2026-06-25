<?php

declare(strict_types=1);

namespace RunApi\Runway\Resources;

use RunApi\Core\Http\HttpClient;
use RunApi\Core\Models\TaskCreateResponse;
use RunApi\Core\RequestOptions;
use RunApi\Core\Resources\TypedConfiguredResource;
use RunApi\Runway\Models\CompletedVideoTaskResponse;
use RunApi\Runway\Models\VideoTaskResponse;
use RunApi\Runway\Types;

/**
 * Appends additional footage to a previously generated video, continuing from where the source task left off. Requires the source_task_id of a completed TextToVideo or ExtendVideo task.
 */
readonly class ExtendVideo extends TypedConfiguredResource
{
    /**
     * Submits a video-extension task and returns immediately with a task id.
     *
     * @param array{
     *   model: string,
     *   output_resolution: string,
     *   source_task_id: string,
     *   callback_url?: string,
     *   prompt?: string
     * } $params
     */
    public function create(array $params, ?RequestOptions $options = null): TaskCreateResponse
    {
        return parent::create($params, $options);
    }

    /**
     * Fetches the current status of a video-extension task by id.
     */
    public function get(string $id, ?RequestOptions $options = null): VideoTaskResponse
    {
        $response = parent::get($id, $options);

        /** @var VideoTaskResponse $response */
        return $response;
    }

    /**
     * Submits a video-extension task and polls until it completes.
     *
     * @param array{
     *   model: string,
     *   output_resolution: string,
     *   source_task_id: string,
     *   callback_url?: string,
     *   prompt?: string
     * } $params
     */
    public function run(array $params, ?RequestOptions $options = null): CompletedVideoTaskResponse
    {
        $response = parent::run($params, $options);

        /** @var CompletedVideoTaskResponse $response */
        return $response;
    }

    /**
     * Create the resource using the shared RunAPI HTTP transport.
     */
    public static function fromHttp(HttpClient $http): self
    {
        return new self(
            $http,
            '/api/v1/runway/extend_video',
            'runway/extend-video',
            VideoTaskResponse::class,
            CompletedVideoTaskResponse::class,
            Types::EXTEND_VIDEO_MODELS,
            'extend-video',
            VideoTaskResponse::class,
            CompletedVideoTaskResponse::class,
        );
    }
}

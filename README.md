# Runway PHP SDK for RunAPI

[![Packagist](https://img.shields.io/packagist/v/runapi-ai/runway)](https://packagist.org/packages/runapi-ai/runway)
[![License](https://img.shields.io/github/license/runapi-ai/runway-php)](https://github.com/runapi-ai/runway-php/blob/main/LICENSE)

The Runway PHP SDK is the language-specific package for Runway
on RunAPI. Use this package when your application needs Composer installs,
associative-array request bodies, task status lookup, and consistent RunAPI
errors in PHP.

This README is the PHP package guide for the public `runway-php` split
repository. For model details, use https://runapi.ai/models/runway; for API
reference, use https://runapi.ai/docs/api/runway/text-to-video; for SDK docs, use
https://runapi.ai/docs/resources/sdks.

## Install

```bash
composer require runapi-ai/runway
```

## Quick start

```php
<?php

require __DIR__ . "/vendor/autoload.php";

use RunApi\Runway\RunwayClient;

$client = new RunwayClient(); // reads RUNAPI_API_KEY

$extendVideoTask = $client->extendVideo->create([
    'model' => 'runway',
    'output_resolution' => '720p',
    'prompt' => 'Make it golden hour',
    'source_task_id' => 'task_source',
    'watermark' => 'sample',
]);

$task = $client->textToVideo->create([
    'model' => 'runway',
    'aspect_ratio' => '16:9',
    'duration_seconds' => 5,
    'first_frame_image_url' => 'https://cdn.runapi.ai/public/samples/image.jpg',
    'output_resolution' => '720p',
    'prompt' => 'A precise product render on white marble',
    'watermark' => 'sample',
]);

$status = $client->textToVideo->get($task->id);

$result = $client->textToVideo->run([
    'model' => 'runway',
    'aspect_ratio' => '16:9',
    'duration_seconds' => 5,
    'first_frame_image_url' => 'https://cdn.runapi.ai/public/samples/image.jpg',
    'output_resolution' => '720p',
    'prompt' => 'A serene mountain lake at dawn',
    'watermark' => 'sample',
]);

echo $result->videos[0]->url . PHP_EOL;
```

Use `create()` to submit a task and return quickly, `get()` to fetch the latest
task state, and `run()` when a script should create and poll until completion.
In web request handlers, prefer `create()` plus webhook or later `get()`
polling so a worker is not held open.


RunAPI-generated file URLs are temporary. Download and store generated files
in your own durable storage within the retention window; do not treat returned
URLs as long-term assets.

## Language notes

Pass request parameters as associative arrays with snake_case keys. The
available resources are `textToVideo`, `extendVideo`. Keep `RUNAPI_API_KEY` in the environment
or your secret manager; never commit API keys or callback secrets.

## Links

- Model page: https://runapi.ai/models/runway
- SDK docs: https://runapi.ai/docs/resources/sdks
- Product docs: https://runapi.ai/docs/api/runway/text-to-video
- Pricing and rate limits: https://runapi.ai/models/runway
- Full catalog: https://runapi.ai/models
- GitHub repository: https://github.com/runapi-ai/runway-php
- Multi-language SDK repository: https://github.com/runapi-ai/runway-sdk

## License

Licensed under the Apache License, Version 2.0.

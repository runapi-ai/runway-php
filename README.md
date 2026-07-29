# Runway PHP SDK for RunAPI

[![Packagist](https://img.shields.io/packagist/v/runapi-ai/runway)](https://packagist.org/packages/runapi-ai/runway)
[![License](https://img.shields.io/github/license/runapi-ai/runway-php)](https://github.com/runapi-ai/runway-php/blob/main/LICENSE)

The Runway PHP SDK is the Composer package for Runway on RunAPI. Use it when your PHP application needs associative-array request bodies, task status lookup, polling helpers, file helpers, and consistent RunAPI errors.

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

$task = $client->textToVideo->create([
    'model' => 'runway',
    'prompt' => 'A precise product render on white marble',
    'aspect_ratio' => '16:9',
    'duration_seconds' => 5,
    'output_resolution' => '720p',
]);

$status = $client->textToVideo->get($task->id);

$result = $client->textToVideo->run([
    'model' => 'runway',
    'prompt' => 'A serene mountain lake at dawn',
    'aspect_ratio' => '16:9',
    'duration_seconds' => 5,
    'output_resolution' => '720p',
]);

echo $result->videos[0]->url . PHP_EOL;
```

Use `create()` to submit a task and return quickly, `get()` to fetch the latest task state, and `run()` when a script should create and poll until completion. In web request handlers, prefer `create()` plus webhook or later `get()` polling so a worker is not held open.

Returned file URLs are temporary. Download and store generated files in your own durable storage within the retention window.

All SDK exceptions inherit from `RunApi\Core\Errors\RunApiException`, including validation, authentication, rate limit, task failure, and task timeout errors.

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

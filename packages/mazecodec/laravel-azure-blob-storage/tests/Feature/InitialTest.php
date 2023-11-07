<?php

namespace Mazecodec\LaravelAzureBlobStorage\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Mazecodec\LaravelAzureBlobStorage\Providers\LaravelAzureBlobStorageServiceProvider;
use Mazecodec\LaravelAzureBlobStorage\Services\AzureBlobService;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use Orchestra\Testbench\TestCase;

class InitialTest extends TestCase
{
    use WithFaker;

    private BlobRestProxy $client;

    protected function getPackageProviders($app): array
    {
        return [LaravelAzureBlobStorageServiceProvider::class];
    }

    protected function setUp(): void {
        parent::setUp();
        $this->client = $this->app->make(BlobRestProxy::class);
        $this->service = $this->app->make(AzureBlobService::class);
    }

    public function test_blob_mounted(): void {
        $this->assertNotNull($this->client);
    }

    public function test_service_mounted(): void {
        $response = $this->client->listBlobs('container-xml');

        dd($response);
    }
}

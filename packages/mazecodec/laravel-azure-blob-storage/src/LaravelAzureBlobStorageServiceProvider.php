<?php

namespace Mazecodec\LaravelAzureBlobStorage;


use Dotenv\Dotenv;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\Container;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Mazecodec\LaravelAzureBlobStorage\Adapter\AzureBlobStorageAdapter;
use Mazecodec\LaravelAzureBlobStorage\Services\AzureBlobService;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Middlewares\RetryMiddleware;
use MicrosoftAzure\Storage\Common\Middlewares\RetryMiddlewareFactory;

class LaravelAzureBlobStorageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->load();

        $configFilePath = realpath(__DIR__ . "/../../config/azure-blob-storage.php");
        assert(is_string($configFilePath));
        $this->mergeConfigFrom($configFilePath, "filesystems.disks.azure");

        App::bind(BlobRestProxy::class, function (Container $app, $config) {
            $config = $this->getConfig($app, $config);

            if (!empty($config['connection_string'])) {
                $endpoint = (string)$config['connection_string'];
            } else {
                $endpoint = $this->createConnectionString($config);
            }

            $blobOptions = [];
            $retry = data_get($config, 'retry');

            if (isset($retry)) {
                assert(is_array($retry));
                assert(is_null($retry['tries']) || is_int($retry['tries']));
                assert(is_null($retry['interval']) || is_int($retry['interval']));
                assert(is_null($retry['increase']) || is_string($retry['increase']));

                $blobOptions = [
                    'middlewares' => [
                        $this->createRetryMiddleware($retry)
                    ]
                ];
            }

            return BlobRestProxy::createBlobService($endpoint, $blobOptions);
        });

        App::bind(AzureBlobService::class, function (Container $app, $config) {
            $config = $this->getConfig($app, $config);

            return new AzureBlobService(
                $app->make(BlobRestProxy::class, $config),
                $config['container'],
                $config['prefix'] ?? ''
            );
        });
    }

    /**
     * @param Container $app
     * @param ProviderConfig|array $config
     * @return ProviderConfig|void
     * @throws BindingResolutionException
     */
    function getConfig(Container $app, $config)
    {
        $configObject = $app->make('config');
        assert($configObject instanceof Repository);
        $storageConfig = (array)$configObject->get('filesystems.disks.azure');

        /**
         * Provider config
         *
         * @var ProviderConfig $config
         */
        $config = empty($config) ? $storageConfig : $config;

        return $config;
    }

    /**
     * Create connection string
     *
     * @psalm-param ProviderConfig $config
     */
    private function createConnectionString(array $config): string
    {
        if (isset($config['sasToken'])) {
            if (!isset($config['endpoint'])) {
                throw new EndpointNotSet("Endpoint not set when using sasToken");
            }
            return sprintf(
                'BlobEndpoint=%s;SharedAccessSignature=%s;',
                $config['endpoint'],
                $config['sasToken']
            );
        }
        if (!isset($config['key'])) {
            throw new KeyNotSet();
        }
        $endpoint = sprintf(
            'DefaultEndpointsProtocol=https;AccountName=%s;AccountKey=%s;',
            $config['name'],
            $config['key']
        );
        if (isset($config['endpoint'])) {
            $endpoint .= sprintf("BlobEndpoint=%s;", $config['endpoint']);
        }

        return $endpoint;
    }

    /**
     * Create retry middleware instance.
     *
     * @param ProviderRetryConfig $config
     *
     * @return RetryMiddleware
     */
    private function createRetryMiddleware(array $config): RetryMiddleware
    {
        return RetryMiddlewareFactory::create(
            RetryMiddlewareFactory::GENERAL_RETRY_TYPE,
            $config['tries'] ?? 3,
            $config['interval'] ?? 1000,
            $config['increase'] === 'exponential' ?
                RetryMiddlewareFactory::EXPONENTIAL_INTERVAL_ACCUMULATION :
                RetryMiddlewareFactory::LINEAR_INTERVAL_ACCUMULATION,
            true  // Whether to retry connection failures too, default false
        );
    }

    /**
     * @return void
     * @throws BindingResolutionException
     * @throws InvalidCustomUrl
     */
    public function boot()
    {
        Storage::extend('azure', function (Container $app, array $config) {
            $client = $app->make(BlobRestProxy::class, $config);
            assert($client instanceof BlobRestProxy);

            $adapter = new AzureBlobStorageAdapter(
                $client, $config,
            );

            return new FilesystemAdapter(
                new Filesystem($adapter, $config), $adapter, $config
            );
        });
    }
}

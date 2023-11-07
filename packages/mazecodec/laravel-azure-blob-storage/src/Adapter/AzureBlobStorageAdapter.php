<?php

declare(strict_types=1);

namespace Mazecodec\LaravelAzureBlobStorage\Adapter;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Arr;
use League\Flysystem\AzureBlobStorage\AzureBlobStorageAdapter as BaseAzureBlobStorageAdapter;
use Matthewbdaly\LaravelAzureStorage\Exceptions\InvalidCustomUrl;
use Matthewbdaly\LaravelAzureStorage\Exceptions\KeyNotSet;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\BlobSharedAccessSignatureHelper;

/**
 * Blob storage adapter
 *
 * @see https://flysystem.thephpleague.com/docs/adapter/azure-blob-storage/
 * @internal
 */
final class AzureBlobStorageAdapter extends BaseAzureBlobStorageAdapter
{
    private BlobRestProxy $client;
    private string $container;
    private string|null $url;
    private string|null $key;
    private string $prefix;

    /**
     * @param BlobRestProxy $client
     * @param $config
     * @throws InvalidCustomUrl
     */
    public function __construct(BlobRestProxy $client, $config)
    {
        parent::__construct($client, $config['container-name'], $config['prefix']);

        $this->client = $client;
        $this->container = $config['container-name'];
        $url = $config['url'];
        if ($url && !filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidCustomUrl();
        }
        $this->url = $url;
        $this->key = $config['key'];
        $this->prefix = $config['prefix'];
    }


    /**
     * Generate Temporary Url with SAS query
     *
     * @param string $path
     * @param DateTime|string $ttl
     * @param array $options
     *
     * @return string
     * @throws KeyNotSet
     */
    public function getTemporaryUrl(string $path, $ttl, array $options = []): string
    {
        $path = $this->prefix ? $this->prefix . '/' . $path : $path;
        $resourceName = (empty($path) ? $this->container : $this->container . '/' . $path);
        if (!$this->key) {
            throw new KeyNotSet();
        }
        $sas = new BlobSharedAccessSignatureHelper($this->client->getAccountName(), $this->key);
        $sasString = $sas->generateBlobServiceSharedAccessSignatureToken((string)Arr::get($options, 'signed_resource', 'b'), $resourceName, (string)Arr::get($options, 'signed_permissions', 'r'), $ttl, (string)Arr::get($options, 'signed_start', ''), (string)Arr::get($options, 'signed_ip', ''), (string)Arr::get($options, 'signed_protocol', 'https'), (string)Arr::get($options, 'signed_identifier', ''), (string)Arr::get($options, 'cache_control', ''), (string)Arr::get($options, 'content_disposition', ''), (string)Arr::get($options, 'content_encoding', ''), (string)Arr::get($options, 'content_language', ''), (string)Arr::get($options, 'content_type', ''));

        return sprintf('%s?%s', $this->getUrl($path), $sasString);
    }

    /**
     * Get the file URL by given path.
     *
     * @param string $path Path.
     *
     * @return string
     */
    public function getUrl(string $path): string
    {
        if ($this->url) {
            return rtrim($this->url, '/') . '/' . ($this->container === '$root' ? '' : $this->container . '/') . ($this->prefix ? $this->prefix . '/' : '') . ltrim($path, '/');
        }

        return $this->client->getBlobUrl($this->container, $path);
    }
}


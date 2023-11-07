<?php

namespace Mazecodec\LaravelAzureBlobStorage\Adapter;

use DateTimeInterface;
use League\Flysystem\ChecksumProvider;
use League\Flysystem\Config;
use League\Flysystem\FileAttributes;
use League\Flysystem\FilesystemAdapter;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;
use League\Flysystem\UrlGeneration\TemporaryUrlGenerator;
use Mazecodec\LaravelAzureBlobStorage\Services\AzureBlobService;

class AzureServiceAdapter implements FilesystemAdapter, PublicUrlGenerator, ChecksumProvider, TemporaryUrlGenerator
{
    public function __construct(private AzureBlobService $service)
    {
    }

    public function checksum(string $path, Config $config): string
    {
        // TODO: Implement checksum() method.
    }

    public function fileExists(string $path): bool
    {
        return $this->service->fileExists($path);
    }

    public function directoryExists(string $path): bool
    {
        return $this->service->fileExists($path);
    }

    public function write(string $path, string $contents, Config $config): void
    {
        // TODO: Implement write() method.
    }

    public function writeStream(string $path, $contents, Config $config): void
    {
        // TODO: Implement writeStream() method.
    }

    public function read(string $path): string
    {
        // TODO: Implement read() method.
    }

    public function readStream(string $path)
    {
        // TODO: Implement readStream() method.
    }

    public function delete(string $path): void
    {
        // TODO: Implement delete() method.
    }

    public function deleteDirectory(string $path): void
    {
        // TODO: Implement deleteDirectory() method.
    }

    public function createDirectory(string $path, Config $config): void
    {
        // TODO: Implement createDirectory() method.
    }

    public function setVisibility(string $path, string $visibility): void
    {
        // TODO: Implement setVisibility() method.
    }

    public function visibility(string $path): FileAttributes
    {
        // TODO: Implement visibility() method.
    }

    public function mimeType(string $path): FileAttributes
    {
        // TODO: Implement mimeType() method.
    }

    public function lastModified(string $path): FileAttributes
    {
        // TODO: Implement lastModified() method.
    }

    public function fileSize(string $path): FileAttributes
    {
        // TODO: Implement fileSize() method.
    }

    public function listContents(string $path, bool $deep): iterable
    {
        // TODO: Implement listContents() method.
    }

    public function move(string $source, string $destination, Config $config): void
    {
        // TODO: Implement move() method.
    }

    public function copy(string $source, string $destination, Config $config): void
    {
        // TODO: Implement copy() method.
    }

    public function publicUrl(string $path, Config $config): string
    {
        // TODO: Implement publicUrl() method.
    }

    public function temporaryUrl(string $path, DateTimeInterface $expiresAt, Config $config): string
    {
        // TODO: Implement temporaryUrl() method.
    }
}

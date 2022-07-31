<?php

namespace Src\Services;

use Src\Connections\FileConnection;
use Src\Connectors\ConnectorInterface;
use Src\Connectors\FileConnector;
use Src\Resources\ResourceInterface;
use Src\Services\Interfaces\FileServiceInterface;

class FileService implements FileServiceInterface
{
    protected ConnectorInterface $connector;

    public function __construct()
    {
        $this->connector = new FileConnector(new FileConnection());
    }

    /**
     * Read data from file
     *
     * @param array $settings
     * @return array
     */
    public function read(array $settings): array
    {
        return $this->getFileResource($settings)->readData();
    }

    /**
     * Write data in file
     *
     * @param string $data
     * @param array $settings
     * @return void
     */
    public function write(string $data, array $settings): void
    {
        $fileResource = $this->getFileResource($settings);
        $fileResource->writeData($data);
    }

    /**
     * Connect to file resource
     *
     * @param array $settings
     * @return ResourceInterface
     */
    protected function getFileResource(array $settings): ResourceInterface
    {
        return $this->connector->connect($settings['connectionName'], $settings['fileSettings']);
    }
}
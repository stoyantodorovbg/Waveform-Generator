<?php

namespace Src\Connectors;

use Src\Connections\ConnectionInterface;
use Src\Resources\File;
use Src\Resources\ResourceInterface;

class Connector implements ConnectorInterface
{
    /**
     * @var string
     */
    protected string $resourceName = File::class;

    /**
     * @var ResourceInterface|null 
     */
    protected ResourceInterface|null $resource;

    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(protected ConnectionInterface $connection) {}

    /**
     * Connect to resource
     *
     * @param string $connectionName
     * @param array $settings = []
     * @return ResourceInterface
     */
    public function connect(string $connectionName, array $settings = []): ResourceInterface
    {
        if ($settings) {
            $this->connection->changeSettings($settings, $connectionName);
        }

        $this->resource = new $this->resourceName($this->connection->getSettings($connectionName));

        return $this->resource;
    }
}
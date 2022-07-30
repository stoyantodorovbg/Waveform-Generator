<?php

namespace Src\Connectors;

use Src\Connections\ConnectionInterface;
use Src\Resources\ResourceInterface;

interface ConnectorInterface
{
    /**
     * Connect to resource
     *
     * @param ConnectionInterface $connection
     * @param string $connectionName
     * @return ResourceInterface
     */
    public function connect(ConnectionInterface $connection, string $connectionName): ResourceInterface;

    /**
     * Close connection to resource
     *
     * @param ConnectionInterface $connection
     * @param string $connectionName
     * @return mixed
     */
    public function close(ConnectionInterface $connection, string $connectionName): void;
}
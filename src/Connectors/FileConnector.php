<?php

namespace Src\Connectors;

use Src\Connections\ConnectionInterface;
use Src\Resources\ResourceInterface;

class FileConnector implements ConnectorInterface
{

    /**
     * Connect to resource
     *
     * @param ConnectionInterface $connection
     * @param string $connectionName
     * @return ResourceInterface
     */
    public function connect(ConnectionInterface $connection, string $connectionName): ResourceInterface
    {
        // TODO: Implement connect() method.
    }

    /**
     * Close connection to resource
     *
     * @param ConnectionInterface $connection
     * @param string $connectionName
     * @return void
     */
    public function close(ConnectionInterface $connection, string $connectionName): void
    {
        // TODO: Implement close() method.
    }
}
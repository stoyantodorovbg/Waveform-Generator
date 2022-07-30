<?php

namespace Src\Connections;

interface ConnectionInterface
{
    /**
     * Get settings for a connection
     *
     * @param string $connectionName
     * @return array
     */
    public function getSettings(string $connectionName): array;

    /**
     * Change settings to a connection
     *
     * @param array $settings
     * @param string $connectionName
     * @return void
     */
    public function changeSettings(array $settings, string $connectionName): void;
}
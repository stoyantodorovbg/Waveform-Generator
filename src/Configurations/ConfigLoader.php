<?php

namespace Src\Configurations;

use Exception;

class ConfigLoader
{
    /**
     * Hold the class instance.
     * @var ConfigLoader|null
     */
    private static ConfigLoader|null $instance = null;

    /**
     * @var array
     */
    private array $filesConfigs = [];

    /**
     * @var array
     */
    private array $appConfigs = [];

    /**
     * Prevent initiation with outer code.
     */
    private function __construct() {}

    /**
     * Prevent to be cloned.
     */
    protected function __clone() {}

    /**
     * Prevent to be restored from string.
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception('Cannot unserialize.');
    }

    /**
     * Access the instance
     *
     * @return ConfigLoader
     */
    public static function getInstance(): ConfigLoader
    {
        if (self::$instance === null) {
            self::$instance = new ConfigLoader();
        }

        return self::$instance;
    }

    public function getAppConfig(string $key): array
    {
        if (!$this->appConfigs) {
            $this->setAppConfigs();
        }

        return $this->filesConfigs[$key];
    }

    protected function setAppConfigs(): void
    {
        $this->appConfigs = require 'configFiles/app.php';
    }

    public function getFilesConfig(string $key): array
    {
        if (!$this->filesConfigs) {
            $this->setFilesConfigs();
        }

        return $this->filesConfigs[$key];
    }

    protected function setFilesConfigs(): void
    {
        $this->filesConfigs = require 'configFiles/files.php';
    }
}
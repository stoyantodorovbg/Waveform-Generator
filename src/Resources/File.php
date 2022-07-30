<?php

namespace Src\Resources;

use Src\Connections\ConnectionInterface;

class File extends Resource
{
    /**
     * @var mixed
     */
    protected mixed $resource;

    /**
     * @var string
     */
    protected string $filePath = __DIR__;

    /**
     * @var string
     */
    protected string $fileMode = 'r';

    /**
     * @param array $settings
     */
    public function __construct(protected array $settings) {}

    /**
     * Convert data from specific format to array
     *
     * @return array
     */
    public function readData(): array
    {
        $this->setFilePath('input');
        $this->setFileMode('r');
        $this->connect();

        $result = [];
        foreach ($this->resource as $line) {
            $result[] = $line;
        }

        $this->disconnect();

        return $result;
    }

    /**
     * Convert an array to data in specific format
     *
     * @param array $input
     * @return void
     */
    public function writeData(array $input): void
    {
        $this->setFilePath('input');
        $this->setFileMode('w');
        $this->connect();

        // write data

        $this->disconnect();
    }

    /**
     * Establish connection to resource
     *
     * @return void
     */
    protected function connect(): void
    {
        $this->resource = fopen($this->filePath, $this->fileMode);
    }

    /**
     * Destroy connection to resource
     *
     * @return void
     */
    protected function disconnect(): void
    {
        fclose($this->resource);
    }

    /**
     * Set file path
     *
     * @param string $key
     * @return void
     */
    protected function setFilePath(string $key): void
    {
        $this->filePath = $this->settings[$key];
    }

    /**
     * Set file path
     *
     * @param string $mode
     * @return void
     */
    protected function setFileMode(string $mode): void
    {
        $this->fileMode = $mode;
    }
}
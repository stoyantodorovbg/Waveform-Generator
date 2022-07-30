<?php

namespace Src\Resources;

abstract class Resource implements ResourceInterface
{
    /**
     * @var mixed
     */
    protected mixed $resource;

    /**
     * Establish connection to resource
     *
     * @return void
     */
    abstract protected function connect(): void;

    /**
     * Destroy connection to resource
     *
     * @return void
     */
    abstract protected function disconnect(): void;
}
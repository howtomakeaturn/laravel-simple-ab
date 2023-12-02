<?php

namespace Howtomakeaturn\LaravelSimpleAB;

class Experiment
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function getValue()
    {
        $values = config("laravel-simple-ab.experiments.{$this->key}");

        return $values[array_rand($values)];
    }

    public function increment()
    {
        // todo
    }
}

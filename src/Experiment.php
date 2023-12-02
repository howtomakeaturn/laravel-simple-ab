<?php

namespace Howtomakeaturn\LaravelSimpleAB;

use Cookie;

class Experiment
{
    protected $key;

    protected $value;

    public function __construct($key)
    {
        $this->key = $key;

        $values = config("laravel-simple-ab.experiments.{$this->key}");

        $cookieKey = 'laravel-simple-ab-experiment-'. $this->key;

        $index = Cookie::get($cookieKey);

        if ($index === null) {
            $index = rand(0, count($values) - 1);

            $cookie = Cookie::forever($cookieKey, $index);

            Cookie::queue($cookie);

            $this->value = $values[$index];
        } else {
            $this->value = $values[(int) $index];
        }
    }

    public function getValue()
    {
        return $this->value;
    }

    public function increment()
    {
        // todo
    }
}

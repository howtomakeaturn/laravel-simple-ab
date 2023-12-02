<?php

namespace Howtomakeaturn\LaravelSimpleAB;

class LaravelSimpleAB
{
    protected $experiments = [];

    public function experiment($key)
    {
        if (array_key_exists($key, $this->experiments)) {
            return $this->experiments[$key];
        }

        $experiment = new Experiment($key);

        $this->experiments[$key] = $experiment;

        return $experiment;
    }
}

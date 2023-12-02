<?php

namespace Howtomakeaturn\LaravelSimpleAB;

use Cookie;
use File;

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

    public function increment($event)
    {
        $path = storage_path().'/laravel-simple-ab';

        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

        $filePath = $path . '/' . $this->key . '.json';

        File::isFile($filePath) or File::put($filePath, '{}');

        $str = File::get($filePath);

        $data = json_decode($str, true);

        if (array_key_exists($this->getValue(), $data)) {
            if (array_key_exists($event, $data[$this->getValue()])) {
                $data[$this->getValue()][$event] += 1;
            } else {
                $data[$this->getValue()][$event] = 1;
            }
        } else {
            $data[$this->getValue()] = [
                $event => 1,
            ];
        }

        File::put($filePath, json_encode($data));
    }
}

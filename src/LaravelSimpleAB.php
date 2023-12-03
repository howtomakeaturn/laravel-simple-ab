<?php

namespace Howtomakeaturn\LaravelSimpleAB;

use File;

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

    public function getReports()
    {
        $path = storage_path().'/laravel-simple-ab';

        $files = File::allFiles($path);

        $reports = [];

        foreach ($files as $file) {
            $reports[] = [
                'key' => $file->getFilenameWithoutExtension(),
                'data' => json_decode(File::get($file), true),
            ];
        }

        return collect($reports);
    }
}

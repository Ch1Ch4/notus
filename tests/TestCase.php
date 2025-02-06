<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $databaseName = env('DB_DATABASE', 'laravel.test');

        $databaseExists = DB::select("SHOW DATABASES LIKE '$databaseName'");

        if (empty($databaseExists)) {
            DB::statement("CREATE DATABASE $databaseName");
        }

        $this->artisan('migrate');
    }
}

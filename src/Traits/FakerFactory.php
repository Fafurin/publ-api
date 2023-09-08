<?php

namespace App\Traits;

use Faker;

trait FakerFactory
{
    public Faker\Generator $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create();
    }

}
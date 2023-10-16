<?php
namespace App\Controllers;

class BaseController
{
    protected function render(string $path, $attributes = [])
    {
        include view($path, $attributes);
        exit();
    }
}
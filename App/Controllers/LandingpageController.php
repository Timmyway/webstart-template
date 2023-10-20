<?php
namespace App\Controllers;

use Lite\Routing\BaseController;

class LandingpageController extends BaseController
{
    public function demo()
    {
        $metadata = [
            'title' => 'Demo landingpages',
            'description' => "C'est une page d'atterissage démo du micro framework Lite."
        ];
        return $this->render('landingpages.demo', ['metadata' => $metadata]);
    }
}
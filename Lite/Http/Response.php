<?php

// CustomResponse.php
namespace Lite\Http;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class Response extends SymfonyResponse
{
    public function json($content)
    {
        $this->setContent(json_encode($content));
        $this->headers->set('Content-Type', 'application/json');
        return $this;
    }
}

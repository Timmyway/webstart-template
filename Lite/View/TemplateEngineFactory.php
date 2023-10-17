<?php
namespace Lite\View;

class TemplateEngineFactory {
    private $viewsPath;
    private $cachePath;
    private $_engine;

    public function __construct(string $viewsPath, string $cachePath, string $engine = 'bladeone')
    {
        $this->viewsPath = $viewsPath;
        $this->cachePath = $cachePath;
        $this->create($engine, $viewsPath, $cachePath);
    }


    public function create(string $engine, string $viewsPath, string $cachePath): TemplateEngineInterface {
        switch ($engine) {
            case 'bladeone':
                $this->setEngine(BladeOneTemplateEngine::getInstance($viewsPath, $cachePath));
            // Add more cases for other engines
            default:
                throw new \InvalidArgumentException('Invalid template engine.');
        }
    }

    public function setEngine(TemplateEngineInterface $engine)
    {
        return $engine;
    }

    public function getEngine(): TemplateEngineInterface
    {
        return $this->_engine;
    }
}
<?php
namespace Lite\View;

class TemplateEngineFactory {
    private $viewsPath;
    private $cachePath;
    private $engineName;
    private $_engine;

    public function __construct(string $viewsPath, string $cachePath, string $engineName = 'bladeone')
    {
        $this->viewsPath = $viewsPath;
        $this->cachePath = $cachePath;
        $this->engineName = $engineName;        
        $this->create();
    }


    public function create() {        
        switch ($this->engineName) {            
            case 'bladeone':                
                $this->setEngine(
                    BladeOneTemplateEngine::getInstance($this->viewsPath, $this->cachePath)
                );
                break;
            // Add more cases for other engines
            default:
                throw new \InvalidArgumentException('Invalid template engine.');
        }
    }

    public function setEngine(TemplateEngineInterface $engine)
    {
        $this->_engine = $engine;
    }

    public function getEngine(): TemplateEngineInterface
    {
        return $this->_engine;
    }
}
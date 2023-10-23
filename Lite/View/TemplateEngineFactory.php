<?php
namespace Lite\View;

use Lite\Http\Request;

class TemplateEngineFactory {
    private $viewsPath;
    private $cachePath;
    private $engineName;
    private $_engine;

    public function __construct(Request $request, string $viewsPath, string $cachePath, string $engineName = 'bladeone')
    {
        $this->viewsPath = $viewsPath;
        $this->cachePath = $cachePath;
        $this->engineName = $engineName;
        $this->create($request);
    }


    public function create(Request $request) {
        switch ($this->engineName) {            
            case 'bladeone':                
                $this->setEngine(
                    BladeOneTemplateEngine::getInstance($request, $this->viewsPath, $this->cachePath)
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
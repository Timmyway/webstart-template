<?php
namespace Lite\View;
use eftec\bladeone\BladeOne;
use Exception;
use Throwable;

class BladeOneTemplateEngine implements TemplateEngineInterface {
    private static $instance;
    private BladeOne $_engine;
    private $errorPage;

    private function __construct($viewsPath, $cachePath, $errorPage = 'pages.404') {
        $this->_engine = new BladeOne($viewsPath, $cachePath, BladeOne::MODE_DEBUG);
        $this->errorPage = $errorPage;        
    }    

    public static function getInstance($viewsPath, $cachePath)
    {
        if (self::$instance === null) {
            self::$instance = new self($viewsPath, $cachePath);
        }
        return self::$instance;
    }

    public function render(string $template, array $data = []): string|null {
        try {
            return $this->_engine->run($template, $data);
        } catch (Throwable $e) {
            echo $e->getMessage();
            $this->renderNotFoundPage();
            return null;
        }
    }
    
    protected function renderNotFoundPage()
    {        
        echo $this->_engine->run($this->errorPage);
    }
}
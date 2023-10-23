<?php
namespace Lite\View;
use eftec\bladeone\BladeOne;
use Exception;
use Lite\Http\Request;
use Lite\Http\Security\Csrf;
use Throwable;

class BladeOneTemplateEngine implements TemplateEngineInterface {
    private static $instance;
    private BladeOne $_engine;
    private $errorPage;

    private function __construct(Request $request, string $viewsPath, string $cachePath, $errorPage = 'pages.404') {
        $this->_engine = new BladeOne($viewsPath, $cachePath, BladeOne::MODE_SLOW);        
        $this->_engine->directive('csrf', function () use($request) {            
            $token = Csrf::generate($request->getSession()); // Replace with your own function to generate the CSRF token
            return $token;
        });
        $this->errorPage = $errorPage;        
    }       

    public static function getInstance(Request $request, string $viewsPath, string $cachePath)
    {
        if (self::$instance === null) {
            self::$instance = new self($request, $viewsPath, $cachePath);
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
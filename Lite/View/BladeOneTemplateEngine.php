<?php
namespace Lite\View;
use eftec\bladeone\BladeOne;

class BladeOneTemplateEngine implements TemplateEngineInterface {
    private static $instance;
    private $_engine;

    private function __construct($viewsPath, $cachePath) {
        $this->_engine = new BladeOne($viewsPath, $cachePath, BladeOne::MODE_AUTO);
    }

    public static function getInstance($viewsPath, $cachePath)
    {
        if (self::$instance === null) {
            self::$instance = new self($viewsPath, $cachePath);
        }
        return self::$instance;
    }

    public function render(string $template, array $data = []): string {
        return $this->_engine->run($template, $data);
    }
}
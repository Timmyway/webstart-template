<?php
namespace Lite;

class ConfigLoader
{
    protected $config;
    private $configPath;

    public function __construct($configPath = 'Lite/config')
    {
        $this->config = [];
        $this->configPath = basePath($configPath);
        $this->loadConfigurationFiles();
    }

    protected function loadConfigurationFiles()
    {        
        $configFiles = scandir($this->configPath);        
        
        foreach ($configFiles as $file) {
            $filePath = $this->configPath . '/' . $file;
            if (is_file($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) === 'php') {
                $this->config[pathinfo($file, PATHINFO_FILENAME)] = require $filePath;
            }
        }
    }

    public function get($key, $default = null)
    {        
        $keys = explode('.', $key);
        $value = $this->config;
        foreach ($keys as $k) {
            if (isset($value[$k])) {
                $value = $value[$k];
            } else {
                return $default;
            }
        }
        return $value;
    }
}

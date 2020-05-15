<?php

namespace WpPlugin\Core\Interfaces;

interface PluginInterface {

    public function version();

    public function path($path = '');

    public function bootstrapPath($path = '');

    public function setBasePath($basePath);

}
<?php
/**
 * Default application path for backend area
 *
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

namespace Magento\Backend\App;

use Magento\Config\App\Config\Type\System;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Backend config accessor.
 */
class Config implements ConfigInterface
{
    /**
     * @var \Magento\Framework\App\Config
     */
    protected $appConfig;

    /**
     * @param \Magento\Framework\App\Config $appConfig
     * @return void
     */
    public function __construct(\Magento\Framework\App\Config $appConfig)
    {
        $this->appConfig = $appConfig;
    }

    /**
     * @inheritdoc
     */
    public function getValue($path)
    {
        $configPath = ScopeConfigInterface::SCOPE_TYPE_DEFAULT;
        if ($path) {
            $configPath .= '/' . $path;
        }
        return $this->appConfig->get(System::CONFIG_TYPE, $configPath);
    }

    /**
     * @inheritdoc
     */
    public function isSetFlag($path)
    {
        $configPath = ScopeConfigInterface::SCOPE_TYPE_DEFAULT;
        if ($path) {
            $configPath .= '/' . $path;
        }
        return (bool) $this->appConfig->get(System::CONFIG_TYPE, $configPath);
    }
}

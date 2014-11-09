<?php
/*
 * This file is part of the Aisel package.
 *
 * (c) Ivan Proskuryakov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\ResourceBundle\Twig;

class MetaExtension extends \Twig_Extension
{
    protected $settingsManager;

    public function __construct($settingsManager)
    {
        $this->settingsManager = $settingsManager;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'defaultMetaTitle' => new \Twig_Function_Method($this, 'defaultMetaTitle'),
        );
    }

    /**
     * Get Aisel settings manager
     * @return \Aisel\SettingsBundle\Manager\SettingsManager
     */
    private function getSettingsManager()
    {
        return $this->settingsManager;
    }

    /**
     * Get settings values
     * @return array
     */
    private function getConfig()
    {
        return $this->getSettingsManager()->getConfig();
    }

    /**
     * Get Default Title
     * @return string
     */
    public function defaultMetaTitle()
    {
        $settings = $this->getConfig();
        $meta = (array)json_decode($settings['config_meta']);
        return $meta['defaultMetaTitle'];
    }

    public function getName()
    {
        return 'meta_extension';
    }
}
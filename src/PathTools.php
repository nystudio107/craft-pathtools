<?php
/**
 * PathTools plugin for Craft CMS 3.x
 *
 * This twig plugin for the Craft CMS brings convenient path & url manipulation functions & filters to your
 * Twig templates.
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\pathtools;

use nystudio107\pathtools\twigextensions\PathToolsTwigExtension;

use Craft;
use craft\base\Plugin;

/**
 * @author    nystudio107
 * @package   PathTools
 * @since     1.0.0
 */
class PathTools extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var static
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->twig->addExtension(new PathToolsTwigExtension());

        Craft::info('PathTools ' . Craft::t('pathTools', 'plugin loaded'), __METHOD__);
    }
}

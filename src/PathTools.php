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

use Craft;
use craft\base\Plugin;
use nystudio107\pathtools\twigextensions\PathToolsTwigExtension;

/**
 * Class PathTools
 *
 * @author    nystudio107
 * @package   PathTools
 * @since     1.0.0
 */
class PathTools extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var ?PathTools
     */
    public static ?PathTools $plugin = null;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public string $schemaVersion = '1.0.0';

    /**
     * @var bool
     */
    public bool $hasCpSettings = false;
    /**
     * @var bool
     */
    public bool $hasCpSection = false;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$plugin = $this;
        Craft::$app->view->registerTwigExtension(new PathToolsTwigExtension());
        Craft::info(
            Craft::t(
                'path-tools',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }
}

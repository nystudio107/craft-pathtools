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

namespace nystudio107\pathtools\twigextensions;

use Craft;

/**
 * @author    nystudio107
 * @package   PathTools
 * @since     1.0.0
 */
class PathToolsTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'PathTools';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('pathinfo', [$this, 'pathInfoFilter']),
            new \Twig_SimpleFilter('basename', [$this, 'baseNameFilter']),
            new \Twig_SimpleFilter('dirname', [$this, 'dirNameFilter']),
            new \Twig_SimpleFilter('parse_url', [$this, 'parseUrlFilter']),
            new \Twig_SimpleFilter('parse_string', [$this, 'parseStringFilter']),
            new \Twig_SimpleFilter('swap_extension', [$this, 'swapExtensionFilter']),
            new \Twig_SimpleFilter('swap_directory', [$this, 'swapDirectoryFilter']),
            new \Twig_SimpleFilter('append_suffix', [$this, 'appendSuffixFilter']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('pathinfo', [$this, 'pathInfoFilter']),
            new \Twig_SimpleFunction('basename', [$this, 'baseNameFilter']),
            new \Twig_SimpleFunction('dirname', [$this, 'dirNameFilter']),
            new \Twig_SimpleFunction('parse_url', [$this, 'parseUrlFilter']),
            new \Twig_SimpleFunction('parse_string', [$this, 'parseStringFilter']),
            new \Twig_SimpleFunction('swap_extension', [$this, 'swapExtensionFilter']),
            new \Twig_SimpleFunction('swap_directory', [$this, 'swapDirectoryFilter']),
            new \Twig_SimpleFunction('append_suffix', [$this, 'appendSuffixFilter']),
        ];
    }


    /**
     * php pathinfo() wrapper -- http://php.net/manual/en/function.pathinfo.php
     *
     * @param $path
     * @param bool $options
     * @return mixed
     */
    public function pathInfoFilter($path, $options = false)
    {
        if ($options) {
            $output = pathinfo($path, $options);
        } else {
            $output = pathinfo($path);
        }
        return $output;
    }

    /**
     * php basename() wrapper -- http://php.net/manual/en/function.basename.php
     *
     * @param $path
     * @param bool $suffix
     * @return string
     */
    public function baseNameFilter($path, $suffix = false)
    {
        if ($suffix) {
            $output = basename($path, $suffix);
        } else {
            $output = basename($path);
        }
        return $output;
    }

    /**
     * php dirname() wrapper -- http://php.net/manual/en/function.dirname.php
     *
     * @param $path
     * @return string
     */
    public function dirNameFilter($path)
    {
        $output = dirname($path);
        return $output;
    }

    /**
     * php parse_url() wrapper -- http://php.net/manual/en/function.parse-url.php
     *
     * @param $url
     * @param int $component
     * @return mixed
     */
    public function parseUrlFilter($url, $component = -1)
    {
        $output = parse_url($url, $component);
        return $output;
    }

    /**
     * php parse_str() wrapper -- http://php.net/manual/en/function.parse-str.php
     *
     * @param $string
     * @return mixed
     */
    public function parseStringFilter($string)
    {
        parse_str($string, $output);
        return $output;
    }

    /**
     * Swap the file extension on a passed url or path
     *
     * @param $path_or_url
     * @param $extension
     * @return string
     */
    public function swapExtensionFilter($path_or_url, $extension)
    {
        $path = $this->decomposeUrl($path_or_url);
        $path_parts = pathinfo($path['path']);
        $new_path = $path_parts['filename'] . "." . $extension;
        if (!empty($path_parts['dirname']) && $path_parts['dirname'] !== ".") {
            $new_path = $path_parts['dirname'] . DIRECTORY_SEPARATOR . $new_path;
            $new_path = preg_replace('#/+#', '/', $new_path);
        }
        $output = $path['prefix'] . $new_path . $path['suffix'];
        return $output;
    }

    /**
     * Swap the file directory on a passed url or path
     *
     * @param $path_or_url
     * @param $directory
     * @return string
     */
    public function swapDirectoryFilter($path_or_url, $directory)
    {

        $path = $this->decomposeUrl($path_or_url);
        $path_parts = pathinfo($path['path']);
        $new_path = $directory . DIRECTORY_SEPARATOR . $path_parts['basename'];

        $output = $path['prefix'] . $new_path . $path['suffix'];
        return $output;
    }


    /**
     * Append a suffix a passed url or path
     *
     * @param $path_or_url
     * @param $suffix
     * @return string
     */
    public function appendSuffixFilter($path_or_url, $suffix)
    {
        $path = $this->decomposeUrl($path_or_url);
        $path_parts = pathinfo($path['path']);
        $new_path = $path_parts['filename'] . $suffix . "." . $path_parts['extension'];
        if (!empty($path_parts['dirname']) && $path_parts['dirname'] !== ".") {
            $new_path = $path_parts['dirname'] . DIRECTORY_SEPARATOR . $new_path;
            $new_path = preg_replace('#/+#', '/', $new_path);
        }
        $output = $path['prefix'] . $new_path . $path['suffix'];
        return $output;
    }

    // Private Methods
    // =========================================================================

    /**
     * Decompose a url into a prefix, path, and suffix
     *
     * @param $path_or_url
     * @return array
     */
    private function decomposeUrl($path_or_url)
    {
        $result = array();

        if (filter_var($path_or_url, FILTER_VALIDATE_URL)) {
            $url_parts = parse_url($path_or_url);
            $result['prefix'] = $url_parts['scheme'] . "://" . $url_parts['host'];
            $result['path'] = $url_parts['path'];
            $result['suffix'] = "";
            $result['suffix'] .= (empty($url_parts['query'])) ? "" : "?" . $url_parts['query'];
            $result['suffix'] .= (empty($url_parts['fragment'])) ? "" : "#" . $url_parts['fragment'];
        } else {
            $result['prefix'] = "";
            $result['path'] = $path_or_url;
            $result['suffix'] = "";
        }

        return $result;
    }
}

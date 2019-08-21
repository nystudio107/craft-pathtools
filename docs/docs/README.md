[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nystudio107/craft-pathtools/badges/quality-score.png?b=v1)](https://scrutinizer-ci.com/g/nystudio107/craft-pathtools/?branch=v1) [![Code Coverage](https://scrutinizer-ci.com/g/nystudio107/craft-pathtools/badges/coverage.png?b=v1)](https://scrutinizer-ci.com/g/nystudio107/craft-pathtools/?branch=v1) [![Build Status](https://scrutinizer-ci.com/g/nystudio107/craft-pathtools/badges/build.png?b=v1)](https://scrutinizer-ci.com/g/nystudio107/craft-pathtools/build-status/v1) [![Code Intelligence Status](https://scrutinizer-ci.com/g/nystudio107/craft-pathtools/badges/code-intelligence.svg?b=v1)](https://scrutinizer-ci.com/code-intelligence)

# PathTools plugin for Craft CMS 3.x

This twig plugin for the Craft CMS brings convenient path & url manipulation functions & filters to your Twig templates.

![Screenshot](./resources/img/plugin-logo.png)

Related: [PathTools for Craft 2.x](https://github.com/nystudio107/pathtools)

## Requirements

This plugin requires Craft CMS 3.0.0 or later.

## Installation

To install PathTools, follow these steps:

1. Install with Composer via `composer require nystudio107/craft-pathtools` from your project directory
2. Install the plugin via `./craft install/plugin path-tools` via the CLI, or in the Control Panel, go to Settings → Plugins and click the “Install” button for Connect.

You can also install PathTools via the **Plugin Store** in the Craft AdminCP.

PathTools works on Craft 3.x.

## Usage

All of the functionality offered by PathTools can be used either as a filter, e.g.:

```twig
{{ myAsset.url | basename }}
```

Or as a function, e.g.:

```twig
{% set myBaseName = basename(myAsset.url) %}
```
## php Wrapper Functions
### pathinfo
Wrapper for the php pathinfo() function -- <http://php.net/manual/en/function.pathinfo.php>
### basename
Wrapper for the php basename() function -- <http://php.net/manual/en/function.basename.php>
### dirname
Wrapper for the php dirname() function -- <http://php.net/manual/en/function.dirname.php>
### parse_url
Wrapper for the php parse_url() function -- <http://php.net/manual/en/function.parse-url.php>
### parse_str
Wrapper for the php parse_str() function -- <http://php.net/manual/en/function.parse-str.php>
## Utility Functions
### swap_extension
Can be passed either a path or a url, and it will return the path or url with the filename extension changed, e.g.:

```twig
<source src="{{ myAsset.url | swap_extension('mp4') }}" type='video/mp4' />
<source src="{{ myAsset.url | swap_extension('webm') }}" type='video/webm' />
```

For ``myAsset.url`` = ``http://www.coolvids.com/content/vids/MyCoolVid.mp4`` the output would be:

```html
<source src="http://www.coolvids.com/content/vids/MyCoolVid.mp4" type='video/mp4' />
<source src="http://www.coolvids.com/content/vids/MyCoolVid.webm" type='video/webm' />
```

### swap_directory
Can be passed either a path or a url, and it will return the path or url with the directory path changed, e.g.:

```twig
<img src="{{ myAsset.url | swap_directory('/over/there') }}" />
```

For ``myAsset.url`` = ``http://www.coolvids.com/not/here/rock.pdf`` the output would be:

```html
<img src="http://www.coolvids.com/over/there/rock.pdf" />
```

### append_suffix
Can be passed either a path or a url, and it will return the path or url with the suffix appended to the filename, e.g.:

```twig
<img src="{{ myAsset.url | append_suffix('@2x') }}" />
```

For ``myAsset.url`` = ``http://www.coolvids.com/img/ux/search.png`` the output would be:

```html
<img src="http://www.coolvids.com/img/ux/search@2x.png" />
```

Brought to you by [nystudio107](https://nystudio107.com)

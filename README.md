# PathTools plugin for Craft CMS 3.x

This twig plugin for the Craft CMS brings convenient path & url manipulation functions & filters to your Twig templates.

![Screenshot](resources/img/plugin-logo.png)

Related: [PathTools for Craft 2.x](https://github.com/nystudio107/pathtools)

## Requirements

This plugin requires Craft CMS 3.0.0-RC1 or later.

## Installation

To install PathTools, follow these steps:

1. Install with Composer via `composer require nystudio107/craft-pathtools` from your project directory
2. Install plugin in the Craft Control Panel under Settings > Plugins

PathTools works on Craft 3.x.

## Usage

All of the functionality offered by PathTools can be used either as a filter, e.g.:

```
{{ myAsset.url | basename }}
```

Or as a function, e.g.:

```
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

```
<source src="{{ myAsset.url | swap_extension('mp4') }}" type='video/mp4' />
<source src="{{ myAsset.url | swap_extension('webm') }}" type='video/webm' />

```
For ``myAsset.url`` = ``http://www.coolvids.com/content/vids/MyCoolVid.mp4`` the output would be:

```
<source src="http://www.coolvids.com/content/vids/MyCoolVid.mp4" type='video/mp4' />
<source src="http://www.coolvids.com/content/vids/MyCoolVid.webm" type='video/webm' />

```

### swap_directory
Can be passed either a path or a url, and it will return the path or url with the directory path changed, e.g.:

```
<img src="{{ myAsset.url | swap_directory('/over/there') }}" />

```
For ``myAsset.url`` = ``http://www.coolvids.com/not/here/rock.pdf`` the output would be:

```
<img src="http://www.coolvids.com/over/there/rock.pdf" />

```
### append_suffix
Can be passed either a path or a url, and it will return the path or url with the suffix appended to the filename, e.g.:

```
<img src="{{ myAsset.url | append_suffix('@2x') }}" />

```
For ``myAsset.url`` = ``http://www.coolvids.com/img/ux/search.png`` the output would be:

```
<img src="http://www.coolvids.com/img/ux/search@2x.png" />

```

Brought to you by [nystudio107](https://nystudio107.com)

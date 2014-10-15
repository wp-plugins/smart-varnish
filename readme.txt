=== Smart Varnish ===
Contributors: smartpixels, arulpr
Donate link:       http://www.smartpixels.net
Tags: varnish,varnish cache,varnish bypass,varnish caching
Requires at least: 3.5
Tested up to: 4.0.0
Stable tag: 1.0.0
License:           GPLv2 or later
License URI:       http://www.gnu.org/licenses/gpl-2.0.html

Varnish cache bypass plugin.

== Description ==
[Smart Varnish](http://www.smartpixels.net/?post_type=products&p=628) A simple plugin to bypass varnish caching for logged in users and serve uncached content.
  
Useful for websites that don't want to serve cached content for logged in users and at the same time want to serve cached content to guests.

 **NOTE:** This plugin requires knowledge of varnish caching and server administration, it will not work out of the box. We cannot guarantee it will work in every scenario and recommend usage with discretion.

Please follow the **[tutorial here](http://www.smartpixels.net/?p=650)**.

== Installation ==
1. Install Smart Varnish either via the WordPress.org plugin directory, or by uploading the files to your server.
2. Activate Smart Varnish through the 'Plugins' menu in WordPress.
3. There are no settings. Make sure that you edit your varnish configurations files and restart varnish server.

Add the following lines of code to vcl_recv in default VCL configuration file.
`
if( req.request == "POST" || req.http.cookie ~ "smart_varnish_bypass" )
  {
    return( pass );
  }
`
**Warning:** If you don't have the expertise to edit the varnish configurations its better to hire some help as you could damage your server irreparably.
 
== Frequently Asked Questions ==

= Is there a demo ? =
No

= Will it work out of the box? =

No, you need to add couple of lines of code to your varnish cache configuration files to make it work, check installation procedure.

= Can we help in installing the plugin on your server?  =

Yes we can! [Get in touch](http://www.smartpixels.net/contact/)

= Does it work for varnish 3.0?  =

Works.



== Changelog ==
* Initial release

== Upgrade Notice ==
* None
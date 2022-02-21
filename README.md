# Introduction
This is a plugin which extends the Crocoblock Jet Engine plugin for Elementor.

It adds support for the Dynamic Visibility functionality to check if the user
has purchased a WooCommerce product by entering the product id.

# Usage
Install the plugin and activate it. 

You need JetEngine and WooCommerce installed as well.

Don't forget that Dynamic Visibility needs to be enabled in JetEngine:

  1. In your admin panel, go to JetEngine > JetEngine to see the JetEngine dashboard
  2. Toggle the "Dynamic Visibility for Widgets and Section" slider.
  3. Hit the “Save” button.

Then you can find it in Advanced > Dynamic Visibility. 

Just look under User > User has purchased product.

Enter the product id to check for.

(Check the known issues at the end of this readme before using this plugin)

# Changelog
0.5.0 - 21 February 2022
  - Initial release
  - Supports built in wc product purchased check with single product id

# Inspiration
This was based on a request in this support ticket:

  - https://github.com/Crocoblock/suggestions/issues/4902

I used the snippet from here to do the heavy lifting:

  - https://www.businessbloomer.com/woocommerce-check-current-user-already-purchased-product/

And based the plugin structure on these two great starting points:

  - https://github.com/UraraReika/jet-engine-single-products-widget-custom-visibility-conditions/
  - https://github.com/MjHead/jet-engine-custom-visibility-conditions/

# Known Issues
There are potential issues with this that I haven't investigated fully but did
read about during development.

It may be that refunded products are not filtered out with this function:

  - https://github.com/woocommerce/woocommerce/issues/17959#issuecomment-831418890

It may be that this method may seriously slow down your website:

  - https://github.com/woocommerce/woocommerce/issues/16604

I followed the discussion of this and related support tickets, and it was 
"solved", but then a bug was found, it was rolled back, and they gave up,
so I'm not sure what the current status of this is.

# Licence
This plugin is licenced under GPL 3, and is free to use on personal and 
commercial projects.

# Author
Built by Matthew Harris of runthings.dev, copyright 2022.

https://runthings.dev/
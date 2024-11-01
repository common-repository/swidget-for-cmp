=== SWidget for Carnegie Museums of Pittsburgh ===  
Contributors: heimanj, jgordoncmp  
Donate link: [https://carnegiemuseums.org/join-support/donate/](https://carnegiemuseums.org/join-support/donate/)   
Tags: siriusware, ecommerce, shortcode  
Requires at least: 4.1.0  
Tested up to: 6.0.3  
Stable tag: 1.9  
Requires PHP: 5.2  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

== Description ==

Allows the site of the Carnegie Museums of Pittsburgh to display Siriusware widgets using shortcodes.  See below for descriptions of these shortcodes.

### Shortcodes

#### Add to Cart
`[swaddtocart site="siteID" item="itemID"]`   

#### Quick Checkout
`[swcheckout site="siteID" item="itemID"]`

#### Add to Cart Timed
`[swaddtocarttimed site="siteID" group="groupCode"]`   

#### Quick Checkout Timed
`[swcheckouttimed site="siteID" group="groupCode"]`

#### Add to Cart Timed (auto-select earliest GA)
`[swaddtocarttimed_firstga site="siteID" group="groupCode"]`	
_Automatically selects a date/time to match or be after the earliest General Admission present in the cart_	

#### 1-Click Add to Cart
`[swoneclickaddtocart site="siteID" item="itemID" mod="modID"]`  
Optional parameter `date="YYYYMMDD"` should only be used for timed items.  
_Note: timed items use the item ID of the timeslot, NOT the group ID._

#### 1-Click Checkout
`[swoneclickcheckout site="siteID" item="itemID" mod="modID"]`  
Optional parameter `date="YYYYMMDD"` should only be used for timed items.  
_Note: timed items use the item ID of the timeslot, NOT the group ID._

#### Multi-Item Add to Cart
`[swmulticart site="siteID" items="itemsString"]`  
_Desplays a series of items as a drop-down menu.  "items" expects a comma-delimited list of Siriusware item IDs._

#### Multi-Item Quick Checkout  
`[swmulticheckout items="itemsString"]`  
Optional parameter `site="siteID"`  
_Desplays a series of items as a drop-down menu.  "items" expects a comma-delimited list of Siriusware item IDs._

#### Cart
`[swcart site="siteID"]`   

#### Gift Card Balance Check
`[swcardbalance]`   


### Options Reference

All options can be managed on the WordPress admin page for the swidget plugin.

#### Item Widgets:

##### General

* **Date Format** (`sw_date_format`) - How dates are displayed in placeholders.  Uses the moment.js library.  [Info on formats found here](http://momentjs.com/docs/#/displaying/format/)
* **Low Qty** (`sw_low_qty`) - The point when the *low quantity* message shows
* **Radio Button Cutoff for Timed Items** (`sw_radio_cutoff`) - the maximum number before the input changes to dropdown
* **Display Product Name** (`sw_display_product_name`) - Show the name of the product (defaults to Yes)
* **Open checkout in new tab** (`sw_open_tab`) - Open the checkout page in a new tab/window
* **Display checkout link after adding items** (`sw_display_checkout_link`)
* **Fill all dates for timed items** (`sw_fill_dates`)
* **Show time selector if only one option** (`sw_show_only_one_time`)
* **Show *.00 decimal points** (`sw_hide_price_decimal`)
* **Pre-Selected Date** (`sw_pre_selected_date`) - A date to be pre-selected from the drop-down menu, in `YYYY-MM-DD` format (timed ticketing)
* **Pre-Selected Time** (`sw_pre_selected_time`) - A time to be pre-selected from the drop-down menu/radio buttons,  in `H:mm` format (timed ticketing)
* **Override-Price Start** (`sw_overrideprice_start`) - Date to begin overriding price, in `YYYY-MM-DD` format (timed ticketing)
* **Override-Price End** (`sw_overrideprice_end`) - Date to end overriding price, in `YYYY-MM-DD` format (timed ticketing)

##### Messages

* **Loading** (`sw_msg_loading`) - The message that displays while the tickets are loading
* **Not yet on sale** (`sw_msg_too_early`) - Message displayed if the product is not yet available to purchase
* **Offline sales only** (`sw_msg_offline_only`) - Message displayed when the item is available to be sold in Siriusware but *not* with e-commerce
* **Site Maintenance** (`sw_msg_maintenance`) - The message that is displayed when the site is undergoing maintenance
* **Expired** (`sw_msg_expired`) - The message that is displayed when the item is no longer on sale
* **Low Quantity** (`sw_msg_low_qty`) - The message that displays when there is low quantity
* **Sold Out** (`sw_msg_sold_out`) - The message that displays when the item is sold out
* **Add To Cart** (`sw_msg_add_to_cart`) - A message for when an item is added to cart (Note: only for swaddtocart widgets)

##### Text Modification

* **Free** (`sw_txt_free`) - The text to display when an item is free (Replaces $0.00).
* **Additional Fee** (`sw_txt_fee`) - The text for additional fees
* **Checkout Button** (`sw_txt_checkout`) - The text for the *quick* checkout button
* **Checkout Button (Free item)** (`sw_txt_free_checkout`) - This replaces the *quick* checkout text if all items in the widget are free
* **Add to Cart Button** (`sw_txt_add_to_cart`) - Text for the add-to-cart widget's checkout button
* **Checkout Link** (`sw_txt_checkout_link`) - The text to display as the checkout link
* **Discount** (`sw_txt_discount`) - The text for discounts
* **Member Discount** (`sw_txt_member_discount`) - The text to show how much one would pay if they are a member
* **Member Exclusive** (`sw_txt_members_only`) - The text to indicate that an item is for members only
* **Select New Date** (`sw_txt_select_new_date`) - The label text for the date selector (timed ticketing)
* **Select New Time** (`sw_txt_select_new_time`) - The label text for the time selector (timed ticketing)
* **Select New Item** (`sw_txt_select_new_item`) - The label text for the item selector (multi-item)
* **Date Dropdown Placeholder** (`sw_txt_date_dropdown_placeholder`) - The default text for the date selector (timed ticketing)
* **Time Dropdown Placeholder** (`sw_txt_time_dropdown_placeholder`) - The default text for the time selector (timed ticketing)
* **Item Dropdown Placeholder** (`sw_txt_item_dropdown_placeholder`) - The default text for the item selector (multi-item)
* **Pay What you Wish Placeholder** (`sw_txt_pay_what_you_wish`) - The default text for the pay what you wish message


#### Cart Widgets

##### General

* **Open checkout in new tab** (`sw_open_tab`) - Open the checkout page in a new tab/window
* **Display dates for timed items in cart** (`sw_display_timed_dates_in_cart`)

##### Messages

##### Text Modification

* **Checkout Button** (`sw_txt_cart`) - The text for the cart widget's checkout button


### Placeholders

Place holders are a special string which will be replace with information from the item.  They can be used in any of the above options.

* `#{stock}` - How many tickets are remaining
* `#{name}` - The name of the ticket
* `#{start_sale}` - When the tickets go on sale
* `#{end_sale}` - When the tickets go off sale (both online and offline)

### Options Hierarchy

The following is the priority of where the widget gets its settings from (lower numbers trump higher numbers)

1. Options passed with the shortcode
1. Options set in WP admin
1. Default settings from the widget itself

### Message Hierarchy

The following is the priority of the messages

1. Past sale end
1. Sold Out
1. Offline sales only
1. Prior to sale start
1. [No message, ticket can be sold]


== Frequently Asked Questions ==

= Who is this plugin designed for? =

The webmasters of the four Carnegie Museums of Pittsburgh can can use this plugin on their WordPress sites to sell tickets for their various offerings.

= What does this plugin actually do? =

It adds shortcodes to WordPress that will render the specified ecommerce item/group/cart on the page (via empty divs and jQuery commands).

= Does it use any external libraries? =

Other than WordPress' installation of jQuery and our own self-hosted JavaScript file, the plugin includes and makes use of [Moment.js](https://momentjs.com/) for date handling and  [Pippin Williamson](https://github.com/pippinsplugins)'s [EDD_Session class](https://github.com/easydigitaldownloads/Easy-Digital-Downloads/blob/master/includes/class-edd-session.php) for session handling.

= Can I use this plugin for other purposes? =

Sure, if it will help you out.


== Screenshots ==

1. One instance of the plugin in use for the Carnegie Science Center
2. Two instances of the plugin in use for CMANH


== Changelog ==

= 1.11.0 =

* Added override-price start/end options

= 1.10.0 =

* Added `Show *.00 decimal points` option

= 1.9.1 =

* Bug fix for `swaddtocarttimed_firstga` functionality

= 1.9.0 =

* Added `swmulticart` and `swmulticheckout` shortcodes and functionality

= 1.8.1 =

* Removed "Max Displayed Qty" option (in favor of item-specific settings) 

= 1.8.0 =

* Added "Max Displayed Qty" option

= 1.7.0 =

* Added `swcardbalance` shortcode and functionality

= 1.6.0 =

* Added maintenance-mode setting

= 1.5.0 =

* Added `swaddtocarttimed_firstga` shortcode and functionality
* Added support for pre-selected dates/times for timed ticketing

= 1.4.1 =

* Reorganized Settings page

= 1.4.0 =

* Added 1-click shortcodes
* Added a "Display dates for timed items in cart" option

= 1.3.3 =

* Clarification of PHP session-handling behavior

= 1.3.2 =

* Further changes to generic names

= 1.3.1 =

* Added namespace, session sanitation/validation and replace CURL with HTTP API

= 1.3.0 =

* First version designed for the WordPress Plugins directory

= 1.2.1 =

* Better error handling (and falls back to PHP sessions if EDD class not present)

= 1.2.0 =

* Adding Pay What You Wish setting


== Upgrade Notice ==

= 1.6.0 =
Added maintenance-mode setting and `swaddtocarttimed_firstga` shortcode
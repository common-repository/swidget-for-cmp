<?php
namespace SWCMP;

function swcmpGetItemBaseSettings() 
{
  return array(
    //the 2nd value in the value array will be the input type ("yn" will be converted into yes/no radio buttons)
    "sw_date_format" => array("Date Format (see <a href='https://momentjs.com/docs/#/parsing/string-format/' target='_new'>this guide</a> for possible tokens to use)", "text"),
    "sw_low_qty"  => array("Low Qty", "number"),
	//"sw_max_display_qty"  => array("Max Displayed Qty", "number"),
	"sw_radio_cutoff" => array("Radio Button Cutoff for Timed Items (max before change to dropdown)", "number"),
    "sw_display_product_name"  => array("Display Product Name?", "yn"),
    "sw_open_tab" => array("Open checkout in new tab?", "yn"),
    "sw_display_checkout_link" => array("Display checkout link after adding items?", "yn"),
    "sw_fill_dates" => array("Fill all dates for timed items?", "yn"),
    //"sw_show_only_one_time" => array("Show time selector if only one option?", "yn")
    "sw_hide_price_decimal" => array("Show *.00 decimal points?", "yn"),
  );
}

function swcmpGetItemMessageSettings()
{
  return array(
    "sw_msg_loading" => "Loading",
    "sw_msg_too_early" => "Not yet on sale",
    "sw_msg_offline_only" => "Offline Sales Only",
	"sw_msg_maintenance" => "Site Maintenance",
    "sw_msg_expired" => "Expired",
    "sw_msg_low_qty" => "Low Quantity",
    "sw_msg_sold_out" => "Sold Out",
    "sw_msg_add_to_cart" => "Add to Cart"
  );
}

function swcmpGetItemTextSettings()
{
  return array (
    "sw_txt_free" => "Free Item",
    "sw_txt_fee" => "Additional Fee",
    "sw_txt_checkout" => "Checkout Button (Quick)",
    "sw_txt_free_checkout" => "Checkout Button (Free item)",
    "sw_txt_add_to_cart" => "Add To Cart Button",
	"sw_txt_checkout_link"	=> "Checkout Link",
    "sw_txt_discount" => "Discount",
    "sw_txt_member_discount" => "Member Discount",
	"sw_txt_members_only" => "Member Exclusive",
	"sw_txt_pay_what_you_wish" => "Pay what you wish (#{price} can be used as a placeholder)",
    "sw_txt_select_new_date" => "Select a different date",
    "sw_txt_select_new_time" => "Select a different time",
    "sw_txt_select_new_item" => "Select a different item",
	"sw_txt_date_dropdown_placeholder" => "Select a date",
	"sw_txt_time_dropdown_placeholder" => "Select a time",
    "sw_txt_item_dropdown_placeholder" => "Select an item",
  );
}

function swcmpGetCartBaseSettings() {
  return array (
    //"sw_open_tab" => array("Open checkout in new tab?", "yn"),
	"sw_display_timed_dates_in_cart" => array("Display dates for timed items in cart?", "yn"),
  );
}

function swcmpGetCartMsgSettings() {
  return array();
}

function swcmpGetCartTextSettings() {
  return array(
    "sw_txt_cart" => "Checkout Button (Cart)"
  );
}


add_action('admin_menu', function() {
  add_options_page('SWidget Wordpress Config', 'SWidget for CMP', 'manage_options', 'swidget', __NAMESPACE__ . '\swcmp_generate_config_page');
});

add_action('admin_init', function() {
  register_setting('swidget-cmp', 'sw_data_consent');
  //Item Base Options
  foreach (swcmpGetItemBaseSettings() as $key => $value) {
    register_setting('swidget-cmp', $key);
  }
  //Item Messages
  foreach (swcmpGetItemMessageSettings() as $key => $value) {
    register_setting('swidget-cmp', $key);
  }
  //Item Text
  foreach (swcmpGetItemTextSettings() as $key => $value) {
    register_setting('swidget-cmp', $key);
  }

  //Cart settings...
  foreach (swcmpGetCartBaseSettings() as $key => $value) {
    register_setting('swidget-cmp', $key);
  }
  foreach (swcmpGetCartMsgSettings() as $key => $value) {
    register_setting('swidget-cmp', $key);
  }
  foreach (swcmpGetCartTextSettings() as $key => $value) {
    register_setting('swidget-cmp', $key);
  }
});

function swcmp_generate_config_page()
{
  $item_base_settings = swcmpGetItemBaseSettings();
  $item_msg_settings = swcmpGetItemMessageSettings();
  $item_txt_settings = swcmpGetItemTextSettings();
  $cart_base_settings = swcmpGetCartBaseSettings();
  $cart_msg_settings = swcmpGetCartMsgSettings();
  $cart_txt_settings = swcmpGetCartTextSettings();
  ?>
  <script type="text/javascript">
  jQuery(document).ready(function() {
    function checkDataConsent() {
	  if(jQuery("input#sw_data_consent").is(":checked")) {
		jQuery("table#swidget-settings input").not("#sw_data_consent").attr("disabled", false);
	  }
	  else {
	    jQuery("table#swidget-settings input").not("#sw_data_consent").attr("disabled", true);
	  }
	  console.log(jQuery("input#sw_data_consent").is(":checked"));
	}

	checkDataConsent();
	jQuery("input#sw_data_consent").click(checkDataConsent);

	//if a setting is in both the item and cart sections, keep them linked
	/*jQuery("input[name='sw_open_tab']").change(function() {
	  console.log(jQuery(this).is(":checked"));
	});*/
  });
  </script>
  <style type="text/css">
    .wrap table code {
	  font-size: 0.8em;
	  margin-left: 1em;
    }
  </style>

  <div class="wrap">
    <h1>Siriusware Widget for CMP Settings</h1>
    <p> See the <a href="https://wordpress.org/plugins/swidget-for-cmp/#description" target="_blank">readme</a> for additional information</p>
   <form action="options.php" method="post">
     <?php
     settings_fields('swidget-cmp');
     do_settings_sections('swidget-cmp');
     ?>
     <table id="swidget-settings">
	   <tr>
         <td>
           <label for="sw_data_consent">I hereby consent to data being sent to the sales.carnegiemuseums.org server.<br/><em>(Plugin will not work if unchecked)</em></label>
         </td>
         <td>
		   <label><input id="sw_data_consent" name="sw_data_consent" type="checkbox" value="true" <?php echo checked(get_option('sw_data_consent'), 'true'); ?> /></label>
         </td>
       </tr>

	   <tr>
		 <td colspan="2"><h1>Item Settings</h1></td>
	   </tr>

	   <tr>
         <td colspan="2"><h2>General</h2></td>
       </tr>
	   <?php
       foreach ($item_base_settings as $key => $value_array) { ?>
       <tr>
         <td>
           <label for="<?php echo $key; ?>"><?php echo $value_array[0]; ?></label><br/><code><?php echo $key; ?></code>
         </td>
         <td>
		   <?php echo outputSettingField($key, $value_array[1]); ?>
         </td>
       </tr>
       <?php } ?>

       <tr>
         <td colspan="2"><h2>Messages</h2></td>
       </tr>
       <?php outputTextSettingsSection($item_msg_settings); ?>

       <tr>
         <td colspan="2"><h2>Text Modification</h2></td>
       </tr>
       <?php outputTextSettingsSection($item_txt_settings); ?>

	   <tr>
         <td colspan="2"><h1>Cart Options</h1></td>
       </tr>

	   <tr>
         <td colspan="2"><h2>General</h2></td>
       </tr>
	   <tr>
	     <td>Open checkout in new tab?</td>
		 <td><em>Controlled in Item Settings > General</em></td>
	   <?php
       foreach ($cart_base_settings as $key => $value_array) { ?>
       <tr>
         <td>
           <label for="<?php echo $key; ?>"><?php echo $value_array[0]; ?></label><br/><code><?php echo $key; ?></code>
         </td>
         <td>
		   <?php echo outputSettingField($key, $value_array[1]); ?>
         </td>
       </tr>
       <?php } ?>

	   <tr>
         <td colspan="2"><h2>Messages</h2></td>
       </tr>
	   <?php outputTextSettingsSection($cart_msg_settings);  ?>

	   <tr>
         <td colspan="2"><h2>Text Modification</h2></td>
       </tr>
	   <?php outputTextSettingsSection($cart_txt_settings); ?>

     </table>
     <button name="save">Save</button>
   </form>
 </div>
  <?php
}


/* Helper functions */
function outputTextSettingsSection($setting_array) {
  foreach ($setting_array as $key => $value) {
	$fieldValue = esc_attr(get_option($key));
    echo <<<END_HTML
    <tr>
      <td>
        <label for="$key">$value</label><br/><code>$key</code>
      </td>
      <td>
        <input id="$key" name="$key" type="text" value="$fieldValue" />
      </td>
    </tr>
END_HTML;
  }
}

function outputSettingField($key, $type="text") {
  //convert "yn" into yes/no radio buttons, or otherwise just give this field the type specified
  switch($type) {
    case "yn":
	  $yesChecked = esc_attr(get_option($key)) == 'true' ? 'checked="checked"' : '';
	  $noChecked = esc_attr(get_option($key)) == 'false' ? 'checked="checked"' : '';
	  return <<<END_HTML
	  <label>
        <input id="{$key}_Y" name="$key" type="radio" value="true" $yesChecked /> Yes
      </label><br/>
      <label>
        <input id="{$key}_N" name="$key" type="radio" value="false" $noChecked  /> No
	  </label>\n
END_HTML;
      break;
    default:
	  return "<input id=\"$key\" name=\"$key\" type=\"$type\" value=\"" . esc_attr(get_option($key)) . "\" /n";
	  break;
  }
}

?>

<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li CLASS="col-sm-6"> <?php 
 $_pf = new WC_Product_Factory();  
     $_product = $_pf->get_product($product->id);
     
     ?>
    <div class="col-sm-6">
        <img style="width:100%" src="<?php echo wp_get_attachment_image_src($_product->get_image_id())[0]; ?>" />
    </div>
    <div class="col-sm-6">
        <a href="<?php echo $_product->get_permalink(); ?>"><?php echo $_product->get_title(); ?></a>
        <p><?php echo $product->post->post_excerpt; ?></p>
        <div class="amount"><?php echo $_product->get_price_html(); ?></div>
        <div class="fade_text">PAY FROM €30/MONTH</div>
        <div class="read_more">read about Klarma</div>
    </div>
</li>

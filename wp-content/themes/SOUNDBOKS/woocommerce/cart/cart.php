<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 2.3.8
 */
     
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
    

    
do_action( 'woocommerce_before_cart' ); ?>
    
<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    
<?php do_action( 'woocommerce_before_cart_table' ); 


?>
    <div class="container">
    <div id='cart_icons_row' class='row'>
        <div class='col-sm-3 heading'><i class='glyphicon glyphicon-shopping-cart'></i> CART</div>
        <div class='col-sm-3 '><i class="fa fa-undo" aria-hidden="true"></i> 30 DAYS RETURN</div>
        <div class='col-sm-3 '><i class="fa fa-shield" aria-hidden="true"></i> 2 YEARS WARRANTY</div>
        <div class='col-sm-3 '><i class="fa fa-plane" aria-hidden="true" style="float:left; line-height:23px" ></i> 
            <div style="float:left; line-height:19px;">WORLDWIDE <br>INSTANT SHIPPING</div>
        </div>
    </div>
    </div>
    <div style="border-top:1px solid #ddd; width:100%;"></div>
    <div class="container">
         <table class="shop_table shop_table_responsive cart" cellspacing="0">
     
        <tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>
                    
		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                            
			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
            <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                
                
                <td class="product-thumbnail">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                                            
							if ( ! $product_permalink ) {
								echo $thumbnail;
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
							}
						?>
                </td>
                    
                <td class="product-name" data-title="<?php _e( 'Product', 'woocommerce' ); ?>">
						<?php
							if ( ! $product_permalink ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key );
							}
                                                            
							// Meta data
							echo WC()->cart->get_item_data( $cart_item );
                                                            
							// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
							}
						?>
                    <br>
                                            <?php echo $_product->post->post_excerpt;; ?><br><br>
                                            Shipping: <?php  $delivery_estimate = $_product->get_attribute( 'Delivery Estimate' ); echo $delivery_estimate; ?>
                </td>
                    
                <td class="product-price" data-title="<?php _e( 'Price', 'woocommerce' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
                </td>
                    
                <td class="product-quantity" data-title="<?php _e( 'Quantity', 'woocommerce' ); ?>">
                    <div class="qty_container">
                        <div class=" arrow_up">
                            <i class="fa fa-sort-up"></i>
                        </div>
                        
                        <div class=" arrow_down">
                            
                            <i class="fa fa-sort-down"></i>
                        </div>
                        
                        <?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'  => "cart[{$cart_item_key}][qty]",
									'input_value' => $cart_item['quantity'],
									'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
									'min_value'   => '0'
								), $_product, false );
							}
                                                            
							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
						?>
                    </div>
						
                </td>
                    
                <td class="product-subtotal" data-title="<?php _e( 'Total', 'woocommerce' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						?>
                </td>
                    
                <td class="product-remove">
						<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
								esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
								__( 'Remove this item', 'woocommerce' ),
								esc_attr( $product_id ),
								esc_attr( $_product->get_sku() )
							), $cart_item_key );
						?>
                </td>
                    
            </tr>
				<?php
			}
                        do_action( 'woocommerce_cart_contents' );
                


		}
                    
		
		?>
                    
            <tr style="display:none">
                <td colspan="6" class="actions">
                    
				
                                    
                    <input style="" id="update_cart_button" type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'woocommerce' ); ?>" />
                        
				<?php do_action( 'woocommerce_cart_actions' ); ?>
                                    
				<?php wp_nonce_field( 'woocommerce-cart' ); ?>
                </td>
            </tr>
                
		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
        </tbody>
    </table>
    </div>
       <div style="border-top:1px solid #ddd; width:100%;"></div>

       <div class="container">
           <div class="row">
               <div class="col-sm-12" id="coupon_form">
                   <?php if ( wc_coupons_enabled() ) { ?>
                    <div class="coupon">
                        
                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'DISCOUNT CODE', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'APPLY DISCOUNT', 'woocommerce' ); ?>" />
                        
                        
                        <!-- ############### LIST OF APPLIED COUPONS ################# -->
                        <div style="clear:both"></div>
                        
                        <div id="applied_coupons">
                                                    <?php foreach(WC()->cart->get_coupons() as $applied_coupon):  if ( $post = get_post( $applied_coupon->id ) ) {
                        if ( !empty( $post->post_excerpt ) ) {
                                                        ?>
                            <div class="applied_coupon" id='coupon_<?php echo $coupon->id; ?>'>
                                <div class="row">
                                    
                                    <div class="col-xs-1">
                                    <i class="glyphicon glyphicon-ok-sign" style="color:#7ed321"></i>
                                    
                                    </div> 
                                    <div class="col-xs-11">
                                    <strong><?php echo  $applied_coupon->code; ?>: </strong><?php echo $post->post_excerpt ; ?>
                                    </div>
                                </div>
                                
                            </div>
                                                    <?php
                                                    }}
                                                        
                                                    endforeach;
                                                    ?>
                        </div>
                     <!-- #################### END LIST OF APPLIED COUPONS ############## --> 
                     
                     
                     
						<?php do_action( 'woocommerce_cart_coupon' ); ?>
                    </div>
				<?php } 
                                
                                
                                ?>
               </div>
           </div>
           
       </div>
<?php do_action( 'woocommerce_after_cart_table' ); ?>
    
</form>
    
<div class="cart-collaterals">
    
	<?php do_action( 'woocommerce_cart_collaterals' ); ?>
            
</div>
 <div CLASS="seperator">
    
    <h3>YOU MIGHT ALSO BE INTERESTED IN...</h3>
</div>
<div id="related_products" class="container">
    
</div>   
<?php do_action( 'woocommerce_after_cart' ); ?>
<script>
    jQuery( document.body ).on( 'applied_coupon removed_coupon', function(e){
        // get applied coupons
        get_applied_coupons();
    });
    
    function get_applied_coupons()
    {
        
        // Action will be function name which we will create in functions.php
        var action      = "get_applied_coupons"; 
        // this is required url for ajax calls in the wordpress
        var ajax_url    = '<?php echo admin_url('admin-ajax.php'); ?>';
        
        var data        = {action:action};
        
        jQuery.ajax({
            url:ajax_url,
            type:"POST",
            data:data
        }).done(function(response){
            console.log(response);
           var coupons_html = "";
           var coupons = response.data;
          jQuery("#applied_coupons").html(response);
        });
        return false;
    }
    
    jQuery('.arrow_down').on('click', function(){
       var value = parseInt(jQuery(this).parent().find('input[type="number"]').val());
      if(value>1)
      {
          value -=1;
          
      }
      jQuery(this).parent().find('input[type="number"]').val(value);
            jQuery(this).parent().find('input[type="number"]').trigger('change');

    });
    
    jQuery('.arrow_up').on('click', function(){
       var value = parseInt(jQuery(this).parent().find('input[type="number"]').val());
     
          value +=1;
          
     
      jQuery(this).parent().find('input[type="number"]').val(value);
      jQuery(this).parent().find('input[type="number"]').trigger('change');
    });
    
    
    
    jQuery(document).on('DOMNodeInserted', function(e) {
    if (jQuery(e.target).is('.woocommerce-error') || jQuery(e.target).is('.woocommerce-message')) {
      jQuery(e.target).prependTo('body');
      var cross = jQuery('<div class="cross"><i class="fa fa-times" aria-hidden="true"></i></div>');
     jQuery(e.target).find('.cross').remove();;
      if(!jQuery(e.target).hasClass('cross'))
      {
          jQuery(e.target).append(cross);
        cross.on('click', function(){
          jQuery(this).closest('.woocommerce-error').remove();
          jQuery(this).closest('.woocommerce-message').remove();
          jQuery('body').css('padding-top', '0px');
        });
      }
          
      
      jQuery('body').css('padding-top', '60px');
    }
    
   
});

 jQuery(window).ready(function(){
        jQuery('.cross-sells').appendTo('#related_products');
        
        if(jQuery('.woocommerce-message'))
        {
            
              var cross = jQuery('<div class="cross"><i class="fa fa-times" aria-hidden="true"></i></div>');
                jQuery('.woocommerce-message').find('.cross').remove();;
                 if(!jQuery('.woocommerce-message').hasClass('cross'))
                 {
                     jQuery('.woocommerce-message').append(cross);
                   cross.on('click', function(){
                     jQuery(this).closest('.woocommerce-error').remove();
                     jQuery(this).closest('.woocommerce-message').remove();
                     jQuery('body').css('padding-top', '0px');
                   });
                 }
                 
                 jQuery('body').css('padding-top', '50px');
        }
    })
</script>
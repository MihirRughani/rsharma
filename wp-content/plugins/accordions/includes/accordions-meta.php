<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

function accordions_posttype_register() {
 
        $labels = array(
                'name' => _x('Accordions', 'accordions'),
                'singular_name' => _x('Accordions', 'accordions'),
                'add_new' => _x('New Accordions', 'accordions'),
                'add_new_item' => __('New Accordions'),
                'edit_item' => __('Edit Accordions'),
                'new_item' => __('New Accordions'),
                'view_item' => __('View Accordions'),
                'search_items' => __('Search Accordions'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'accordions' , $args );

}

add_action('init', 'accordions_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_accordions()
	{
		$screens = array( 'accordions' );
		foreach ( $screens as $screen )
			{
				add_meta_box('accordions_metabox',__( 'Accordions Options','accordions' ),'meta_boxes_accordions_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_accordions' );


function meta_boxes_accordions_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_accordions_input', 'meta_boxes_accordions_input_nonce' );

	
	$accordions_bg_img = get_post_meta( $post->ID, 'accordions_bg_img', true );
	$accordions_themes = get_post_meta( $post->ID, 'accordions_themes', true );
	$accordions_icons = get_post_meta( $post->ID, 'accordions_icons', true );
	$accordions_icons_minus = get_post_meta( $post->ID, 'accordions_icons_minus', true );	

	$accordions_default_bg_color = get_post_meta( $post->ID, 'accordions_default_bg_color', true );	
	$accordions_active_bg_color = get_post_meta( $post->ID, 'accordions_active_bg_color', true );
	
	$accordions_items_title_color = get_post_meta( $post->ID, 'accordions_items_title_color', true );	
	$accordions_items_title_font_size = get_post_meta( $post->ID, 'accordions_items_title_font_size', true );
	
	$accordions_items_content_color = get_post_meta( $post->ID, 'accordions_items_content_color', true );	
	$accordions_items_content_font_size = get_post_meta( $post->ID, 'accordions_items_content_font_size', true );		
	
	$accordions_content_title = get_post_meta( $post->ID, 'accordions_content_title', true );	
	$accordions_content_body = get_post_meta( $post->ID, 'accordions_content_body', true );
	
	$accordions_hide = get_post_meta( $post->ID, 'accordions_hide', true );	
 
	$accordions_custom_css = get_post_meta( $post->ID, 'accordions_custom_css', true );	





		$accordions_customer_type = get_option('accordions_customer_type');

		if($accordions_customer_type=="free")
			{
				echo '';
      
			}


?>




    <div class="para-settings">

        <div class="option-box">
            <p class="option-title">Shortcode</p>
            <p class="option-info">Copy this shortcode and paste on page or post where you want to display accordions, Use PHP code to your themes file to display accordions.</p>
        <br /> 
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[accordions <?php echo ' id="'.$post->ID.'"';?> ]</textarea>
        <br />
        PHP Code:<br />
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[accordions id='; echo "'".$post->ID."' ]"; echo '"); ?>'; ?></textarea>  
        
        </div>
        
        
        <ul class="tab-nav">
       
            <li nav="2" class="nav2 active">Style</li>
            <li nav="3" class="nav3">Content</li>
            <li nav="4" class="nav4">Custom CSS</li>            
            
        </ul> <!-- para-tab-nav end -->
        
		<ul class="box">
            
           
            
            <li style="display: block;" class="box2 tab-box active">

				<div class="option-box">
                    <p class="option-title">Themes</p>
                    <p class="option-info"></p>
                    
                    <?php
						$class_accordions_functions = new class_accordions_functions();
						
						$accordions_themes_list = $class_accordions_functions->accordions_themes();
						
					
					
					?>
                    
                    
                    <select class="accordions_themes" name="accordions_themes"  >
                    
                    
					<?php


						
						foreach($accordions_themes_list as $theme_key => $theme_name)
							{
	
								echo '<option  value="'.$theme_key.'" ';
								
								if($accordions_themes == $theme_key ) 
									{
									echo "selected";
									}
									
								echo '>';
								
								
								echo $theme_name.'</option>';
								
							}
                    
                    ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                  
                    </select>
                </div>
                
				<div class="option-box">
                    <p class="option-title">Background Image</p>
                    <p class="option-info"></p>
					<script>
                    jQuery(document).ready(function(jQuery)
                        {
                                jQuery(".accordions_bg_img_list li").click(function()
                                    { 	
                                        jQuery('.accordions_bg_img_list li.bg-selected').removeClass('bg-selected');
                                        jQuery(this).addClass('bg-selected');
                                        
                                        var accordions_bg_img = jQuery(this).attr('data-url');
                    
                                        jQuery('#accordions_bg_img').val(accordions_bg_img);
                                        
                                    })	
                    
                                        
                        })
                    
                    </script> 
                    
            
					<?php
                    
                    
                    
                        $dir_path = accordions_plugin_dir."css/bg/";
                        $filenames=glob($dir_path."*.png*");
                    
                    
                        $accordions_bg_img = get_post_meta( $post->ID, 'accordions_bg_img', true );
                        
                        if(empty($accordions_bg_img))
                            {
                            $accordions_bg_img = "";
                            }
                    
                    
                        $count=count($filenames);
                        
                    
                        $i=0;
                        echo "<ul class='accordions_bg_img_list' >";
                    
                        while($i<$count)
                            {
                                $filelink= str_replace($dir_path,"",$filenames[$i]);
                                
                                $filelink= accordions_plugin_url."css/bg/".$filelink;
                                
                                
                                if($accordions_bg_img==$filelink)
                                    {
                                        echo '<li  class="bg-selected" data-url="'.$filelink.'">';
                                    }
                                else
                                    {
                                        echo '<li   data-url="'.$filelink.'">';
                                    }
                                
                                
                                echo "<img  width='70px' height='50px' src='".$filelink."' />";
                                echo "</li>";
                                $i++;
                            }
                            
                        echo "</ul>";
                        
                        echo "<input style='width:100%;' value='".$accordions_bg_img."'    placeholder='Please select image or left blank' id='accordions_bg_img' name='accordions_bg_img'  type='text' />";
                    
                    
                    
                    ?>
                    
                    
                    
                    
                    
                    
                </div>                
                
				<div class="option-box">
                    <p class="option-title">Icon set</p>
                    <p class="option-info"></p>
                    <?php
					
                        $dir_path = accordions_plugin_dir."css/icons/";
                        $filenames=glob($dir_path."*.png*");
                        
                        
                    
                        $accordions_icons = get_post_meta( $post->ID, 'accordions_icons', true );
                        
                        if(empty($accordions_icons))
                            {
                            $accordions_icons = "";
                            }
                    
                    
                        $count=count($filenames);
                        
                    
                        $i=0;
                        echo "<select class='accordions_icons_list' name='accordions_icons' >";
						
                        while($i<$count)
                            {
                                $filelink_name= str_replace($dir_path,"",$filenames[$i]);
                                
                                $filelink= accordions_plugin_url."css/icons/".$filelink_name;
                                
                                $icon_name = str_replace('.png', '', $filelink_name);
                                
                                if($accordions_icons==$icon_name)
                                    {
                                        echo '<option style="background:url('.$filelink.') no-repeat scroll 0 0 rgba(0, 0, 0, 0); padding-left:20px;" selected value="'.$icon_name.'">';
                                    }
                                else
                                    {
                                        echo '<option style="background:url('.$filelink.') no-repeat scroll 0 0 rgba(0, 0, 0, 0); padding-left:20px;" value="'.$icon_name.'">';
                                    }
                                
                                
        
                                echo $icon_name."</option>";
                                $i++;
                            }
                            
                        echo "</select>";
                        
        
                    
                    
                    
                    ?>
                    <?php 
					
					if($accordions_icons == 'custom')
						{
						echo '<div style="display:block;" class="accordions_icons_custom">';
						}
					else
						{
						echo '<div style="display:none;" class="accordions_icons_custom">';
						}
					
					?>
                    

                    	<span title="Minus Icon" class="accordions_icons_custom_minus" style="background-image:url(<?php if(!empty($accordions_icons_minus)) echo $accordions_icons_minus; else echo '';?>)">
                        <input type="hidden" name="accordions_icons_minus" value="<?php if(!empty($accordions_icons_minus)) echo $accordions_icons_minus; else echo '';?>" />
                        </span>

                        </div>
                    </div>
                    

				<div class="option-box">
                    <p class="option-title">Default Background Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="accordions_default_bg_color" id="accordions_default_bg_color" value="<?php if(!empty($accordions_default_bg_color)) echo $accordions_default_bg_color; else echo "#01ce6a"; ?>" />                </div>
                
				<div class="option-box">
                    <p class="option-title">Active Background Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="accordions_active_bg_color" id="accordions_active_bg_color" value="<?php if(!empty($accordions_active_bg_color)) echo $accordions_active_bg_color; else echo "#02e576"; ?>" />                </div>


				<div class="option-box">
                    <p class="option-title">Accordions Header Font Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="accordions_items_title_color" id="accordions_items_title_color" value="<?php if(!empty($accordions_items_title_color)) echo $accordions_items_title_color; else echo "#ffffff"; ?>" />                </div>


				<div class="option-box">
                    <p class="option-title">Accordions Header Font Size</p>
                    <p class="option-info"></p>
                    
                    <input type="text" name="accordions_items_title_font_size" placeholder="ex:14px number with px" id="accordions_items_title_font_size" value="<?php if(!empty($accordions_items_title_font_size)) echo $accordions_items_title_font_size; else echo "14px"; ?>" />
                    
                </div>


				<div class="option-box">
                    <p class="option-title">Accordions Content Font Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="accordions_items_content_color" id="accordions_items_content_color" value="<?php if(!empty($accordions_items_content_color)) echo $accordions_items_content_color; else echo "#333333"; ?>" />
                </div>
                

				<div class="option-box">
                    <p class="option-title">Accordions Content Font Size</p>
                    <p class="option-info"></p>
                    <input type="text" name="accordions_items_content_font_size" id="accordions_items_content_font_size" value="<?php if(!empty($accordions_items_content_font_size)) echo $accordions_items_content_font_size; else echo "13px"; ?>" />
                </div>                
                
                
                
                            
            </li>
            <li style="display: none;" class="box3 tab-box ">
				<div class="option-box">
                    <p class="option-title">Content</p>
                    <p class="option-info">You can sorting accordion by dragging * of each title, click to expand title and see the input.</p>
                    
                    <div class="accordions-content-buttons" >
                        <div class="button add-accordions">Add</div>                 
                        <br />
                    </div>
                <table width="100%" class="accordions-content" id="accordions-content">
                
                <?php
               // $total_row = count($accordions_content_title);
				
				if(empty($accordions_content_title))
					{
						$accordions_content_title = array('0'=>'Demo Title');
					}
				$i=0;
				foreach ($accordions_content_title as $index => $accordions_title)
					{
						
						if(empty($accordions_content_body[$index]))
							{
								$accordions_content_body[$index] = 'Demo Content';
							}
					
					?>
                    <tr index='<?php echo $index; ?>' valign="top">
                    
                    	<td class="section-dragHandle">&nbsp;</td>
                    
                        <td style="vertical-align:middle;">
                        <div class="section-header">
                        	<div class="accordions-title-preview">
                            <?php if(!empty($accordions_title)) echo $accordions_title; ?>
                            </div>
							
                        <span class="removeaccordions">X</span>
                        
                        <?php
                        
							if(!empty($accordions_hide[$index]))
								{
									$checked = 'checked';
								}
							else
								{
									$checked = '';
								}
						
						
						?>
                        
                        <label class="switch" title="Hide on Frontend"><input  type="checkbox" name="accordions_hide[<?php echo $index; ?>]" value="1" <?php echo $checked; ?> /> </label>
   

                        
                        </div>
                        <div class="section-panel">
                        <input width="100%" placeholder="accordions Header" type="text" name="accordions_content_title[row_<?php echo $i; ?>]" value="<?php if(!empty($accordions_title)) echo $accordions_title; ?>" />

                        
                        
<?php

	wp_editor( stripslashes($accordions_content_body[$index]), 'accordions_content_body'.$i, $settings = array('textarea_name'=>'accordions_content_body[row_'.$i.']') );


?>
                        </div>


                        
                        
                        
                        
                        
                        
                        
                        
                        </td>           
                    </tr>
                    <?php
					
					$i++;
					}
				
				?>

                     
                 </table>



<script>

	jQuery(document).ready(function() {

		// Initialise the table
		jQuery("#accordions-content").tableDnD({
			
			dragHandle: "section-dragHandle",
			});






	});

</script>




                </div>  
            </li>
        
        
            
            <li style="display: none;" class="box4 tab-box ">
				<div class="option-box">
                    <p class="option-title">Custom CSS for this Accordions</p>
                    <p class="option-info">Do not use &lt;style>&lt;/style> tag, you can use bellow prefix to your css, sometime you need use "!important" to overrid.<br/>
                    
                    <b>#accordions-<?php echo $post->ID; ?></b>
                    <br/></p>
                    
                    
                    
                    
                   	<?php
                    
					$accordions_id = $post->ID;
					
					
					$empty_css_sample = '#accordions-'.$accordions_id.'{}\n#accordions-'.$accordions_id.' .accordions-head{}\n#accordions-'.$accordions_id.' .accordion-content{}';
					
					
					?>
                    
                    
                    
                    <textarea style="width:80%; min-height:150px" name="accordions_custom_css" ><?php if(!empty($accordions_custom_css)) echo htmlentities($accordions_custom_css); else echo str_replace('\n', PHP_EOL, $empty_css_sample); ?></textarea>
                    
                    
                </div> 
            
        	</li>
        
        
        </ul>
        


    </div> <!-- para-settings -->



<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_accordions_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_accordions_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_accordions_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_accordions_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
    	  
 	 
	$accordions_bg_img = sanitize_text_field( $_POST['accordions_bg_img'] );	
	$accordions_themes = sanitize_text_field( $_POST['accordions_themes'] );
	$accordions_icons = sanitize_text_field( $_POST['accordions_icons'] );
	$accordions_icons_minus = sanitize_text_field( $_POST['accordions_icons_minus'] );			

	$accordions_default_bg_color = sanitize_text_field( $_POST['accordions_default_bg_color'] );	
	$accordions_active_bg_color = sanitize_text_field( $_POST['accordions_active_bg_color'] );


	$accordions_items_title_color = sanitize_text_field( $_POST['accordions_items_title_color'] );	
	$accordions_items_title_font_size = sanitize_text_field( $_POST['accordions_items_title_font_size'] );	

	$accordions_items_content_color = sanitize_text_field( $_POST['accordions_items_content_color'] );	
	$accordions_items_content_font_size = sanitize_text_field( $_POST['accordions_items_content_font_size'] );	
	
	$accordions_content_title = stripslashes_deep( $_POST['accordions_content_title'] );	
	$accordions_content_body = stripslashes_deep( $_POST['accordions_content_body'] );		
	
	if(empty($_POST['accordions_hide']))
		{
			$_POST['accordions_hide'] = '';	
		}
	
	$accordions_hide = stripslashes_deep( $_POST['accordions_hide'] );	
	
	$accordions_custom_css = stripslashes_deep( $_POST['accordions_custom_css'] );			


  // Update the meta field in the database.		  
 
	update_post_meta( $post_id, 'accordions_bg_img', $accordions_bg_img );	
	update_post_meta( $post_id, 'accordions_themes', $accordions_themes );
	update_post_meta( $post_id, 'accordions_icons', $accordions_icons );
	update_post_meta( $post_id, 'accordions_icons_minus', $accordions_icons_minus );	


	update_post_meta( $post_id, 'accordions_default_bg_color', $accordions_default_bg_color );
	update_post_meta( $post_id, 'accordions_active_bg_color', $accordions_active_bg_color );


	update_post_meta( $post_id, 'accordions_items_title_color', $accordions_items_title_color );
	update_post_meta( $post_id, 'accordions_items_title_font_size', $accordions_items_title_font_size );

	update_post_meta( $post_id, 'accordions_items_content_color', $accordions_items_content_color );
	update_post_meta( $post_id, 'accordions_items_content_font_size', $accordions_items_content_font_size );
	
	update_post_meta( $post_id, 'accordions_content_title', $accordions_content_title );
	update_post_meta( $post_id, 'accordions_content_body', $accordions_content_body );	
	
	update_post_meta( $post_id, 'accordions_hide', $accordions_hide );

	update_post_meta( $post_id, 'accordions_custom_css', $accordions_custom_css );



}
add_action( 'save_post', 'meta_boxes_accordions_save' );


























?>
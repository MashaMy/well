<?php
/**
 * Widgets Functions
 *
 * @since 1.0.0
 */

/**************************************************************************/
/************************ FUNCTION POST INFO ******************************/
/**************************************************************************/

function vcmegaposts_thumbs() {
	global $post;
	if(has_post_thumbnail()){ 
			$id_post = get_the_id();					
			$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'vcmegaposts-type1' );	 					 
		} else {               
             $single_image[0] = plugins_url( 'megapostsdisplayelementor/assets/img/no-img.png');                 
    }	
	$return =	'<img class="megaposts-thumbs" src="'.$single_image[0].'" alt="'.get_the_title().'">';
	return $return;
}


function vcmegaposts_format_icon() {
	$id_post = get_the_id(); 
    $format = get_post_format( $id_post );   
    if (empty($format)) { $format = 'standard'; }
	if ($format == 'standard') { $return = '<span class="fa fa-file"></span>'; }
	if ($format == 'aside') { $return = '<span class="fa fa-file-o"></span>'; }
	if ($format == 'link') { $return = '<span class="fa fa-paperclip"></span>'; }   
    if ($format == 'gallery') { $return = '<span class="fa fa-file-image-o"></span>'; }
    if ($format == 'video') { $return = '<span class="fa fa-play"></span>'; }
    if ($format == 'audio') { $return = '<span class="fa fa-headphones"></span>'; }
    if ($format == 'image') { $return = '<span class="fa fa-picture-o"></span>'; } 
    if ($format == 'quote') { $return = '<span class="fa fa-quote-left"></span>'; }
    if ($format == 'status') { $return = '<span class="fa fa-comments"></span>'; }
	
	return $return;	
}

function vcmegaposts_excerpt($excerpt) {
	$return = substr(get_the_excerpt(), 0, $excerpt);
	return $return;
}

function vcmegaposts_category($vcop_query_source,$vcop_query_posts_type) {
	$separator = ', ';
	$output = '';	
	if($vcop_query_source=='wp_posts') {
		$categories = get_the_category();
		if($categories){
			foreach($categories as $category) {
				$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",'vconepage' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
			}
		}
	} elseif($vcop_query_source=='wp_custom_posts_type') {
		global $post;
		$taxonomy_names = get_object_taxonomies( $vcop_query_posts_type );
		$term_list = wp_get_post_terms($post->ID,$taxonomy_names);
		if($term_list){
			foreach ($term_list as $tax_term) {
				$output .= '<a href="' . esc_attr(get_term_link($tax_term, $vcop_query_posts_type)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a>'.$separator;
			}
		}
	}
	$return = trim($output, $separator);
	return $return;
}

function vcmegaposts_post_info($ad_postpreview_display_date,
							 $ad_postpreview_display_comments,
						     $ad_postpreview_display_author,
						     $ad_postpreview_display_category,
						     $ad_postpreview_display_views,
						     $vcmp_query_source,
							 $vcmp_query_posts_type,
							 $date_format) {	   
		   global $post;
		   $return = '';
		   if($ad_postpreview_display_date == 'true') {
		   
		   		$return .= '<span class="admp-date"><i class="fa fa-calendar"></i>' . get_the_date($date_format) . '</span>'; 
			
		   }
		    
		   if($ad_postpreview_display_author == 'true') {	   
		   		$return .= '<span class="admp-author"><i class="fa fa-user"></i><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a></span>'; 
		   } 	
		   	   
		   if($ad_postpreview_display_comments == 'true') {
           	   
           		$return .= '<span class="admp-comments"><i class="fa fa-comments"></i><a href="'.get_comments_link().'">'.get_comments_number().'</a></span>';
		   
		   }
		    		    
		   if($ad_postpreview_display_category == 'true') {
		   		$return .= '<span class="admp-category"><i class="fa fa-tags"></i>'.vcmegaposts_category($vcmp_query_source,$vcmp_query_posts_type).'</span>'; 
		   }
			
		   if($ad_postpreview_display_views == 'true') {        
		   $return .= '<span class="admp-views"><i class="fa fa-eye"></i>'.vcmegaposts_get_post_views(get_the_ID()).'</span>';
		   }
		   
		   return $return; 		   
}



/**************************************************************************/
/******************************** RGBA ************************************/
/**************************************************************************/

function vcmegapostshex2rgb($hex) {

   $hex = str_replace("#", "", $hex);

if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
	return $rgb;
}

/**************************************************************************/
/************************** FUNCTION VIEW *********************************/
/**************************************************************************/

function vcmegaposts_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
		$view = esc_html__('Views','elementor-mega-posts-display');
        return "0";
    }
	$count_final = $count; 
    return $count_final;
}

function vcmegaposts_set_post_views() {
	if ( is_single() ) {
	global $post;
	$postID = $post->ID;	
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
	}
}
add_filter( 'wp_footer', 'vcmegaposts_set_post_views', 200000 );

/**************************************************************************/
/********************** END FUNCTION VIEW *********************************/
/**************************************************************************/



/**************************************************************************/
/************************** FUNCTION SHARE ********************************/
/**************************************************************************/


function vcmegaposts_share() {
	global $post;
	$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	
		
	$return = '<div class="adpostsnp-share">
        <div class="adpostsnp-share-item"><a target="_blank" class="fa fa-facebook-official " href="http://www.facebook.com/sharer.php?u='.get_the_permalink().'&amp;t='.get_the_title().'" title="'.esc_html__('Click to share this post on Facebook','elementor-mega-posts-display').'"></a></div>
		<div class="adpostsnp-share-item"><a target="_blank" class="fa fa-twitter-square" href="http://twitter.com/home?status='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Twitter','elementor-mega-posts-display').'"></a></div>
        <div class="adpostsnp-share-item"><a target="_blank" class="fa fa-linkedin-square" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Linkedin','elementor-mega-posts-display').'"></a></div>
    	<div class="adpostsnp-share-item"><a target="_blank" class="fa fa-pinterest-square" href="http://pinterest.com/pin/create/button/?url='.urlencode(get_permalink($post->ID)).'&media='.$pinterestimage[0].'&description='.get_the_title().'" title="'.esc_html__('Click to share this post on Pinterest','elementor-mega-posts-display').'"></a></div>
    </div>';
	
    return $return;
    
}

/************************************************************/
/*********************** GET POST TYPE **********************/
/************************************************************/
function all_post_types() {

	// Select all public post types
	$args = array(
	   'public'   => true,
	);
	
	$all_types = get_post_types($args, 'names', 'and');
	
	
	// Put them in an ordered array filtering the types you don't want
	
	$sel_types = array();
	
	foreach ($all_types as $type) {
	
		if ($type != 'attachment' && $type != 'post' && $type != 'page') { 
			$sel_types[] = $type; 
		}
		
	}
	
	
	// Return Selected Post Types Array
	$return = '';
	$return .= '<select id="vcmegaposts_post_type">';
	foreach ($sel_types as $slug) {
		$return .= '<option value="'.$slug.'">'.$slug.'</option>';	
	}
	$return .= '</select>';
	
	
	return $return;

}

/************************************************************/
/************************ WP QUERY **************************/
/************************************************************/

function vcmegaposts_query($vcmp_query_source,
					$vcmp_query_sticky_posts, 
					$vcmp_query_posts_type, 
					$vcmp_query_categories,
					$vcmp_query_order, 
					$vcmp_query_orderby, 
					$vcmp_query_pagination, 
					$vcmp_query_pagination_type,
					$vcmp_query_number, 
					$vcmp_query_posts_for_page) {
					
					if($vcmp_query_source == 'wp_custom_posts_type') {
						$vcmp_query_sticky_posts = 'allposts';
					}
					
					if($vcmp_query_sticky_posts == 'allposts') {
					
						$query = 'post_type=Post&post_status=publish&orderby='.$vcmp_query_orderby.'&order='.$vcmp_query_order.'';						
						
						// CUSTOM POST TYPE
						if($vcmp_query_source == 'wp_custom_posts_type') {
							$query .= '&post_type='.$vcmp_query_posts_type.'';
						}
						
						// CATEGORIES
						if($vcmp_query_categories != '' && !empty($vcmp_query_categories) && $vcmp_query_source == 'wp_custom_posts_type') {
							$taxonomy_names = get_object_taxonomies( $vcmp_query_posts_type );
							$query .= '&'.$taxonomy_names[0].'='.$vcmp_query_categories.'';	
						}

						if($vcmp_query_categories != '' && !empty($vcmp_query_categories) && $vcmp_query_source == 'wp_posts') {
							$query .= '&category_name='.$vcmp_query_categories.'';	
						}
							
						if($vcmp_query_pagination == 'yes') {
							$query .= '&posts_per_page='.$vcmp_query_posts_for_page.'';	
						} else {
							if($vcmp_query_number == '') { $vcmp_query_number = '-1'; }
							$query .= '&posts_per_page='.$vcmp_query_number.'';
						}
					
						// PAGINATION		
						if($vcmp_query_pagination == 'yes') {
							if ( get_query_var('paged') ) {
								$paged = get_query_var('paged');
							
							} elseif ( get_query_var('page') ) {			
								$paged = get_query_var('page');			
							} else {			
								$paged = 1;			
							}			
							$query .= '&paged='.$paged.'';
						}
						// #PAGINATION	
					
					} else {
						

						if($vcmp_query_pagination == 'yes') {
							$vcmp_query_number = $vcmp_query_posts_for_page;	
						} else {
							if($vcmp_query_number == '') { $vcmp_query_number = '-1'; }
							$vcmp_query_number = $vcmp_query_number;
						}

						// PAGINATION		
						
						if ( get_query_var('paged') ) {
							$paged = get_query_var('paged');							
						} elseif ( get_query_var('page') ) {			
							$paged = get_query_var('page');			
						} else {			
							$paged = 1;			
						}			
						
						// #PAGINATION	
											
						/* STICKY POST DA FARE ARRAY PER SCRITTURA IN ARRAY */
					
						$sticky = get_option( 'sticky_posts' );
						$sticky = array_slice( $sticky, 0, 5 );
						$query = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'orderby' 	=> $vcmp_query_orderby,
							'order' => $vcmp_query_order,
							'category_name' => $vcmp_query_categories,
							'posts_per_page' => $vcmp_query_number,
							'paged' => $paged, 
							'post__in'  => $sticky,
							'ignore_sticky_posts' => 1
						);
					
						
					}
					
					
					return $query;	
}

/************************************************************/
/******************* NUMERIC PAGINATION *********************/
/************************************************************/

function vcmegaposts_numeric_pagination($pages = '', $range = 2,$loop)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         $pages = $loop->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
	
	 $return = '';
	
     if(1 != $pages)
     {		 	
         $return .= "<div class='vcmp-pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) $return .=  "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) $return .=  "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 $return .=  ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) $return .= "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $return .=  "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         $return .=  "</div>\n";
     }
	 
	 return $return;
} 


?>
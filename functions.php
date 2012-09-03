<?php 
/**
 * Determines whether or not the user is viewing a date archive.
 *
 * @returns	True if the current page is for a date archive.
 */
function standard_is_date_archive() {
	return '' != get_query_var( 'year' ) || '' != get_query_var( 'monthnum' ) || '' != get_query_var( 'day' ) || '' != get_query_var( 'm' );
} // end standard_is_date_archive

/**
 * Generates a label for the current archive based on whether or not the user is viewing year, month, or day. Uses the
 * users date format to properly format the date.
 *
 * @returns	The label for the current archive
 */
function standard_get_date_archive_label() {

	$archive_label = '';
	
	if( '' != get_query_var( 'day' ) ) {

		$archive_label .= date( get_option( 'date_format' ), mktime(0, 0, 0, get_query_var( 'monthnum' ), get_query_var( 'day' ), get_query_var( 'year' ) ) );

	} elseif( '' != get_query_var( 'monthnum' ) ) {
	
		// This particular format is not localized. The 'date_format' uses month and year and we only need month and year.
		// The archives widget built into WordPress follows the format that we're providing see.
		// Lines 938 - 939 of general-template.php in WordPress core.
		$archive_label .= get_the_time( 'F Y' );
		
	} elseif ( '' != get_query_var( 'm' ) ) {
	
		if( strlen( get_query_var( 'm' ) ) == 6 ) {
					
			// See comment in Lines 1602 - 1604
			$archive_label .= get_the_time( 'F Y' );
		
		} else {

			$year = substr( get_query_var( 'm' ), 0, 4 );
			$month = substr( get_query_var( 'm' ), 4, 2);
			$day = substr( get_query_var( 'm' ), 6, 2 );
			
			$archive_label .= date( get_option( 'date_format' ), mktime(0, 0, 0, $month, $day, $year ) );
		
		} // end if/else
		
	} elseif( '' != get_query_var( 'year' ) ) {

		$archive_label .= get_query_var( 'year' );
		
	} // end if
	
	return $archive_label;

} // end standard_get_date_archive_label

/**
 * Returns the requested attribute from the link in the content based on the incoming
 * attributes.
 *
 * @param	$attr	The attribute to extract from the link.
 *
 * @returns			The value of the attribute or empty for none.
 */
function standard_get_link_post_format_attribute( $attr ) {

	// Get the post data. We aren't using helpers because this function
	// is called too early in the page lifecycle to call get_the_content
	// and get_the_title.
	global $post;
	$post_content = $post->post_content;
	$post_title = $post->post_title;

	$match = array();
	$result = '';
	switch ( strtolower( $attr )  ) {
		
		case 'title':
			preg_match( '/title=[\"]([^\'"]+)[\'"]/', $post_content, $match );
			$result = count( $match ) > 0 && $match[1] ? $match[1] : '';
			break;
			
		case 'href':
			preg_match( '/href=[\"]([^\'"]+)[\'"]/', $post_content, $match );
			$result = count( $match ) > 0 && $match[1] ? $match[1] : ''; 
			$result = strlen( $result ) == 0 ? $post_content : $result;
			break;
			
		case 'target':
			preg_match( '/target=[\"]([^\'"]+)[\'"]/', $post_content, $match );
			$result = count( $match ) > 0 && $match[0] ? $match[0] : '';
			break;
			
		default:
			$result = '';
			break;
		
	} // end switch
	
	return $result;

} // end standard_get_link_post_format_attribute

/**
 * Looks at the active widgets to determine whether or not the Google Custom Search widget is active.
 *
 * @returns	Whether or not the Google Custom Search is active
 */
function standard_google_custom_search_is_active() {
	
	$gcse_is_active = false;

	if( true ) { 
		foreach( ( $widgets = get_option( 'sidebars_widgets' ) ) as $key => $val ) { 
			if( is_array( $widgets[$key] ) ) {
				foreach($widgets[$key] as $widget) {
				
					// We're using 'phaned_widgets' as a subset of 'orphaned_widgets' to make sure we aren't getting the 0 index
					if( $key != 'wp_inactive_widgets' && strpos( $key, 'phaned_widgets_' ) == 0 ) {
						if( strpos( $widget, '-custom-search' ) > 0 ) {
							$gcse_is_active = true;
						} // end if
					} // end if
					
				} // end foreach
			} // end if
		} // end foreach 
	} // end if

	return $gcse_is_active;

} // end standard_google_custom_search_is_active

/**
 * Truncates string at the last breakable space within the string at the
 * character limit and then adds the truncation indicator.
 *
 * @string                   The string to possibly truncate
 * @$character_limit         The number of characters to limit the string to
 * @$truncation_indicator    The characters to end truncation with (if needed)
 */

function standard_truncate_text( $string, $character_limit = 50, $truncation_indicator = '...' ) {

	$truncated = null == $string ? '' : $string;
    if ( strlen( $string ) >= ( $character_limit + 1 ) ) {
    
        $truncated = substr( $string, 0, $character_limit );

        if ( substr_count( $truncated, ' ') > 1 ) {
            $last_space = strrpos( $truncated, ' ' );
            $truncated = substr( $truncated, 0, $last_space );
        } // end if

        $truncated = $truncated . $truncation_indicator;
        
    } // end if/else
    
    return $truncated;
    
} // end standard_truncate_text
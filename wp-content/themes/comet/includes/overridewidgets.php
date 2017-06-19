<?php

class OverrideWidgets {

	static function mi_get_search_form($echo=true){

		$format = current_theme_supports( 'html5', 'search-form' ) ? 'html5' : 'xhtml';
		$format = apply_filters( 'search_form_format', $format );

		if ( 'html5' == $format ) {
			$form = '<form role="search" method="get" id="searchform" class="s" action="' . esc_url( home_url( '/' ) ) . '">
			<div class="input-group">
			<input type="text" class="form-control search-input" placeholder="' . esc_attr_e( 'Search .','reversal' ) . '" value="' . get_search_query() . '" name="s" id="s" />
			<span class="input-group-btn">
										<button type="submit" class="btn btn-default search-button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
									</span>
			</div>
			</form>';
		} else {
			$form = '<form role="search" method="get" id="searchform" class="s" action="' . esc_url( home_url( '/' ) ) . '">
			<div class="input-group">
			<input type="text" class="form-control search-input" placeholder="' . esc_attr_e( 'Search','reversal' ) . '" value="' . get_search_query() . '" name="s" id="s" />
			<span class="input-group-btn">
										<button type="submit" class="btn btn-default search-button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
									</span>
			</div>
			</form>';
		}

		return $form;
	}

	
}
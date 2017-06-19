<?php
class CreateCustomPostType{
// 
	static function mi_create_portfolio_post_type(){
		
		register_post_type('portfolio',
				array(
						'label'=>esc_html__('Portfolio','voyo'),
						'labels'=>array(
								'add_new'=>esc_html__('Add Portfolio','voyo'),
								'add_new_item'=>esc_html__('Add Portfolio','voyo'),
								'edit_item'=>esc_html__('Portfolio Info','voyo'),
								'new_item'=>esc_html__('New Portfolio','voyo'),
								'view_item'=>esc_html__('View Portfolio','voyo'),
								'search_items'=>esc_html__('Search Portfolio','voyo'),
								'not_found'=>esc_html__('Not Found','voyo'),
								'not_found_in_trash'=>esc_html__('Not Found In Trash','voyo'),
								'menu_name'=>esc_html__('Portfolio ','voyo')
						),
						'description'=>esc_html__('Add Portfolio Information','voyo'),
						'public'=>true,
						'show_ui'=>true,
						'show_in_menu'=>true,
						'menu_position'=>5,
						'capability_type'=>'post',
						'hierarchical'=>true,
						
						'supports'=>array(
								'title','editor','author','thumbnail','page-attributes','comments'
						),
						'show_in_nav_menu'=>true
				)
		);
register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
	}
	
	static function mi_create_team_post_type(){
		
		register_post_type('team',
				array(
						'label'=>esc_html__('Team','voyo'),
						'labels'=>array(
								'add_new'=>esc_html__('Add Team Member','voyo'),
								'add_new_item'=>esc_html__('Add Team Member','voyo'),
								'edit_item'=>esc_html__('Member Info','voyo'),
								'new_item'=>esc_html__('New Member','voyo'),
								'view_item'=>esc_html__('View Team Member','voyo'),
								'search_items'=>esc_html__('Search Team Member','voyo'),
								'not_found'=>esc_html__('Not Found','voyo'),
								'not_found_in_trash'=>esc_html__('Not Found In Trash','voyo'),
								'menu_name'=>esc_html__('Team ','voyo')
						),
						'description'=>esc_html__('Add Team Information','voyo'),
						'public'=>true,
						'show_ui'=>true,
						'show_in_menu'=>true,
						'menu_position'=>5,
						'capability_type'=>'post',
						'hierarchical'=>true,
						
						'supports'=>array(
								'title','editor','author','thumbnail','page-attributes','comments'
						),
						'show_in_nav_menu'=>true
				)
		);
register_taxonomy('team_category', 'team', array('hierarchical' => true, 'label' => 'Member Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
	}
	
}
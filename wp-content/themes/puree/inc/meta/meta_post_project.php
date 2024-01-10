<?php

class Meta_Post_Project {

	public static function init() {
		add_action( 'init', array( __CLASS__, 'definition' ) );
		add_filter( 'rwmb_meta_boxes', array( __CLASS__, 'register_meta_boxes') );
	}

	public static function definition() {
		$args = [
			'label'  => esc_html__( 'Projects', 'text-domain' ),
			'labels' => [
				'menu_name'          => esc_html__( 'Projects', 'qubick-id' ),
				'name_admin_bar'     => esc_html__( 'Project', 'qubick-id' ),
				'add_new'            => esc_html__( 'Add Project', 'qubick-id' ),
				'add_new_item'       => esc_html__( 'Add New Project', 'qubick-id' ),
				'new_item'           => esc_html__( 'New Project', 'qubick-id' ),
				'edit_item'          => esc_html__( 'Edit Project', 'qubick-id' ),
				'view_item'          => esc_html__( 'View Project', 'qubick-id' ),
				'update_item'        => esc_html__( 'View Project', 'qubick-id' ),
				'all_items'          => esc_html__( 'All Projects', 'qubick-id' ),
				'search_items'       => esc_html__( 'Search Projects', 'qubick-id' ),
				'parent_item_colon'  => esc_html__( 'Parent Project', 'qubick-id' ),
				'not_found'          => esc_html__( 'No Projects found', 'qubick-id' ),
				'not_found_in_trash' => esc_html__( 'No Projects found in Trash', 'qubick-id' ),
				'name'               => esc_html__( 'Projects', 'qubick-id' ),
				'singular_name'      => esc_html__( 'Project', 'qubick-id' ),
			],
			'public'              => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'show_in_rest'        => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite_no_front'    => false,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-list-view',
			'supports' => [
				'title',
				'thumbnail',
			],
			'categories'	=> array(),
			'rewrite' => true,
		];

		register_post_type( 'project', $args );



        register_taxonomy( 'project-category', array( 'project' ), 
			array(
				'hierarchical'	=> true,
				'labels'		=> array(
					'name'			=> 'Project Category',
					'singular_name'	=> 'Project Category',
				),
			)
		);

	}


	public static function register_meta_boxes() {
		$prefix = 'project_';
		$meta_boxes[] = array(
			'id'		=> 'detail',
			'title'		=> 'Detail',
			'post_types'=> 'project',
			'context'	=> 'normal',
			'priority'	=> 'high',
			'fields' => [
				[
	                'type' => 'text',
	                'name' => esc_html__( 'Project Title', 'qubick' ),
	                'id'   => $prefix . 'project_title',
	            ],
	            [
	                'type' => 'text',
	                'name' => esc_html__( 'Year', 'qubick' ),
	                'id'   => $prefix . 'project_year',
	            ],
				[
	                'type' => 'wysiwyg',
	                'name' => esc_html__( 'Description', 'qubick' ),
	                'id'   => $prefix . 'Description',
					'raw'  => true,
	            ],
				[
	                'type' => 'text',
	                'name' => esc_html__( 'See Live Label', 'qubick' ),
	                'id'   => $prefix . 'see_live_label',
	            ],
	            [
	                'type' => 'text',
	                'name' => esc_html__( 'See Live Link', 'qubick' ),
	                'id'   => $prefix . 'see_live_link',
	            ],
	            [
	                'type' => 'single_image',
	                'name' => esc_html__( 'Header Image Top', 'qubick' ),
	                'id'   => $prefix . 'header_image_top',
	            ],
	            [
	                'type' => 'single_image',
	                'name' => esc_html__( 'Header Image Left', 'qubick' ),
	                'id'   => $prefix . 'header_image_left',
	            ],
	            [
	                'type' => 'single_image',
	                'name' => esc_html__( 'Header Image Right', 'qubick' ),
	                'id'   => $prefix . 'header_image_Right',
	            ],
	            [
	                'type' => 'single_image',
	                'name' => esc_html__( 'Image Next to Text', 'qubick' ),
	                'id'   => $prefix . 'image_next_to_text',
	            ],
	            [
	            	'type'	=> 'image_advanced',
	            	'name'	=> esc_html__( 'Slider Image', 'qubick' ),
	            	'id'	=> 'campaign_gallery',
	            	'max_status' => 'false',
	            	'image_size' => 'thumbnail',
					'multiple' => false,
	            	'clone' => false,
	            ],
	            [
	                'type' => 'single_image',
	                'name' => esc_html__( 'After Slider Image', 'qubick' ),
	                'id'   => $prefix . 'image_1',
	            ],
			],
		);


		return $meta_boxes;
	}
}

Meta_Post_Project::init();
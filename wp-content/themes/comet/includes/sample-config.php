<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux_Framework_sample_config_mi' ) ) {

        class Redux_Framework_sample_config_mi {

            public $args = array();
            public $sections = array();
            public $theme;
            public $ReduxFramework;

            public function __construct() {

                if ( ! class_exists( 'ReduxFramework' ) ) {
                    return;
                }

                // This is needed. Bah WordPress bugs.  ;)
                if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                    $this->initSettings();
                } else {
                    add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
                }

            }

            public function initSettings() {

                // Just for demo purposes. Not needed per say.
                $this->theme = wp_get_theme();

                // Set the default arguments
                $this->setArguments();

                // Set a few help tabs so you can see how it's done
                $this->setHelpTabs();

                // Create the sections and fields
                $this->setSections();

                if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                    return;
                }

                // If Redux is running as a plugin, this will remove the demo notice and links
                add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

                // Function to test the compiler hook and demo CSS output.
                // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
                //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);

                // Change the arguments after they've been declared, but before the panel is created
                //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );

                // Change the default value of a field after it's been set, but before it's been useds
                //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );

                // Dynamically add a section. Can be also used to modify sections/fields
                //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

                $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
            }

            /**
             * This is a test function that will let you see when the compiler hook occurs.
             * It only runs if a field    set with compiler=>true is changed.
             * */
            function compiler_action( $options, $css, $changed_values ) {
                echo '<h1>The compiler hook has run!</h1>';
                echo "<pre>";
                print_r( $changed_values ); // Values that have changed since the last save
                echo "</pre>";
                //print_r($options); //Option values
                //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

                /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
             */
            }

            /**
             * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
             * Simply include this function in the child themes functions.php file.
             * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
             * so you must use get_template_directory_uri() if you want to use any of the built in icons
             * */
            function dynamic_section( $sections ) {
                //$sections = array();
                $sections[] = array(
                    'title'  => __( 'Section via hook', 'reversal' ),
                    'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'reversal' ),
                    'icon'   => 'el-icon-paper-clip',
                    // Leave this as a blank section, no options just some intro text set above.
                    'fields' => array()
                );

                return $sections;
            }

            /**
             * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
             * */
            function change_arguments( $args ) {
                //$args['dev_mode'] = true;

                return $args;
            }

            /**
             * Filter hook for filtering the default value of any given field. Very useful in development mode.
             * */
            function change_defaults( $defaults ) {
                $defaults['str_replace'] = 'Testing filter hook!';

                return $defaults;
            }

            // Remove the demo link and the notice of integrated demo from the redux-framework plugin
            function remove_demo() {

                // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
                if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                    remove_filter( 'plugin_row_meta', array(
                        ReduxFrameworkPlugin::instance(),
                        'plugin_metalinks'
                    ), null, 2 );

                    // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                    remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
                }
            }

            public function setSections() {

                /**
                 * Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
                 * */
                // Background Patterns Reader
                $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
                $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
                $sample_patterns      = array();

                if ( is_dir( $sample_patterns_path ) ) :

                    if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
                        $sample_patterns = array();

                        while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                            if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                                $name              = explode( '.', $sample_patterns_file );
                                $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                                $sample_patterns[] = array(
                                    'alt' => $name,
                                    'img' => $sample_patterns_url . $sample_patterns_file
                                );
                            }
                        }
                    endif;
                endif;

                ob_start();

                $ct          = wp_get_theme();
                $this->theme = $ct;
                $item_name   = $this->theme->get( 'Name' );
                $tags        = $this->theme->Tags;
                $screenshot  = $this->theme->get_screenshot();
                $class       = $screenshot ? 'has-screenshot' : '';

                $customize_title = sprintf( __( 'Customize &#8220;%s&#8221;', 'reversal' ), $this->theme->display( 'Name' ) );

                ?>
                <div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
                    <?php if ( $screenshot ) : ?>
                        <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
                            <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize"
                               title="<?php echo esc_attr( $customize_title ); ?>">
                                <img src="<?php echo esc_url( $screenshot ); ?>"
                                     alt="<?php esc_attr_e( 'Current theme preview', 'reversal' ); ?>"/>
                            </a>
                        <?php endif; ?>
                        <img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>"
                             alt="<?php esc_attr_e( 'Current theme preview', 'reversal' ); ?>"/>
                    <?php endif; ?>

                    <h4><?php echo $this->theme->display( 'Name' ); ?></h4>

                    <div>
                        <ul class="theme-info">
                            <li><?php printf( __( 'By %s', 'reversal' ), $this->theme->display( 'Author' ) ); ?></li>
                            <li><?php printf( __( 'Version %s', 'reversal' ), $this->theme->display( 'Version' ) ); ?></li>
                            <li><?php echo '<strong>' . __( 'Tags', 'reversal' ) . ':</strong> '; ?><?php printf( $this->theme->display( 'Tags' ) ); ?></li>
                        </ul>
                        <p class="theme-description"><?php echo $this->theme->display( 'Description' ); ?></p>
                        <?php
                            if ( $this->theme->parent() ) {
                                printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'reversal' ) . '</p>', __( 'http://codex.wordpress.org/Child_Themes', 'reversal' ), $this->theme->parent()->display( 'Name' ) );
                            }
                        ?>

                    </div>
                </div>

                <?php
                $item_info = ob_get_contents();

                ob_end_clean();

                $sampleHTML = '';
                if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
                    Redux_Functions::initWpFilesystem();

                    global $wp_filesystem;

                    $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
                }

                // ACTUAL DECLARATION OF SECTIONS
                $this->sections[] = array(
                    'title'  => __( 'General Settings', 'reversal' ),
                    'desc'   => __( 'Redux Framework was created with the developer in mind. It allows for any theme developer to have an advanced theme panel with most of the features a developer would need. For more information check out the Github repo at: <a href="https://github.com/ReduxFramework/Redux-Framework">https://github.com/ReduxFramework/Redux-Framework</a>', 'reversal' ),
                    'icon'   => 'el-icon-home',
                    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                    'fields' => array(

                    array(
							'id' => 'logopic',
							'type' => 'media',
							'compiler' => 'true',
							'title' => __('Upload Logo', 'reversal'),
							'subtitle' => __('Upload a Logo not More than 121px x 40px .png or .gif image that will be your or Admin Picture.', 'reversal')
					),                    

					array(
							'id' => 'favicon',
							'type' => 'media',
							'title' => __('Favicon Upload', 'reversal'),
							'subtitle' => __('Upload a 16px x 16px .png or .gif image that will be your favicon.', 'reversal'),
							'compiler' => 'true'
					),
                    array(
                            'id' => 'hlogo',
                            'type' => 'media',
                            'title' => __('Section Header Logo', 'reversal'),
                            'subtitle' => __('Upload a 22px x 26px .png or .gif image that will be your Section Header Logo / Icon.', 'reversal'),
                            'compiler' => 'true'
                    ),

                    array(
                            'id' => 'slider_style',
                            'type' => 'select',
                            'title' => __('Select Slider With Menu Style', 'reversal'),
                            'subtitle' => __('Select Slider Style', 'reversal'),
                            'options' => array(
                                    'main'=> __('Main Style', 'reversal'),
                                    'slider2' => __('2nd Style', 'reversal'),
                                    'slider3' => __('3rd Style', 'reversal'),
                                    'slider4' => __('4th Style', 'reversal'),
                                    'slider5' => __('5th Style', 'reversal'),
                                                        
                            ),
                            'main'  => 'Main Slider'
                    ),

					array(
							'id' => 'style_switcher',
							'type' => 'select',
							'title' => __('Select Website Color', 'reversal'),
							'subtitle' => __('Select Your Website Color Css File.', 'reversal'),
							'options' => array(
                                    'sun'=> __('Deault/Sun', 'reversal'),
									'blue' => __('Blue', 'reversal'),
                                    'turquoiseblue' => __('Turquoise Blue', 'reversal'),
									'green' => __('Green', 'reversal'),
									'lightorange' => __('Light Orange', 'reversal'),
									'orange' => __('Orange', 'reversal'),
									'pink' => __('Pink', 'reversal'),
									'red' => __('Red', 'reversal'),									
                                    'violet' => __('Violet', 'reversal'),
                                    'vividora' => __('Vividora', 'reversal'),					
							),
							'sun'  => 'Deault/Sun'
					),

                    array(
                            'id' => 'footerlogopic',
                            'type' => 'media',
                            'compiler' => 'true',
                            'title' => __('Upload Footer Logo', 'reversal'),
                            'subtitle' => __('Upload a footer Logo not More than 151px x 50px .png or .gif image that will be your or Admin Picture.', 'reversal')
                    ),
					
					array(
							'id' => 'footercopyright',
							'type' => 'textarea',
							'title' => __('Footer Copyright Text', 'reversal'),
							'subtitle' => __('Write Footer copyright Text here', 'reversal'),
							'validate' => 'Copyright 2010 - 2014 abusinesstheme'
					),

                    array(
                            'id' => 'footercopyrightau',
                            'type' => 'text',
                            'title' => __('Footer Copyright Author Name', 'reversal'),
                            'subtitle' => __('Write Footer copyright Auther Name here', 'reversal'),
                            'validate' => 'Webpentagon'
                    ),

                    array(
                            'id' => 'footercopyrightaulink',
                            'type' => 'text',
                            'title' => __('Footer Copyright Author Link/url', 'reversal'),
                            'subtitle' => __('Write Footer copyright Auther Link / url here', 'reversal'),
                            'validate' => '#'
                    ),

                    					
					array(
							'id' => 'fb',
							'type' => 'select',
							
							'title' => __('Facebook social Icon:', 'reversal'),
							'subtitle' => __('Do you want fb social icon in footer.', 'reversal'),
							'desc' => '',
							'options' => array(
									'yes' => __('Yes', 'reversal'),
									'no'=> __('NO', 'reversal'),
					
							),
							'default'  => 'yes'
							
					),
										
					array(
							'id' => 'tw',
							'type' => 'select',
							'title' => __('Twitter social Icon:', 'reversal'),
							'subtitle' => __('Do you want Twitter social icon in footer.', 'reversal'),
							'desc' => '',
							'options' => array(
									'yes' => __('Yes', 'reversal'),
									'no'=> __('NO', 'reversal'),
							),
							'default'  => 'yes'
					),

                    array(
                            'id' => 'dr',
                            'type' => 'select',
                            'title' => __('Dribble social Icon:', 'reversal'),
                            'subtitle' => __('Do you want Dribble social icon in footer.', 'reversal'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'reversal'),
                                    'no'=> __('NO', 'reversal'),
                    
                            ),
                            'default'  => 'no'
                    ),
					
                    array(
                            'id' => 'pin',
                            'type' => 'select',
                            'title' => __('Pinterest social Icon:', 'reversal'),
                            'subtitle' => __('Do you want Pinterest social icon in footer.', 'reversal'),
                            'desc' => '',
                            'options' => array(
                                    'no'=> __('NO', 'reversal'),
                                    'yes' => __('Yes', 'reversal'),
                            ),
                            'default'  => 'no'
                    ),

                    array(
                            'id' => 'in',
                            'type' => 'select',
                            'next_to_hide'=>1,
                            'title' => __('LinkedIn social Icon:', 'reversal'),
                            'subtitle' => __('Do you want In social icon in footer.', 'reversal'),
                            'desc' => '',
                            'options' => array(
                                    'yes' => __('Yes', 'reversal'),
                                    'no'=> __('NO', 'reversal'),
                    
                            ),
                            'default'  => 'no'
                    ),

					array(
							'id' => 'g',
							'type' => 'select',
							'title' => __('Google+ social Icon:', 'reversal'),
							'subtitle' => __('Do you want Google+ social icon in footer.', 'reversal'),
							'desc' => '',
							'options' => array(
									'yes' => __('Yes', 'reversal'),
									'no'=> __('NO', 'reversal'),
					
							),
							'default'  => 'no'
					),
					
                    array(
                            'id' => 'yt',
                            'type' => 'select',
                            'title' => __('YouTube social Icon:', 'reversal'),
                            'subtitle' => __('Do you want YouTube social icon in footer.', 'reversal'),
                            'desc' => '',
                            'options' => array(
                                    'no'=> __('NO', 'reversal'),
                                    'yes' => __('Yes', 'reversal'),
                            ),
                            'default'  => 'no'
                    ),

                    array(
                            'id' => 'db',
                            'type' => 'select',
                            'title' => __('Dropbox social Icon:', 'reversal'),
                            'subtitle' => __('Do you want Dropbox social icon in footer.', 'reversal'),
                            'desc' => '',
                            'options' => array(
                                    'no'=> __('NO', 'reversal'),
                                    'yes' => __('Yes', 'reversal'),
                            ),
                            'default'  => 'no'
                    ),

                    array(
                            'id' => 'sk',
                            'type' => 'select',
                            'title' => __('Skype social Icon:', 'reversal'),
                            'subtitle' => __('Do you want Skype social icon in footer.', 'reversal'),
                            'desc' => '',
                            'options' => array(
                                    'no'=> __('NO', 'reversal'),
                                    'yes' => __('Yes', 'reversal'),
                            ),
                            'default'  => 'no'
                    ),

					array(
							'id' => 'flc',
							'type' => 'select',
							'title' => __('Flickr social Icon:', 'reversal'),
							'subtitle' => __('Do you want Flickr social icon in footer.', 'reversal'),
							'desc' => '',
							'options' => array(
									'no'=> __('NO', 'reversal'),
									'yes' => __('Yes', 'reversal'),
							),
							'default'  => 'no'
					),
					
					
				  )
                );

                $this->sections[] = array(
                    'type' => 'divide',
                );

                $this->sections[] = array(
                    'icon'   => 'el-icon-cogs',
                    'title'  => __( 'Social Links Options', 'reversal' ),
                    'fields' => array(
						array(
							'id' => 'fblink',
							'type' => 'text',
							'title' => __('Facebbok Link ', 'reversal'),
							'subtitle' => __('Write a Fb link text of your WebSite', 'reversal'),
							'validate' => 'url'
							
					),
					array(
							'id' => 'twlink',
							'type' => 'text',
							'title' => __('Twitter Link', 'reversal'),
							'subtitle' => __('Write a Twitter Link text of your WebSite', 'reversal'),
							'validate' => 'url'
					),
					array(
							'id' => 'drlink',
							'type' => 'text',
							'title' => __('Dribble Link', 'reversal'),
							'subtitle' => __('Write a Dribble Link text of your WebSite', 'reversal'),
							'validate' => 'url'
					),
					array(
							'id' => 'pinlink',
							'type' => 'text',
							'title' => __('Pinterest Link', 'reversal'),
							'subtitle' => __('Write a Pinterest Link text of your WebSite', 'reversal'),
							'validate' => 'url'
					),
					array(
							'id' => 'inlink',
							'type' => 'text',
							'title' => __('LinkedIn Link', 'reversal'),
							'subtitle' => __('Write a LinkedIn Link text of your WebSite', 'reversal'),
							'validate' => 'url'
					),
					array(
							'id' => 'glink',
							'type' => 'text',
							'title' => __('Google+ Link', 'reversal'),
							'subtitle' => __('Write a Google+ Link text of your WebSite', 'reversal'),
							'validate' => 'url'
					),
                    array(
                            'id' => 'ytlink',
                            'type' => 'text',
                            'title' => __('Youtube Link', 'reversal'),
                            'subtitle' => __('Write a Youtube Link text of your WebSite', 'reversal'),
                            'validate' => 'url'
                    ),
                    array(
                            'id' => 'dblink',
                            'type' => 'text',
                            'title' => __('DropBox Link', 'reversal'),
                            'subtitle' => __('Write a DropBox Link text of your WebSite', 'reversal'),
                            'validate' => 'url'
                    ),
					array(
							'id' => 'sklink',
							'type' => 'text',
							'title' => __('Skype Link', 'reversal'),
							'subtitle' => __('Write a Skype Link text of your WebSite', 'reversal'),
							'validate' => 'url'
					),
					array(
							'id' => 'flclink',
							'type' => 'text',
							'title' => __('Flickr Link', 'reversal'),
							'subtitle' => __('Write a Flickr Link text of your WebSite', 'reversal'),
							'validate' => 'url'
					),
					
                    )
                );
                

                $this->sections[] = array(
                    'icon'   => 'el-icon-list-alt',
                    'title'  => __( 'Slider Style 1, 2 & 3', 'reversal' ),
                    'heading' => __( 'ALL Slider Style 1 Options Here.', 'reversal' ),
                    'fields' => array(

                       array(
                            'id'       => 'section-media-checkbox1',
                            'type'     => 'switch',
                            'title'    => __( 'Slider Section 1 Show', 'reversal' ),
                            'subtitle' => __( 'With the "section" field you can Enabled and create Slider section 1.', 'reversal' ),
                            'on' => 'Enabled',
                            'off' => 'Disabled',
                        ),

                        array(
                                'id' => 'sliderimage11',
                                'type' => 'media',
                                'title' => __('Slider 1 Image :', 'reversal'),
                                'subtitle' => __('Upload 1st Slider Image for One Page.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox1', "=", 1 ),
                        ),

                        array(
                                'id' => 'slidertxt11',
                                'type' => 'text',
                                'title' => __('Slider 1 Headline :', 'reversal'),
                                'subtitle' => __('Write Slider Style 1 Headline.', 'reversal'),
                                'default'  => 'We Are Reversal',
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox1', "=", 1 ),
                        ),

                        array(
                                'id' => 'slidertxt12',
                                'type' => 'text',
                                'title' => __('Slider 1 Content :', 'reversal'),
                                'subtitle' => __('Write Slider Style 1 Content.', 'reversal'),
                                'default'  => '2015 BRAND POSITIONING IDENTITY DESIGN VISUAL DESIGN',
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox1', "=", 1 ),
                        ),

                        array(
                                'id' => 'sliderbtn11',
                                'type' => 'text',
                                'title' => __('Slider 1 Button Content :', 'reversal'),
                                'subtitle' => __('Write Slider Style 1 Button Content.', 'reversal'),
                                'default'  => 'Lets Started',
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox1', "=", 1 ),
                        ),

                        array(
                                'id' => 'sliderbtn12',
                                'type' => 'text',
                                'title' => __('Slider 1 Button Link :', 'reversal'),
                                'subtitle' => __('Write Slider Style 1 Button Link.', 'reversal'),
                                'default'  => '#about',
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox1', "=", 1 ),
                        ),
                        
                        array(
                            'id'       => 'section-media-checkbox2',
                            'type'     => 'switch',
                            'title'    => __( 'Slider Section 2 Show', 'reversal' ),
                            'subtitle' => __( 'With the "section" field you can Enabled and create Slider section 2.', 'reversal' ),
                            'on' => 'Enabled',
                            'off' => 'Disabled',
                        ),

                        array(
                                'id' => 'sliderimage12',
                                'type' => 'media',
                                'title' => __('Slider 2 Image :', 'reversal'),
                                'subtitle' => __('Upload 1st Slider Image for One Page.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox2', "=", 1 ),
                        ),

                        array(
                                'id' => 'slidertxt21',
                                'type' => 'text',
                                'title' => __('Slider 2 Headline :', 'reversal'),
                                'subtitle' => __('Write Slider Style 2 Headline.', 'reversal'),
                                'default'  => 'A Digital Design Agency',
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox2', "=", 1 ),
                        ),

                        array(
                                'id' => 'slidertxt22',
                                'type' => 'text',
                                'title' => __('Slider 2 Content :', 'reversal'),
                                'subtitle' => __('Write Slider Style 2 Content.', 'reversal'),
                                'default'  => '2015 BRAND POSITIONING IDENTITY DESIGN VISUAL DESIGN',
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox2', "=", 1 ),
                        ),

                        array(
                                'id' => 'sliderbtn21',
                                'type' => 'text',
                                'title' => __('Slider 2 Button Content :', 'reversal'),
                                'subtitle' => __('Write Slider Style 2 Button Content.', 'reversal'),
                                'default'  => 'Lets Started',
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox2', "=", 1 ),
                        ),

                        array(
                                'id' => 'sliderbtn22',
                                'type' => 'text',
                                'title' => __('Slider 2 Button Link :', 'reversal'),
                                'subtitle' => __('Write Slider Style 2 Button Link.', 'reversal'),
                                'default'  => '#about',
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox2', "=", 1 ),
                        ),

                        array(
                            'id'       => 'section-media-checkbox3',
                            'type'     => 'switch',
                            'title'    => __( 'Slider Section 3 Show', 'reversal' ),
                            'subtitle' => __( 'With the "section" field you can Enabled and create Slider section 3.', 'reversal' ),
                            'on' => 'Enabled',
                            'off' => 'Disabled',
                        ),

                        array(
                                'id' => 'sliderimage13',
                                'type' => 'media',
                                'title' => __('Slider 3 Image :', 'reversal'),
                                'subtitle' => __('Upload third Slider Image for One Page.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox3', "=", 1 ),
                        ),

                        array(
                                'id' => 'slidertxt31',
                                'type' => 'text',
                                'title' => __('Slider 3 Headline :', 'reversal'),
                                'subtitle' => __('Write Slider Style 3 Headline.', 'reversal'),
                                'default'  => 'Creative Coders',
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox3', "=", 1 ),
                        ),

                        array(
                                'id' => 'slidertxt32',
                                'type' => 'text',
                                'title' => __('Slider 3 Content :', 'reversal'),
                                'subtitle' => __('Write Slider Style 3 Content.', 'reversal'),
                                'default'  => '2015 BRAND POSITIONING IDENTITY DESIGN VISUAL DESIGN',
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox3', "=", 1 ),
                        ),

                        array(
                                'id' => 'sliderbtn31',
                                'type' => 'text',
                                'title' => __('Slider 2 Button Content :', 'reversal'),
                                'subtitle' => __('Write Slider Style 3 Button Content.', 'reversal'),
                                'default'  => 'Lets Started',
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox3', "=", 1 ),
                        ),

                        array(
                                'id' => 'sliderbtn32',
                                'type' => 'text',
                                'title' => __('Slider 3 Button Link :', 'reversal'),
                                'subtitle' => __('Write Slider Style 3 Button Link.', 'reversal'),
                                'default'  => '#about',
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-checkbox3', "=", 1 ),
                        ),                                               
                                                                                                 
                    )
                );

                

                $this->sections[] = array(
                    'icon'   => 'el-icon-list-alt',
                    'title'  => __( 'Slider Style 4', 'reversal' ),
                    'heading' => __( 'ALL Slider Style 4 Related Options Here.', 'reversal' ),
                    'fields' => array(
                        array(
                            'id'       => 'section-media-slider41',
                            'type'     => 'switch',
                            'title'    => __( 'Section Show', 'reversal' ),
                            'subtitle' => __( 'If you want to show Image Slider Section Please press button Enabled', 'reversal' ),
                            'on' => 'Enabled',
                            'off' => 'Disabled',
                        ),

                        array(
                                'id' => 'sliderimage41',
                                'type' => 'media',
                                'title' => __('Slider Image 1:', 'reversal'),
                                'subtitle' => __('Upload 1st Image for this Slider.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-slider41', "=", 1 ),
                        ),

                        array(
                                'id' => 'sliderimage42',
                                'type' => 'media',
                                'title' => __('Slider Image 2:', 'reversal'),
                                'subtitle' => __('Upload 2nd Image for this Slider.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-slider41', "=", 1 ),
                        ),

                        array(
                                'id' => 'sliderimage43',
                                'type' => 'media',
                                'title' => __('Slider Image 3:', 'reversal'),
                                'subtitle' => __('Upload 3rd Image for this Slider.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-slider41', "=", 1 ),
                        ),

                        array(
                                'id' => 'sliderimage44',
                                'type' => 'media',
                                'title' => __('Slider Image 4:', 'reversal'),
                                'subtitle' => __('Upload 4th Image for this Slider.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-slider41', "=", 1 ),
                        ),

                        array(
                                'id' => 'sliderimage45',
                                'type' => 'media',
                                'title' => __('Slider Image 5:', 'reversal'),
                                'subtitle' => __('Upload 5th Image for this Slider.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'required' => array( 'section-media-slider41', "=", 1 ),
                        ),

                        
                        array(
                            'id'       => 'section-media-text41',
                            'type'     => 'switch',
                            'title'    => __( 'Section Show', 'reversal' ),
                            'subtitle' => __( 'If you want to show 1st Slider Content Section Please press button Enabled', 'reversal' ),
                            'on' => 'Enabled',
                            'off' => 'Disabled',
                        ),

                        array(
                                'id' => 'slidertext41',
                                'type' => 'textarea',
                                'title' => __('Slider Text 1:', 'reversal'),
                                'subtitle' => __('Write Slider Text Here.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => 'WELCOME TO <span>REVERSAL</span><br> WE <span>LIKE</span> REVERSAL',
                                'required' => array( 'section-media-text41', "=", 1 ),
                        ),
                                            
                        array(
                            'id'       => 'section-media-text42',
                            'type'     => 'switch',
                            'title'    => __( 'Section Show', 'reversal' ),
                            'subtitle' => __( 'If you want to show 2nd Slider Content Section Please press button Enabled', 'reversal' ),
                            'on' => 'Enabled',
                            'off' => 'Disabled',
                        ),

                        array(
                                'id' => 'slidertext42',
                                'type' => 'textarea',
                                'title' => __('Slider Text 2:', 'reversal'),
                                'subtitle' => __('Write Slider Text Here.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => 'WELCOME TO <span>REVERSAL</span><br> WE <span>LIKE</span> REVERSAL',
                                'required' => array( 'section-media-text42', "=", 1 ),
                        ),

                        array(
                            'id'       => 'section-media-text43',
                            'type'     => 'switch',
                            'title'    => __( 'Section Show', 'reversal' ),
                            'subtitle' => __( 'If you want to show Third Slider Content Section Please press button Enabled', 'reversal' ),
                            'on' => 'Enabled',
                            'off' => 'Disabled',
                        ),

                        array(
                                'id' => 'slidertext43',
                                'type' => 'textarea',
                                'title' => __('Slider Text 3:', 'reversal'),
                                'subtitle' => __('Write Slider Text Here.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => 'WELCOME TO <span>REVERSAL</span><br> WE <span>LIKE</span> REVERSAL',
                                'required' => array( 'section-media-text43', "=", 1 ),
                        ),

                        array(
                                'id' => 'botcontent',
                                'type' => 'text',
                                'title' => __('Slider Bottom Content :', 'reversal'),
                                'subtitle' => __('Write Slider Bottom Content', 'reversal'),
                                'default'  => 'It is a long established fact that a reader will be distracted by the readable content of a page.',
                        ),

                        array(
                                'id' => 'buttontext4',
                                'type' => 'text',
                                'title' => __('Button Content :', 'reversal'),
                                'subtitle' => __('Write Button Content Here.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => 'Get Started',
                        ),

                        array(
                                'id' => 'buttonlink4',
                                'type' => 'text',
                                'title' => __('Button Link :', 'reversal'),
                                'subtitle' => __('Write Button Link Here.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => '#home',
                        ),
                                                                         
                    )
                );

                $this->sections[] = array(
                    'icon'   => 'el-icon-list-alt',
                    'title'  => __( 'Video Slider Style', 'reversal' ),
                    'heading' => __( 'ALL Video Slider Style Related Options Here.', 'reversal' ),
                    'fields' => array(
                        array(
                            'id'       => 'section-media-slider51',
                            'type'     => 'switch',
                            'title'    => __( 'Section Show For Video', 'reversal' ),
                            'subtitle' => __( 'If you want to show Video Background Slider Section Please press button Enabled', 'reversal' ),
                            'on' => 'Enabled',
                            'off' => 'Disabled',
                        ),

                        array(
                                'id' => 'slidervideo51',
                                'type' => 'text',
                                'title' => __('Slider Video Link:', 'reversal'),
                                'subtitle' => __('Write Background Video Link here.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => 'https://www.youtube.com/watch?v=V6_85cSOIcE',
                                'required' => array( 'section-media-slider51', "=", 1 ),
                        ),
                                                
                        array(
                            'id'       => 'section-media-text51',
                            'type'     => 'switch',
                            'title'    => __( 'Section Show ', 'reversal' ),
                            'subtitle' => __( 'If you want to show 1st Slider Content Please press button Enabled', 'reversal' ),
                            'on' => 'Enabled',
                            'off' => 'Disabled',
                        ),

                        array(
                                'id' => 'slidertext51',
                                'type' => 'textarea',
                                'title' => __('Slider Text 1:', 'reversal'),
                                'subtitle' => __('Write Slider Text Here.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => 'WELCOME TO <span>REVERSAL</span><br> WE <span>LIKE</span> REVERSAL',
                                'required' => array( 'section-media-text51', "=", 1 ),
                        ),
                                            
                        array(
                            'id'       => 'section-media-text52',
                            'type'     => 'switch',
                            'title'    => __( 'Section Show', 'reversal' ),
                            'subtitle' => __( 'If you want to show 2nd Slider Content Please press button Enabled', 'reversal' ),
                            'on' => 'Enabled',
                            'off' => 'Disabled',
                        ),

                        array(
                                'id' => 'slidertext52',
                                'type' => 'textarea',
                                'title' => __('Slider Text 2:', 'reversal'),
                                'subtitle' => __('Write Slider Text Here.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => 'WELCOME TO <span>REVERSAL</span><br> WE <span>LIKE</span> REVERSAL',
                                'required' => array( 'section-media-text52', "=", 1 ),
                        ),

                        array(
                            'id'       => 'section-media-text53',
                            'type'     => 'switch',
                            'title'    => __( 'Section Show', 'reversal' ),
                            'subtitle' => __( 'If you want to show 3rd Slider Content Please press button Enabled', 'reversal' ),
                            'on' => 'Enabled',
                            'off' => 'Disabled',
                        ),

                        array(
                                'id' => 'slidertext53',
                                'type' => 'textarea',
                                'title' => __('Slider Text 3:', 'reversal'),
                                'subtitle' => __('Write Slider Text Here.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => 'WELCOME TO <span>REVERSAL</span><br> WE <span>LIKE</span> REVERSAL',
                                'required' => array( 'section-media-text53', "=", 1 ),
                        ),

                        array(
                                'id' => 'botcontent5',
                                'type' => 'text',
                                'title' => __('Slider Bottom Content :', 'reversal'),
                                'subtitle' => __('Write Slider Bottom Content', 'reversal'),
                                'default'  => 'It is a long established fact that a reader will be distracted by the readable content of a page.',
                        ),

                        array(
                                'id' => 'buttontext5',
                                'type' => 'text',
                                'title' => __('Button Content :', 'reversal'),
                                'subtitle' => __('Write Button Content Here.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => 'Get Started',
                        ),

                        array(
                                'id' => 'buttonlink5',
                                'type' => 'text',
                                'title' => __('Button Link :', 'reversal'),
                                'subtitle' => __('Write Button Link Here.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => '#home',
                        ),
                                                                         
                    )
                );
                
                $this->sections[] = array(
                    'icon'   => 'el-icon-list-alt',
                    'title'  => __( 'Blog Page Banner', 'reversal' ),
                    'heading' => __( 'Other Page Slogan Options Here.', 'reversal' ),
                    'fields' => array(

                       array(
                                'id' => 'blogslo',
                                'type' => 'text',
                                'title' => __('Blog Page Banner Title :', 'reversal'),
                                'subtitle' => __('Write Blog Page Banner Slogan.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => 'Blog',
                        ),

                        array(
                                'id' => 'blogcont',
                                'type' => 'textarea',
                                'title' => __('Blog Page Banner Slogan :', 'reversal'),
                                'subtitle' => __('Write Category Page Banner Slogan.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => 'Proin ultricies, nisl in imperdiet interdum, est tortor viverra neque, eu molestie dolor lacus sollicitudin sem.<br>Aenean fringilla suscipit justo. Curabitur sagittis quam dolor',
                        ),
                        array(
                                'id' => 'bannerimg',
                                'type' => 'media',
                                'title' => __('Blog Page Banner Title :', 'reversal'),
                                'subtitle' => __('Write Blog Page Banner Slogan.', 'reversal'),
                                'indent'   => true, // Indent all options below until the next 'section' option is set.
                                'default'  => 'Blog',
                        ),                                                           
                    )
                );
              	
                $theme_info = '<div class="redux-framework-section-desc">';
                $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __( '<strong>Theme URL:</strong> ', 'reversal' ) . '<a href="' . $this->theme->get( 'ThemeURI' ) . '" target="_blank">' . $this->theme->get( 'ThemeURI' ) . '</a></p>';
                $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __( '<strong>Author:</strong> ', 'reversal' ) . $this->theme->get( 'Author' ) . '</p>';
                $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __( '<strong>Version:</strong> ', 'reversal' ) . $this->theme->get( 'Version' ) . '</p>';
                $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get( 'Description' ) . '</p>';
                $tabs = $this->theme->get( 'Tags' );
                if ( ! empty( $tabs ) ) {
                    $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __( '<strong>Tags:</strong> ', 'reversal' ) . implode( ', ', $tabs ) . '</p>';
                }
                $theme_info .= '</div>';

                if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
                    $this->sections['theme_docs'] = array(
                        'icon'   => 'el-icon-list-alt',
                        'title'  => __( 'Documentation', 'reversal' ),
                        'fields' => array(
                            array(
                                'id'       => '17',
                                'type'     => 'raw',
                                'markdown' => true,
                                'content'  => wp_remote_get( dirname( __FILE__ ) . '/../README.md' )
                            ),
                        ),
                    );
                }

                $this->sections[] = array(
                    'title'  => __( 'Import / Export', 'reversal' ),
                    'desc'   => __( 'Import and Export your Redux Framework settings from file, text or URL.', 'reversal' ),
                    'icon'   => 'el-icon-refresh',
                    'fields' => array(
                        array(
                            'id'         => 'opt-import-export',
                            'type'       => 'import_export',
                            'title'      => 'Import Export',
                            'subtitle'   => 'Save and restore your Redux options',
                            'full_width' => false,
                        ),
                    ),
                );

                $this->sections[] = array(
                    'type' => 'divide',
                );

                $this->sections[] = array(
                    'icon'   => 'el-icon-info-sign',
                    'title'  => __( 'Theme Information', 'reversal' ),
                    'desc'   => __( '<p class="description">This is the Description. Again HTML is allowed</p>', 'reversal' ),
                    'fields' => array(
                        array(
                            'id'      => 'opt-raw-info',
                            'type'    => 'raw',
                            'content' => $item_info,
                        )
                    ),
                );

                if ( file_exists( trailingslashit( dirname( __FILE__ ) ) . 'README.html' ) ) {
                    $tabs['docs'] = array(
                        'icon'    => 'el-icon-book',
                        'title'   => __( 'Documentation', 'reversal' ),
                        'content' => nl2br( wp_remote_get( trailingslashit( dirname( __FILE__ ) ) . 'README.html' ) )
                    );
                }
            }

            public function setHelpTabs() {

                // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-1',
                    'title'   => __( 'Theme Information 1', 'reversal' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'reversal' )
                );

                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-2',
                    'title'   => __( 'Theme Information 2', 'reversal' ),
                    'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'reversal' )
                );

                // Set the help sidebar
                $this->args['help_sidebar'] = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'reversal' );
            }

            /**
             * All the possible arguments for Redux.
             * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
             * */
            public function setArguments() {

                $theme = wp_get_theme(); // For use with some settings. Not necessary.

                $this->args = array(
                    // TYPICAL -> Change these values as you need/desire
                    'opt_name'             => 'reversal_theme',
                    // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'         => $theme->get( 'Name' ),
                    // Name that appears at the top of your panel
                    'display_version'      => $theme->get( 'Version' ),
                    // Version that appears at the top of your panel
                    'menu_type'            => 'menu',
                    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'       => true,
                    // Show the sections below the admin menu item or not
                    'menu_title'           => __( 'Theme Options', 'reversal' ),
                    'page_title'           => __( 'Theme Options', 'reversal' ),
                    // You will need to generate a Google API key to use this feature.
                    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                    'google_api_key'       => '',
                    // Set it you want google fonts to update weekly. A google_api_key value is required.
                    'google_update_weekly' => false,
                    // Must be defined to add google fonts to the typography module
                    'async_typography'     => true,
                    // Use a asynchronous font on the front end or font string
                    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                    'admin_bar'            => true,
                    // Show the panel pages on the admin bar
                    'admin_bar_icon'     => 'dashicons-portfolio',
                    // Choose an icon for the admin bar menu
                    'admin_bar_priority' => 50,
                    // Choose an priority for the admin bar menu
                    'global_variable'      => '',
                    // Set a different name for your global variable other than the opt_name
                    'dev_mode'             => true,
                    // Show the time the page took to load, etc
                    'update_notice'        => false,
                    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                    'customizer'           => true,
                    // Enable basic customizer support
                    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                    // OPTIONAL -> Give you extra features
                    'page_priority'        => 58,
                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_parent'          => 'themes.php',
                    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                    'page_permissions'     => 'manage_options',
                    // Permissions needed to access the options panel.
                    'menu_icon'            => '',
                    // Specify a custom URL to an icon
                    'last_tab'             => '',
                    // Force your panel to always open to a specific tab (by id)
                    'page_icon'            => 'icon-themes',
                    // Icon displayed in the admin panel next to your menu_title
                    'page_slug'            => '_options',
                    // Page slug used to denote the panel
                    'save_defaults'        => true,
                    // On load save the defaults to DB before user clicks save or not
                    'default_show'         => false,
                    // If true, shows the default value next to each field that is not the default value.
                    'default_mark'         => '',
                    // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export'   => true,
                    // Shows the Import/Export panel when not used as a field.

                    // CAREFUL -> These options are for advanced use only
                    'transient_time'       => 60 * MINUTE_IN_SECONDS,
                    'output'               => true,
                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'           => true,
                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                    'database'             => '',
                    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                    'system_info'          => false,
                    // REMOVE

                    // HINTS
                    'hints'                => array(
                        'icon'          => 'icon-question-sign',
                        'icon_position' => 'right',
                        'icon_color'    => 'lightgray',
                        'icon_size'     => 'normal',
                        'tip_style'     => array(
                            'color'   => 'light',
                            'shadow'  => true,
                            'rounded' => false,
                            'style'   => '',
                        ),
                        'tip_position'  => array(
                            'my' => 'top left',
                            'at' => 'bottom right',
                        ),
                        'tip_effect'    => array(
                            'show' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'click mouseleave',
                            ),
                        ),
                    )
                );

               


                // Panel Intro text -> before the form
                if ( ! isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
                    if ( ! empty( $this->args['global_variable'] ) ) {
                        $v = $this->args['global_variable'];
                    } else {
                        $v = str_replace( '-', '_', $this->args['opt_name'] );
                    }
                    $this->args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'reversal' ), $v );
                } else {
                    $this->args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'reversal' );
                }

                // Add content after the form.
                $this->args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'reversal' );
            }

            public function validate_callback_function( $field, $value, $existing_value ) {
                $error = true;
                $value = 'just testing';

                /*
              do your validation

              if(something) {
                $value = $value;
              } elseif(something else) {
                $error = true;
                $value = $existing_value;
                
              }
             */

                $return['value'] = $value;
                $field['msg']    = 'your custom error message';
                if ( $error == true ) {
                    $return['error'] = $field;
                }

                return $return;
            }

            public function class_field_callback( $field, $value ) {
                print_r( $field );
                echo '<br/>CLASS CALLBACK';
                print_r( $value );
            }

        }

        global $reduxConfig;
        $reduxConfig = new Redux_Framework_sample_config_mi();
    } else {
        echo "The class named Redux_Framework_sample_config_mi has already been called. <strong>Developers, you need to prefix this class with your company name or you'll run into problems!</strong>";
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ):
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    endif;

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ):
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error = true;
            $value = 'just testing';

            /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            
          }
         */

            $return['value'] = $value;
            $field['msg']    = 'your custom error message';
            if ( $error == true ) {
                $return['error'] = $field;
            }

            return $return;
        }
    endif;

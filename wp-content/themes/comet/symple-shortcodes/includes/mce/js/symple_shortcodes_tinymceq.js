
(function() {
	
	$get_value = '';
    tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
        editor.addButton( 'my_mce_button', {

            text: 'Shortcode',

            icon: false,

            type: 'menubutton',

            menu: [
					
					{
						text: 'About Us',

                         menu: [
						 
						 {
						 
						 text: 'About Us Wrapper',

						 onclick: function() {

                                        editor.insertContent( '[about_us][/about_us]');
                                        
                                    }
						 
						 },
						 
						 {
						 
						 text: 'About Us Content',

						 onclick: function(){
							editor.windowManager.open( {
								
								title: 'About-us Section Shortcode',
								
								body: [
								
									{
									
									type: 'textbox',
									
									name: 'icon',
									
									label: 'About Icon',
									
									value: 'xe007',
									
									minWidth: 650,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'title',
									
									label: 'About Title',
									
									value: 'RETINA READY',
									
									minWidth: 650,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'text',
									
									label: 'About Content',
									
									value: 'Lorem ipsum dolor sit amet, consectetur adipisc Morbi porttitor lectus vitae augue ullamcorper Honcus diam laoreet.',
									
									multiline: true,

                                    minWidth: 650,
									
									minHeight: 100,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'button',
									
									label: 'Button',
									
									value: 'More',
									
									minWidth: 650,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'link',
									
									label: 'Button link',
									
									value: '#',
									
									minWidth: 650,
									
									},
									
								],
								
								onsubmit: function( e ) {

                                        editor.insertContent( '[about icon="'+e.data.icon+'" title="'+e.data.title+'" text="'+e.data.text+'" button="'+e.data.button+'" link="'+e.data.link+'"]');
                                        
                                    }
								
							});
						 
							}
						 
						 },
						 
						 ]
					},
					
					
					{
					
						text: 'Poster',
						
						onclick: function(){
							editor.windowManager.open( {
								
								title: 'Poster Area',
								
								body: [
								
									{
									
									type: 'textbox',
									
									name: 'bg_image',
									
									label: 'BG Image',
									
									value: 'http://localhost/reversal/wp-content/uploads/2015/09/parallax-one-bg.png',
									
									minWidth: 650,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'logo',
									
									label: 'Logo',
									
									value: 'http://localhost/reversal/wp-content/uploads/2015/09/logo2.png',
									
									minWidth: 650,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'main_title',
									
									label: 'Mian Title',
									
									value: 'ONE PAGE CREATIVE PSD TEAMPLATE',
									
									minWidth: 650,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'sub_title',
									
									label: 'Sub Title',
									
									value: 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
									
									minWidth: 650,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'button',
									
									label: 'Button',
									
									value: 'BUY NOW',
									
									minWidth: 650,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'link',
									
									label: 'Button Link',
									
									value: '#',
									
									minWidth: 650,
									
									},
									
								],
								
								onsubmit: function( e ) {

                                        editor.insertContent( '[poster bg_image="'+e.data.bg_image+'" logo="'+e.data.logo+'" main_title="'+e.data.main_title+'" sub_title="'+e.data.sub_title+'" button="'+e.data.button+'" link="'+e.data.link+'"]');
                                        
                                    }
								
							});
						 
							}
					},
					
					{
						text: 'Services',

                         menu: [
						 
							{
						 
							 text: 'Service Border',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Service Page Title',
									
									body: [
									
										{
									
										type: 'textbox',
									
										name: 'page_title',
										
										label: 'Page Title',
										
										value: 'SERVICE',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[service_full page_title="'+e.data.page_title+'"][/service_full]');
											
										}
									
								});
							 
							 }
							 
							 },
							 
							 {
						 
							 text: 'Content Border',

							 onclick: function(){
								editor.insertContent( '[service_main][/service_main]');
							 
							 }
						 
							},
							
							{
						 
							 text: 'Left Content',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Service Main Content',
									
									body: [
									
										{
										
										type: 'textbox',
									
										name: 'title',
										
										label: 'Service Title',
										
										value: 'ONLINE MARKETING',
										
										minWidth: 650,
										
										},
										
										{
										
										type: 'textbox',
									
										name: 'icon',
										
										label: 'Service Icon',
										
										value: 'xe002',
										
										minWidth: 650,
										
										},
										
										{
										
										type: 'textbox',
									
										name: 'text',
										
										label: 'Text Box',
										
										value: 'In hac habitasse platea dictumst. Nunc ultricies iaculis luctus. Aliquam eget eros eget sapien dictum dictum sed in enim.',
										
										multiline: true,
										
										minWidth: 650,
										
										minHeight: 100,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[service_left title="'+e.data.title+'" icon="'+e.data.icon+'" text="'+e.data.text+'"]');
											
										}
									
								});
							 
							 }
						 
							},
							
							{
						 
							 text: 'Central Image',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Service Image Box',
									
									body: [
									
										{
										
										type: 'textbox',
									
										name: 'images_source',
										
										label: 'Service Image',
										
										value: 'http://localhost/reversal/wp-content/uploads/2015/09/service-image.png',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[image images_source="'+e.data.images_source+'"]');
											
										}
									
								});
							 
							 }
						 
							},
							
							{
						 
							 text: 'Right Content',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Service Main Content',
									
									body: [
									
										{
										
										type: 'textbox',
									
										name: 'title',
										
										label: 'Service Title',
										
										value: 'ONLINE MARKETING',
										
										minWidth: 650,
										
										},
										
										{
										
										type: 'textbox',
									
										name: 'icon',
										
										label: 'Service Icon',
										
										value: 'xe002',
										
										minWidth: 650,
										
										},
										
										{
										
										type: 'textbox',
									
										name: 'text',
										
										label: 'Text Box',
										
										value: 'In hac habitasse platea dictumst. Nunc ultricies iaculis luctus. Aliquam eget eros eget sapien dictum dictum sed in enim.',
										
										multiline: true,
										
										minWidth: 650,
										
										minHeight: 100,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[service_right title="'+e.data.title+'" icon="'+e.data.icon+'" text="'+e.data.text+'"]');
											
										}
									
								});
							 
							 }
						 
							},
						 
						 ]
					},
					
					{
					
						text: 'Skill',
						
						menu: [
							{
							
								text: 'Skill Wrapper',
								
								onclick: function(){
								editor.windowManager.open( {
									
									title: 'Skill Mian Text and Title',
									
									body: [
									
										{
									
										type: 'textbox',
									
										name: 'title',
										
										label: 'Page Title',
										
										value: 'OUR CAPABILITIES',
										
										minWidth: 650,
										
										},
										
										{
									
										type: 'textbox',
									
										name: 'top_text',
										
										label: 'Top Text',
										
										value: 'Proin ultricies, nisl in imperdiet interdum, est tortor viverra neque, eu molestie dolor lacus sollicitudin sem.<br>Aenean fringilla suscipit justo. Curabitur sagittis quam dolor',
										
										multiline: true,
										
										minWidth: 650,
										
										minHeight: 100,
										
										},
										
										{
									
										type: 'textbox',
									
										name: 'sub_text',
										
										label: 'Sub Text',
										
										value: 'Proin ultricies, nisl in imperdiet interdum, est tortor viverra neque, eu molestie dolor lacus sollicitudin sem.<br>Aenean fringilla suscipit justo. Curabitur sagittis quam dolor',
										
										multiline: true,
										
										minWidth: 650,
										
										minHeight: 100,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[skill_main title="'+e.data.title+'" top_text="'+e.data.top_text+'" sub_text="'+e.data.top_text+'"][/skill_main]');
											
										}
									
								});
							 
							 }
							},
							
							{
							
								text: 'Skill Content',
								
								onclick: function(){
								editor.windowManager.open( {
									
									title: 'Skill Section',
									
									body: [
									
										{
									
										type: 'textbox',
									
										name: 'title',
										
										label: 'Page Title',
										
										value: 'ADOBE PHOTOSHOP',
										
										minWidth: 650,
										
										},
										
										{
									
										type: 'textbox',
									
										name: 'text',
										
										label: 'Skill Text',
										
										value: 'In hac habitasse platea dictumst Nunc ultricies iaculis luctus Aliquam eget eros eget sapien dictum',
										
										multiline: true,
										
										minWidth: 650,
										
										minHeight: 100,
										
										},
										
										{
									
										type: 'textbox',
									
										name: 'skill_percent',
										
										label: 'Percent',
										
										value: '75',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[skill title="'+e.data.title+'" text="'+e.data.text+'" skill_percent="'+e.data.skill_percent+'"]');
											
										}
									
								});
							 
							 }
							},
						]
						
					},
					
					
					{
					
						text: 'Testimonials',
						
						menu: [
							{
							
								text: 'Testimonials Full Border',
								
								onclick: function(){
								editor.windowManager.open( {
									
									title: 'Customer Section Background',
									
									body: [
									
										{
									
										type: 'textbox',
									
										name: 'title',
										
										label: 'Page Title',
										
										value: 'Welcome',
										
										minWidth: 650,
										
										},
										
										{
									
										type: 'textbox',
									
										name: 'bg_image',
										
										label: 'BG Image',
										
										value: 'http://localhost/reversal/wp-content/uploads/2015/09/testimonials-bg.jpg',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[customer_main title="'+e.data.title+'" bg_image="'+e.data.bg_image+'"][/customer_main]');
											
										}
									
								});
							 
							 }
							},
							
							{
						 
						 text: 'Testimonial List Wrapper',

						 onclick: function() {

                                        editor.insertContent( '[cus_list_main][/cus_list_main]');
                                        
                                    }
						 
						 },
							
							{
							
								text: 'Testimonial List',
								
								onclick: function(){
								editor.windowManager.open( {
									
									title: 'Testimonial List Section',
									
									body: [
									
										{
									
										type: 'textbox',
									
										name: 'data_slide',
										
										label: 'Order',
										
										value: '0',
										
										minWidth: 650,
										
										},
										
										{
									
										type: 'textbox',
									
										name: 'active_li',
										
										label: 'Slide Status',
										
										value: 'active/none',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[cus_list data_slide="'+e.data.data_slide+'" active_li="'+e.data.active_li+'"]');
											
										}
									
								});
							 
							 }
							},
							
							{
						 
						 text: 'Testimonial Content Wrapper',

						 onclick: function() {

                                        editor.insertContent( '[content_main][/content_main]');
                                        
                                    }
						 
						 },
							
							{
							
								text: 'Testimonial Content',
								
								onclick: function(){
								editor.windowManager.open( {
									
									title: 'Testimonial Main Content',
									
									body: [
									
										{
									
										type: 'textbox',
									
										name: 'comment',
										
										label: 'Comment',
										
										value: 'In neque purus, congue ut imperdiet vel, sodales vel neque. Phasellus tempus hendrerit tempus. Donec at tellus risus. Pel-lentesque fermentum odio sit amet urna posuere dictum. Suspendisse eu gravida lectus, ac venenatis turpis.',
										
										multiline: true,
										
										minWidth: 650,
										
										minHeight: 100,
										
										},
										
										{
									
										type: 'textbox',
									
										name: 'image',
										
										label: 'Image',
										
										value: 'http://localhost/reversal/wp-content/uploads/2015/09/customer_img.png',
										
										minWidth: 650,
										
										},
										
										{
									
										type: 'textbox',
									
										name: 'name',
										
										label: 'Name',
										
										value: 'Jhon Doe',
										
										minWidth: 650,
										
										},
										
										{
									
										type: 'textbox',
									
										name: 'author_site',
										
										label: 'Author Site',
										
										value: 'www.example.com',
										
										minWidth: 650,
										
										},
										
										{
									
										type: 'textbox',
									
										name: 'test_active',
										
										label: 'Status',
										
										value: 'active/none',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[content comment="'+e.data.comment+'" image="'+e.data.image+'" name="'+e.data.name+'" author_site="'+e.data.author_site+'" test_active="'+e.data.test_active+'"]');
											
										}
									
								});
							 
							 }
							},
							
						]
						
					},
					
					
					{
						text: 'Clients',

                         menu: [
						 
							{
						 
							 text: 'Client Full Border',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Client Page Background',
									
									body: [
									
										{
									
										type: 'textbox',
									
										name: 'bg_image',
										
										label: 'Page Background',
										
										value: 'http://localhost/reversal/wp-content/uploads/2015/09/partners-bg.png',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[re_partner bg_image="'+e.data.bg_image+'"][/re_partner]');
											
										}
									
								});
							 
							 }
							 
							 },
							 
							{
						 
							 text: 'Clients Wrapper Section',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Clients Section Main Area',
									
									body: [
									
										{
										
										type: 'textbox',
									
										name: 'act',
										
										label: 'Status',
										
										value: 'active/ none',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[partner_main act="'+e.data.act+'"][/partner_main]');
											
										}
									
								});
							 
							 }
						 
							},
							
							{
						 
							 text: 'Partners Logo',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Add Partners Logo',
									
									body: [
									
										{
										
										type: 'textbox',
									
										name: 'logo',
										
										label: 'Logo',
										
										value: 'http://localhost/reversal/wp-content/uploads/2015/09/client_img1.png',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[partner logo="'+e.data.logo+'"]');
											
										}
									
								});
							 
							 }
						 
							},
						 
						 ]
					},
					

					{
						text: 'Social Area',

                         menu: [
						 
							{
						 
							 text: 'Social Area Full Border',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Add Page Background',
									
									body: [
									
										{
									
										type: 'textbox',
									
										name: 'bg_image',
										
										label: 'Page Background',
										
										value: 'http://localhost/reversal/wp-content/uploads/2015/09/social-bg.png',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[social_full bg_image="'+e.data.bg_image+'"][/social_full]');
											
										}
									
								});
							 
							 }
							 
							 },
							 
							  {
						 
							 text: 'Social Wrapper',

							 onclick: function() {

											editor.insertContent( '[twit_full][/twit_full]');
											
										}
							 
							 },
							 
							{
						 
							 text: 'Social Content',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Social Content Area',
									
									body: [
									
										{
										
										type: 'textbox',
									
										name: 'icon',
										
										label: 'Icon',
										
										value: 'fa-twitter',
										
										minWidth: 650,
										
										},
										
										{
										
										type: 'textbox',
									
										name: 'tweet_small',
										
										label: 'Content Small',
										
										value: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi tellus tellus, bibendum in nulla vitae, facilisis',
										
										multiline: true,
										
										minWidth: 650,
										
										minHeight: 100,
										
										},
										
										
										{
										
										type: 'textbox',
									
										name: 'tweet_strong',
										
										label: 'Content Strong',
										
										value: 'Convallis nibh quisque purus magna, ultricies in diam nec, pellentesque dapibus felis.',
										
										multiline: true,
										
										minWidth: 650,
										
										minHeight: 100,
										
										},
										
										{
										
										type: 'textbox',
									
										name: 'button',
										
										label: 'Button Text',
										
										value: 'Recent News',
										
										minWidth: 650,
										
										},
										
										{
										
										type: 'textbox',
									
										name: 'link',
										
										label: 'Button Link',
										
										value: '#',
										
										minWidth: 650,
										
										},
										
										{
										
										type: 'textbox',
									
										name: 'twit_act',
										
										label: 'Status',
										
										value: 'active/ none',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[twit icon="'+e.data.icon+'" tweet_small="'+e.data.tweet_small+'" tweet_strong="'+e.data.tweet_strong+'" button="'+e.data.button+'" link="'+e.data.link+'" twit_act="'+e.data.twit_act+'"]');
											
										}
									
								});
							 
							 }
						 
							},
							
							{
						 
							 text: 'Social Icon Wrapper',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Social Icon Wrapper and Title',
									
									body: [
									
										{
									
										type: 'textbox',
									
										name: 'title',
										
										label: 'Social Icon Title',
										
										value: 'CHOOSE OUR NETWORKS',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[social_icon title="'+e.data.title+'"][/social_icon]');
											
										}
									
								});
							 
							 }
							 
							 },
							
							{
						 
							 text: 'Social Icon',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Add Social Icon and Link',
									
									body: [
									
										{
										
										type: 'textbox',
									
										name: 'icon',
										
										label: 'Icon',
										
										value: 'xe093',
										
										minWidth: 650,
										
										},
										
										{
										
										type: 'textbox',
									
										name: 'link',
										
										label: 'Link',
										
										value: '#',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[social icon="'+e.data.icon+'" link="'+e.data.link+'"]');
											
										}
									
								});
							 
							 }
						 
							},
						 
						 ]
					},
					
					{
					
						text: 'Our Team',
						
						onclick: function(){
							editor.windowManager.open( {
								
								title: 'Team Memebers',
								
								body: [
								
									{
									
									type: 'textbox',
									
									name: 'title',
									
									label: 'Page Title',
									
									value: 'Our Team',
									
									minWidth: 650,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'sub_title',
									
									label: 'Top Text',
									
									value: 'Proin ultricies, nisl in imperdiet interdum, est tortor viverra neque, eu molestie dolor lacus sollicitudin sem. <br>Aenean fringilla suscipit justo. Curabitur sagittis quam dolor',
									
									minWidth: 650,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'cat_name',
									
									label: 'Categorie Name',
									
									value: 'team',
									
									minWidth: 650,
									
									},
									
								],
								
								onsubmit: function( e ) {

                                        editor.insertContent( '[team_main title="'+e.data.title+'" sub_title="'+e.data.sub_title+'" cat_name="'+e.data.cat_name+'"]');
                                        
                                    }
								
							});
						 
							}
					},
					
					{
					
						text: 'Portfolio',
						
						onclick: function(){
							editor.windowManager.open( {
								
								title: 'Portfolio Area',
								
								body: [
								
									{
									
									type: 'textbox',
									
									name: 'title',
									
									label: 'Title',
									
									value: 'FEATURED WORKS',
										
									minWidth: 650,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'text',
									
									label: 'Textarea',
									
									value: 'Proin ultricies, nisl in imperdiet interdum, est tortor viverra neque, eu molestie dolor lacus sollicitudin sem.<br>Aenean fringilla suscipit justo. Curabitur sagittis quam dolor',
									
									multiline: true,
										
									minWidth: 650,
										
									minHeight: 100,
									
									},
									
								],
								
								onsubmit: function( e ) {

                                        editor.insertContent( '[portfolio title="'+e.data.title+'" text="'+e.data.text+'"]');
                                        
                                    }
								
							});
						 
							}
					},
					
					{
					
						text: 'Blog',
						
						onclick: function(){
							editor.windowManager.open( {
								
								title: 'Blog Post',
								
								body: [
								
									{
									
									type: 'textbox',
									
									name: 'title',
									
									label: 'Page Title',
									
									value: 'Recent Post',
									
									minWidth: 650,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'text',
									
									label: 'Top Text',
									
									value: 'Proin ultricies nisl in imperdiet interdum est tortor viverra neque eu molestie dolor lacus sollicitudin sem<br>Aenean fringilla suscipit justo Curabitur sagittis quam dolor',
									
									minWidth: 650,
									
									},
									
									{
									
									type: 'textbox',
									
									name: 'cat_name',
									
									label: 'Categorie Name',
									
									value: 'post',
									
									minWidth: 650,
									
									},
									
								],
								
								onsubmit: function( e ) {

                                        editor.insertContent( '[blog title="'+e.data.title+'" text="'+e.data.text+'" cat_name="'+e.data.cat_name+'"]');
                                        
                                    }
								
							});
						 
							}
					},
										
					{
						text: 'Price List',

                         menu: [
						 
							{
						 
							 text: 'Price Wrapper',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Add Top Title and Text',
									
									body: [
									
										{
									
										type: 'textbox',
									
										name: 'title',
										
										label: 'Section Title',
										
										value: 'PRICES',
										
										minWidth: 650,
										
										},
										
										{
									
										type: 'textbox',
									
										name: 'text',
										
										label: 'Section Top Text',
										
										value: 'Proin ultricies, nisl in imperdiet interdum, est tortor viverra neque, eu molestie dolor lacus sollicitudin sem. Aenean fringilla suscipit justo. Curabitur sagittis quam dolor',
										
										multiline: true,
										
										minWidth: 650,
										
										minHeight: 100,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[price_full title="'+e.data.title+'" text="'+e.data.text+'"][/price_full]');
											
										}
									
								});
							 
							 }
							 
							 },
							 
							{
						 
							 text: 'Price Box Main',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Add Price Box Options',
									
									body: [
									
										{
										
										type: 'textbox',
									
										name: 'price',
										
										label: 'Price',
										
										value: '199',
										
										minWidth: 650,
										
										},
										
										{
										
										type: 'textbox',
									
										name: 'duration',
										
										label: 'Duration',
										
										value: '$/MONTH',
										
										minWidth: 650,
										
										},
										
										{
										
										type: 'textbox',
									
										name: 'plan',
										
										label: 'Plan',
										
										value: 'BACIS',
										
										minWidth: 650,
										
										},
										
										{
										
										type: 'textbox',
									
										name: 'button',
										
										label: 'Button Text',
										
										value: 'BUY NOW',
										
										minWidth: 650,
										
										},
										
										{
										
										type: 'textbox',
									
										name: 'link',
										
										label: 'Button Link',
										
										value: '#',
										
										minWidth: 650,
										
										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[price_main price="'+e.data.price+'" duration="'+e.data.duration+'" plan="'+e.data.plan+'" button="'+e.data.button+'" link="'+e.data.link+'"][/price_main]');
											
										}
									
								});
							 
							 }
						 
							},
							
							{
						 
							 text: 'Price Box Options',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Add Price Box Options',
									
									body: [
									
										{
									
										type: 'textbox',
									
										name: 'plan_option',
										
										label: 'Plan Options',
										
										value: 'Email Account',
										
										minWidth: 650,
										
										},
										{
									
										type: 'textbox',
									
										name: 'plan_amount',
										
										label: 'Plan Amount / Number',
										
										value: '05',
										
										minWidth: 650,
										
										},
										
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[price plan_option="'+e.data.plan_option+'" plan_amount="'+e.data.plan_amount+'"]');
											
										}
									
								});
							 
							 }
							 
							 },
						 ]
					},
					
					{
						text: 'Contact',

                         menu: [
						 
							{
						 
							 text: 'Contact Text',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Add Top Title and Text',
									
									body: [
									
										{
									
										type: 'textbox',
									
										name: 'bg_image',
										
										label: 'Background Image',
										
										value: 'Background image source link',
										
										minWidth: 650,
										
										},
										
										{
									
										type: 'textbox',
									
										name: 'logo',
										
										label: 'Logo',
										
										value: 'Logo Source Link',										
										
										minWidth: 650,

										},
										
										{
									
										type: 'textbox',
									
										name: 'title',
										
										label: 'Title',
										
										value: 'ONE PAGE CREATIVE PSD TEAMPLATE',										
										
										minWidth: 650,

										},
										
										{
									
										type: 'textbox',
									
										name: 'email',
										
										label: 'Email',
										
										value: 'tranmautritam@gmail.com',										
										
										minWidth: 650,

										},
										
										{
									
										type: 'textbox',
									
										name: 'address',
										
										label: 'Address',
										
										value: '164 Nguyen Xi, Binh Thanh, Ho Chi Minh City, Vietnam',										
										
										minWidth: 650,

										},
										
										{
									
										type: 'textbox',
									
										name: 'phone',
										
										label: 'Phone',
										
										value: '+84 935 815 989',										
										
										minWidth: 650,

										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[contact bg_image="'+e.data.bg_image+'" logo="'+e.data.logo+'" title="'+e.data.title+'" email="'+e.data.email+'" address="'+e.data.address+'" phone="'+e.data.phone+'"]');
											
										}
									
								});
							 
							 }
							 
							 },
							 
							{
						 
							 text: 'Contact Form',

							 onclick: function(){
								editor.windowManager.open( {
									
									title: 'Add Price Box Options',
									
									body: [
									
										{
									
										type: 'textbox',
									
										name: 'form',
										
										label: 'Contact Form Shortcode',
										
										value: '[contact-form-7 id="315" title="Contact form"]',										
										
										minWidth: 650,

										},
										
									],
									
									onsubmit: function( e ) {

											editor.insertContent( '[contact_form_shortcode]'+e.data.form+'[/contact_form_shortcode]');
											
										}
									
								});
							 
							 }
						 
							},
							
							
						 ]
					},
					
					
                  ]
        });
       
    });
    
   
})(jQuery);


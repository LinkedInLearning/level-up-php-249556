<?php
 $form = array( 
	'name' => 'contact', 
	'method' => 'post',
	'fields' => array( 
		'name' => array( 
			'type' => 'text',
			'label' => 'Your Name',
			'required' => true,
			'placeholder' => 'What is your name?',
		),
		'email' => array( 
			'type' => 'email',
			'label' => 'Your Email Address',
			'required' => true,
			'placeholder' => 'joe@casabona.org',
		),
		'type_of_message' => array( 
			'type' => 'select',
			'label' => 'Reason for Contact',
			'required' => false,
			'options' => [ 'Question', 'Comment', 'Concern', 'Something else', ],
		),
		'message' => array( 
			'type' => 'textbox',
			'label' => 'Your Message',
			'required' => true,
		),
		'heard_about' => array( 
			'type' => 'radio',
			'label' => 'How did you hear about us?',
			'options' => [ 'Podcast', 'Newsletter', 'YouTube', 'Social Media', 'Something Else', ],
		),
		'content_consumed' => array( 
			'type' => 'checkbox', 
			'label' => 'What type of content have you consumed?',
			'options' => [ 'Podcast', 'Newsletter', 'YouTube', 'Social Media', 'Something Else', ],
    	),
		'join_mailing_list' => array(
			'type' => 'checkbox',
			'value' => 'true',
			'label' => 'Join the Mailing List?',
		),
		'submit' => array(
			'type' => 'submit',
			'value' => 'Send Message',
		)
	)
);
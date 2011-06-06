<?php
// Greek-to-Latin URL Title 1.0
// For ExpressionEngine 2.0
// Copyright Evangelos Papadakis
// Based on extension from Nicolas Bottari "Japanese kana typing" http://devot-ee.com/add-ons/japanese-kana-typing/
// -----------------------------------------------------
// 
// The Greek typing extension for ExpressionEngine by Evangelos Papadakis is licensed under a Creative Commons Attribution
// Noncommercial-Share Alike 3.0 Unported License
// http://creativecommons.org/licenses/by-nc-sa/3.0/
//
// Description
// -----------
// A small extension that writes in latin letters in the URL title as you type Greek text in the entry title field.
//
// More info: not yet available
//

class Greek_to_latin_url_title_ext {
	
	var $name			= 'Greek-to-Latin URL Title';
	var $version 		= '1.0';
	var $description	= 'Adds greek-to-latin conversion for entry title to url title.';
	var $settings_exist	= 'n';
	var $docs_url		= 'http://diadyo.gr';

	/**
	 * Constructor
	 */
	function Greek_to_latin_url_title_ext($settings='')
	{
		$this->EE =& get_instance();
	}
	
	function greek_array()
	{
		$greek_array = array(
			// Greek entities

			// Small Letters
			'945' => 'a', //α
			'946' => 'b', //β
			'947' => 'g', //γ
			'948' => 'd', //δ
			'949' => 'e', //ε
			'950' => 'z', //ζ
			'951' => 'h', //η
			'952' => 'th', //θ
			'953' => 'i', //ι
			'954' => 'k', //κ
			'955' => 'l', //λ
			'956' => 'm', //μ
			'957' => 'n', //ν
			'958' => 'j', //ξ
			'959' => 'o', //ο
			'960' => 'p', //π
			'961' => 'r', //ρ
			'962' => 's', //ς
			'963' => 's', //σ
			'964' => 't', //τ
			'965' => 'u', //υ
			'966' => 'f', //φ
			'967' => 'ch', //χ
			'968' => 'ps', //ψ
			'969' => 'w', //ω

			// Capital Letters
			'913' => 'a', //Α
			'914' => 'b', //Β
			'915' => 'g', //Γ
			'916' => 'd', //Δ
			'917' => 'e', //Ε
			'918' => 'z', //Ζ
			'919' => 'h', //Η
			'920' => 'th', //Θ
			'921' => 'i', //Ι
			'922' => 'k', //Κ
			'923' => 'l', //Λ
			'924' => 'm', //Μ
			'925' => 'n', //Ν
			'926' => 'j', //Ξ
			'927' => 'o', //Ο
			'928' => 'p', //Π
			'929' => 'r', //Ρ
			'931' => 's', //Σ
			'932' => 't', //Τ
			'933' => 'u', //Υ
			'934' => 'f', //Φ
			'935' => 'ch', //Χ
			'936' => 'ps', //Ψ
			'937' => 'w', //Ω

			// Pancuation
			// Small letters			
			'940' => 'a', //ά
			'941' => 'e', //έ
			'942' => 'h', //ή
			'943' => 'i', //ί
			'972' => 'o', //ό
			'973' => 'u', //ύ
			'974' => 'w', //ώ
			'970' => 'i', //ϊ
			'912' => 'i', //ΐ

			// Capital Letters			
			'902' => 'a', //Ά
			'904' => 'e', //Έ
			'905' => 'h', //Ή
			'906' => 'i', //Ί
			'908' => 'o', //Ό
			'910' => 'u', //Ύ
			'911' => 'w', //Ώ
			'938' => 'i', //Ϊ
		);
		
		return $greek_array;
	}


	function activate_extension() {
	
	      $data = array(
	        'class'      => __CLASS__,
	        'method'    => "greek_array",
	        'hook'      => "foreign_character_conversion_array",
	        'settings'    => '',
	        'priority'    => 10,
	        'version'    => $this->version,
	        'enabled'    => "y"
	      );
	
	      // insert ext in database
	      $this->EE->db->insert('exp_extensions', $data);
	  }
	
	
	  function disable_extension() {
	
	      $this->EE->db->where('class', __CLASS__);
	      $this->EE->db->delete('exp_extensions');
	  } 
	  
	 /**
	 * Update Extension
	 *
	 * This function performs any necessary db updates when the extension page is visited
	 *
	 * @return 	mixed void on update / false if none
	 */
	function update_extension($current = '')
	{
		if ($current == '' OR $current == $this->version)
		{
			return FALSE;
		}
		
		if ($current < $this->version)
		{
			// Update to version 1.0
		}
		
		$this->EE->db->where('class', __CLASS__);
		$this->EE->db->update('extensions', array('version' => $this->version));
	}
}
// END CLASS
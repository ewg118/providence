<?php
/** ---------------------------------------------------------------------
 * app/models/ca_list_item_labels.php : table access class for table ca_list_item_labels
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2008-2022 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 * 
 * @package CollectiveAccess
 * @subpackage models
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License version 3
 * 
 * ----------------------------------------------------------------------
 */
 
 /**
   *
   */
require_once(__CA_LIB_DIR__.'/BaseLabel.php');


BaseModel::$s_ca_models_definitions['ca_list_item_labels'] = array(
 	'NAME_SINGULAR' 	=> _t('list item name'),
 	'NAME_PLURAL' 		=> _t('list item names'),
 	'FIELDS' 			=> array(
 		'label_id' => array(
				'FIELD_TYPE' => FT_NUMBER, 'DISPLAY_TYPE' => DT_HIDDEN, 
				'IDENTITY' => true, 'DISPLAY_WIDTH' => 10, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'LABEL' => 'Label id', 'DESCRIPTION' => 'Identifier for Label'
		),
		'item_id' => array(
				'FIELD_TYPE' => FT_NUMBER, 'DISPLAY_TYPE' => DT_HIDDEN, 
				'DISPLAY_WIDTH' => 10, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'LABEL' => 'Item id', 'DESCRIPTION' => 'Identifier for Item'
		),
		'locale_id' => array(
				'FIELD_TYPE' => FT_NUMBER, 'DISPLAY_TYPE' => DT_SELECT, 
				'DISPLAY_WIDTH' => 40, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'DISPLAY_FIELD' => array('ca_locales.name'),
				'LABEL' => _t('Locale'), 'DESCRIPTION' => _t('Locale of label'),
		),
		'type_id' => array(
				'FIELD_TYPE' => FT_NUMBER, 'DISPLAY_TYPE' => DT_SELECT, 
				'DISPLAY_WIDTH' => 10, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => true, 
				'DEFAULT' => '',
				
				'LIST_CODE' => 'list_item_label_types',
				'LABEL' => _t('Type'), 'DESCRIPTION' => _t('Indicates type of label and how it should be employed.')
		),
		'name_singular' => array(
				'FIELD_TYPE' => FT_TEXT, 'DISPLAY_TYPE' => DT_FIELD, 
				'DISPLAY_WIDTH' => '670px', 'DISPLAY_HEIGHT' => 2,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'LABEL' => _t('Item name (singular)'), 'DESCRIPTION' => _t('The name of this list item in the singular form (eg. "disk", "lobster").'),
				'BOUNDS_LENGTH' => array(1,255)
		),
		'name_plural' => array(
				'FIELD_TYPE' => FT_TEXT, 'DISPLAY_TYPE' => DT_FIELD, 
				'DISPLAY_WIDTH' => '670px', 'DISPLAY_HEIGHT' => 2,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'LABEL' => _t('Item name (plural)'), 'DESCRIPTION' => _t('The name of this list item in the plural form (eg. "disks", "lobsters").'),
				'BOUNDS_LENGTH' => array(1,255)
		),
		'name_sort' => array(
				'FIELD_TYPE' => FT_TEXT, 'DISPLAY_TYPE' => DT_OMIT, 
				'DISPLAY_WIDTH' => 255, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'LABEL' => 'Sort order', 'DESCRIPTION' => 'Sortable version of name value',
				'BOUNDS_LENGTH' => array(0,255)
		),
		'description' => array(
				'FIELD_TYPE' => FT_TEXT, 'DISPLAY_TYPE' => DT_FIELD, 
				'DISPLAY_WIDTH' => '670px', 'DISPLAY_HEIGHT' => 6,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'LABEL' => _t('Description'), 'DESCRIPTION' => _t('A description of the list item, including suggested use notes or definitions.'),
				'BOUNDS_LENGTH' => array(0,65535)
		),
		'source_info' => array(
				'FIELD_TYPE' => FT_TEXT, 'DISPLAY_TYPE' => DT_FIELD, 
				'DISPLAY_WIDTH' => "670px", 'DISPLAY_HEIGHT' => 3,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'LABEL' => 'Source', 'DESCRIPTION' => 'Source information'
		),
		'is_preferred' => array(
				'FIELD_TYPE' => FT_BIT, 'DISPLAY_TYPE' => DT_SELECT, 
				'DISPLAY_WIDTH' => 10, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => false, 
				'DEFAULT' => '',
				'LABEL' => _t('Is preferred?'), 'DESCRIPTION' => _t('Set this if this label is the preferred label for the current locale.'),
				'BOUNDS_VALUE' => array(0,1)
		),
		'effective_date' => array(
				'FIELD_TYPE' => FT_HISTORIC_DATERANGE, 'DISPLAY_TYPE' => DT_FIELD, 
				'DISPLAY_WIDTH' => 20, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => true, 
				'DEFAULT' => '',
				'START' => 'sdatetime', 'END' => 'edatetime',
				'LABEL' => _t('Effective date'), 'DESCRIPTION' => _t('Period of time for which this label was in effect. This is an option qualification for the relationship. If left blank, this relationship is implied to have existed for as long as the related items have existed.')
		),
		'access' => array(
				'FIELD_TYPE' => FT_NUMBER, 'DISPLAY_TYPE' => DT_SELECT, 
				'DISPLAY_WIDTH' => 40, 'DISPLAY_HEIGHT' => 1,
				'IS_NULL' => false, 
				'DEFAULT' => 0,
				'ALLOW_BUNDLE_ACCESS_CHECK' => true,
				'BOUNDS_CHOICE_LIST' => array(
					_t('Not accessible to public') => 0,
					_t('Accessible to public') => 1
				),
				'LIST' => 'access_statuses',
				'LABEL' => _t('Access'), 'DESCRIPTION' => _t('Indicates if label is accessible to the public or not.')
		)
 	)
);

class ca_list_item_labels extends BaseLabel {
	# ---------------------------------
	# --- Object attribute properties
	# ---------------------------------
	# Describe structure of content object's properties - eg. database fields and their
	# associated types, what modes are supported, et al.
	#

	# ------------------------------------------------------
	# --- Basic object parameters
	# ------------------------------------------------------
	# what table does this class represent?
	protected $TABLE = 'ca_list_item_labels';
	      
	# what is the primary key of the table?
	protected $PRIMARY_KEY = 'label_id';

	# ------------------------------------------------------
	# --- Properties used by standard editing scripts
	# 
	# These class properties allow generic scripts to properly display
	# records from the table represented by this class
	#
	# ------------------------------------------------------

	# Array of fields to display in a listing of records from this table
	protected $LIST_FIELDS = array('name_singular');

	# When the list of "list fields" above contains more than one field,
	# the LIST_DELIMITER text is displayed between fields as a delimiter.
	# This is typically a comma or space, but can be any string you like
	protected $LIST_DELIMITER = ' ';

	# What you'd call a single record from this table (eg. a "person")
	protected $NAME_SINGULAR;

	# What you'd call more than one record from this table (eg. "people")
	protected $NAME_PLURAL;

	# List of fields to sort listing of records by; you can use 
	# SQL 'ASC' and 'DESC' here if you like.
	protected $ORDER_BY = array('name_singular');

	# Maximum number of record to display per page in a listing
	protected $MAX_RECORDS_PER_PAGE = 20; 

	# How do you want to page through records in a listing: by number pages ordered
	# according to your setting above? Or alphabetically by the letters of the first
	# LIST_FIELD?
	protected $PAGE_SCHEME = 'alpha'; # alpha [alphabetical] or num [numbered pages; default]

	# If you want to order records arbitrarily, add a numeric field to the table and place
	# its name here. The generic list scripts can then use it to order table records.
	protected $RANK = '';
	
	
	# ------------------------------------------------------
	# Hierarchical table properties
	# ------------------------------------------------------
	protected $HIERARCHY_TYPE				=	null;
	protected $HIERARCHY_LEFT_INDEX_FLD 	= 	null;
	protected $HIERARCHY_RIGHT_INDEX_FLD 	= 	null;
	protected $HIERARCHY_PARENT_ID_FLD		=	null;
	protected $HIERARCHY_DEFINITION_TABLE	=	null;
	protected $HIERARCHY_ID_FLD				=	null;
	protected $HIERARCHY_POLY_TABLE			=	null;
	
	# ------------------------------------------------------
	# Change logging
	# ------------------------------------------------------
	protected $UNIT_ID_FIELD = null;
	protected $LOG_CHANGES_TO_SELF = false;
	protected $LOG_CHANGES_USING_AS_SUBJECT = array(
		"FOREIGN_KEYS" => array(
			'item_id'
		),
		"RELATED_TABLES" => array(

		)
	);
	
	# ------------------------------------------------------
	# Labels
	# ------------------------------------------------------
	# --- List of fields used in label user interface
	protected $LABEL_UI_FIELDS = array(
		'name_singular', 'name_plural', 'description'
	);
	protected $LABEL_DISPLAY_FIELD = 'name_singular';
	protected $LABEL_SECONDARY_DISPLAY_FIELDS = ['name_plural'];
	
	# --- Name of field used for sorting purposes
	protected $LABEL_SORT_FIELD = 'name_sort';
	
	# --- Name of table this table contains label for
	protected $LABEL_SUBJECT_TABLE = 'ca_list_items';
	
	
	# ------------------------------------------------------
	# $FIELDS contains information about each field in the table. The order in which the fields
	# are listed here is the order in which they will be returned using getFields()

	protected $FIELDS;
	

	# ------------------------------------------------------
	/**
	 *
	 */
	public function insert($pa_options=null) {
		if ($vn_rc = parent::insert($pa_options)) {
			ExternalCache::flush('listItems');
		}
		return $vn_rc;
	}
	# ------------------------------------------------------
	/**
	 *
	 */
	public function update($pa_options=null) {
		if ($vn_rc = parent::update($pa_options)) {
			ExternalCache::flush('listItems');
		}
		return $vn_rc;
	}
	# ------------------------------------------------------
	/**
	 *
	 */
	public function delete($pb_delete_related = false, $pa_options = NULL, $pa_fields = NULL, $pa_table_list = NULL) {
		if ($vn_rc = parent::delete($pb_delete_related, $pa_options, $pa_fields, $pa_table_list)) {
			ExternalCache::flush('listItems');
		}
		return $vn_rc;
	}
	# ------------------------------------------------------
}

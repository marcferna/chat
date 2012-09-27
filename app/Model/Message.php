<?php
App::uses('AppModel', 'Model');
/**
 * Message Model
 *
 * @property Room $Room
 */
class Message extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'message';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'message' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Room' => array(
			'className' => 'Room',
			'foreignKey' => 'room_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

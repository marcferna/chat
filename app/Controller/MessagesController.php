<?php
App::uses('AppController', 'Controller');
/**
 * Messages Controller
 *
 * @property Message $Message
 */
class MessagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Message->recursive = 0;
		$this->set('messages', $this->Message->find('all'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->autoRender = false;
		$this->layout = 'ajax';
		if(!empty($this->data)) {
			if($message = $this->Message->save($this->data)) {
				$message["Message"]["created_formated"] = date('H:i', strtotime($message["Message"]["created"]));
				print json_encode($message);
			}
		}
	}

/**
* add method
*
* @return void
*/
	public function get_latest_messages($last_message) {
		$this->autoRender = false;
		$this->layout = 'ajax';
		$new_messages = $this->Message->find('all', 
			array(
        		'conditions' => array('Message.id >' => $last_message)
        	)
        );
        $new_last_message = $new_messages[count($new_messages)-1]["Message"]["id"];
		print json_encode($last_message);
		
	}
}

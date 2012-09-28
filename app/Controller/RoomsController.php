<?php
App::uses('AppController', 'Controller');
/**
 * Rooms Controller
 *
 * @property Room $Room
 */
class RoomsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Room->recursive = 1;
		$this->set('rooms', $this->Room->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Room->id = $id;
		if (!$this->Room->exists()) {
			throw new NotFoundException(__('Invalid room'));
		}
		$this->set('room', $this->Room->read(null, $id));
		$this->set('rooms', $this->Room->find('all', array("recursive" => 0)));
	}
}

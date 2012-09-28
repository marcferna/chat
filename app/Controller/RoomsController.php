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
		$this->Room->recursive = 0;
		$this->set('rooms', $this->paginate());
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
	}
}

<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();

			// Antes de guardar se calcula la edad
			$day 	= $this->request->data['User']['date_of_birth']['day'];
			$month 	= $this->request->data['User']['date_of_birth']['month'];
			$year 	= $this->request->data['User']['date_of_birth']['year'];

			// Se calcula la edad y se deja en los datos que se intentarán guardar
			$this->request->data['User']['age'] = $this->__getAgeOptimized($day, $month, $year);

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	// Un método privado por convención lleva "__"
	// Leer más acerca de las convenciones en: http://book.cakephp.org/2.0/en/contributing/cakephp-coding-conventions.html
	// Este método calcula la edad
	// IMPORTANTE: este código funcionará para PHP >= 5.3.0
	private function __getAgeOptimized($day, $month, $year) {
		$from = new DateTime($year . '-' . $month . '-' . $day );
		$to   = new DateTime('today');
		return $from->diff($to)->y;
    }

    // IMPORTANTE: este código funcionará incluso con PHP < 5.3.0
	private function __getAge($day, $month, $year){
		$year_diff  = date("Y") - $year;
		$month_diff = date("m") - $month;
		$day_diff   = date("d") - $day;

		if ($day_diff < 0 && $month_diff==0) $year_diff--;
		if ($day_diff < 0 && $month_diff < 0) $year_diff--;

		return $year_diff;
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {

			// Antes de guardar se calcula la edad
			$day 	= $this->request->data['User']['date_of_birth']['day'];
			$month 	= $this->request->data['User']['date_of_birth']['month'];
			$year 	= $this->request->data['User']['date_of_birth']['year'];

			// Se calcula la edad y se deja en los datos que se intentarán guardar
			$this->request->data['User']['age'] = $this->__getAgeOptimized($day, $month, $year);

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}

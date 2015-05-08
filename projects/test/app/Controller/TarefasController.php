<?php
App::uses('AppController', 'Controller');
/**
 * Tarefas Controller
 *
 * @property Tarefa $tarefa
 * @property PaginatorComponent $Paginator
 */
class TarefasController extends AppController {

public $components = array('RequestHandler');

    public function index() {
        $tarefas = $this->Tarefa->find('all', ['order' => ['prioridade' => 'asc']]);
        $this->set(array(
            'Tarefas' => $tarefas,
            '_serialize' => array('Tarefas')
        ));
    }

    public function view($id) {
        $tarefa = $this->Tarefa->findById($id);
        $this->set(array(
            'Tarefa' => $tarefa,
            '_serialize' => array('Tarefa')
        ));
    }

    public function add() {
        $this->Tarefa->create();
		$data = $this->request->input('json_decode');
        if ($this->Tarefa->save($data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function edit($id) {
        $this->Tarefa->id = $id;
        $data = $this->request->input('json_decode');
        if ($this->Tarefa->save($data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function delete($id) {
        if ($this->Tarefa->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

}

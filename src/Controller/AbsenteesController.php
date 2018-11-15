<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Absentees Controller
 *
 * @property \App\Model\Table\AbsenteesTable $Absentees
 *
 * @method \App\Model\Entity\Absentee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AbsenteesController extends AppController
{

    public function isAuthorized($user)
    {
        //dump($user);
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'edit','delete','home','index','ajaxFilterSubdivision','ajaxDelete']) &&  in_array($user['role_id'],[1,13,14,15]) ) {
            return true;
        }
        
        
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Absentees');
        $this->paginate = [
            'contain' => ['Departments', 'Users']
        ];
        $absentees = $this->paginate($this->Absentees);

        $this->set(compact('absentees'));
    }

    /**
     * View method
     *
     * @param string|null $id Absentee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $absentee = $this->Absentees->get($id, [
            'contain' => ['Departments', 'Users']
        ]);

        $this->set('absentee', $absentee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function home()
    {
        $session = $this->getRequest()->getSession();

        $session->write('homecontroller', $this->request->params['controller']);
        $absentee = $this->Absentees->newEntity();
        if ($this->request->is('post')) {
            $absentee = $this->Absentees->patchEntity($absentee, $this->request->getData());
            $user=$this->request->getSession()->read('Auth.User');
            $absentee->department_id=$user['department_id'];
            $absentee->user_id=$user['user_id'];
            if ($this->Absentees->save($absentee)) {
                $this->Flash->success(__('The absentee has been saved.'));

                return $this->redirect(['action' => 'home']);
            }
            $this->Flash->error(__('The absentee could not be saved. Please, try again.'));
        }
        $departments = $this->Absentees->Departments->find('list', ['limit' => 200]);
        $users = $this->Absentees->Users->find('list', ['limit' => 200]);
        $this->set(compact('absentee', 'departments', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Absentee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $absentee = $this->Absentees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $absentee = $this->Absentees->patchEntity($absentee, $this->request->getData());
            if ($this->Absentees->save($absentee)) {
                $this->Flash->success(__('The absentee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The absentee could not be saved. Please, try again.'));
        }
        $departments = $this->Absentees->Departments->find('list', ['limit' => 200]);
        $users = $this->Absentees->Users->find('list', ['limit' => 200]);
        $this->set(compact('absentee', 'departments', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Absentee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $absentee = $this->Absentees->get($id);
        if ($this->Absentees->delete($absentee)) {
            $this->Flash->success(__('The absentee has been deleted.'));
        } else {
            $this->Flash->error(__('The absentee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
}

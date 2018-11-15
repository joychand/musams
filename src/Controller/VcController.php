<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Vc Controller
 *
 *
 * @method \App\Model\Entity\Vc[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VcController extends AppController
{

    public function isAuthorized($user)
    {
        //dump($user);
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'edit','delete','home','index']) &&  in_array($user['role_id'],[2]) ) {
            return true;
        }
        
        
    }

    public function home()
    {
        $session = $this->getRequest()->getSession();

        $session->write('homecontroller', $this->request->params['controller']);
    }


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
     * @param string|null $id Vc id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vc = $this->Vc->get($id, [
            'contain' => []
        ]);

        $this->set('vc', $vc);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vc = $this->Vc->newEntity();
        if ($this->request->is('post')) {
            $vc = $this->Vc->patchEntity($vc, $this->request->getData());
            if ($this->Vc->save($vc)) {
                $this->Flash->success(__('The vc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vc could not be saved. Please, try again.'));
        }
        $this->set(compact('vc'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vc id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vc = $this->Vc->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vc = $this->Vc->patchEntity($vc, $this->request->getData());
            if ($this->Vc->save($vc)) {
                $this->Flash->success(__('The vc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vc could not be saved. Please, try again.'));
        }
        $this->set(compact('vc'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vc id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vc = $this->Vc->get($id);
        if ($this->Vc->delete($vc)) {
            $this->Flash->success(__('The vc has been deleted.'));
        } else {
            $this->Flash->error(__('The vc could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

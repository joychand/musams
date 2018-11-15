<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
 /** login Page */

 public function initialize()
 {
     parent::initialize();
    // $this->disableCache();
     // Add the 'add' action to the allowed actions list.
     $this->Auth->allow(['logout','changepassword']);
 
 
 }

 public function isAuthorized($user)
{
    $action = $this->request->getParam('action');
    
    if (in_array($action, ['add', 'edit','delete','index']) &&  in_array($user['role_id'],[3])) {
        return true;
    }

  
}

public function login(){
Cache::disable();

if($this->Auth->user()){
    $this->Flash->error(__('You are already logged in!'));
    //dump($this->getRequest()->getSession()->read('homecontroller'));
    return $this->redirect(['controller'=>$this->getRequest()->getSession()->read('homecontroller'), 'action' => 'home']);
}
// Cache::disable();
if ($this->request->is('post')) 
{
    $user = $this->Auth->identify();
   
    if ($user) {
       // debug($user->role_id);
        $this->Auth->setUser($user);
        $role_redirect=$this->Auth->User('role_id');
        //$user_name=$this->Auth->User('user_name');
      // dump($user_name);
        switch($role_redirect)
        {
            case 1: return $this->redirect($this->Auth->redirectUrl(['controller'=>'Absentees','action'=>'home']));
                    break;
            case 2: return $this->redirect($this->Auth->redirectUrl(['controller'=>'Vc','action'=>'home']));
                    break;
            case 3: return $this->redirect($this->Auth->redirectUrl(['controller'=>'Admin','action'=>'home']));
                    break;
            

        }
       
        $this->Flash->success('You are now login to Chandel VIS.');
        return $this->redirect($this->Auth->redirectUrl(['controller'=>'Dataentry','action'=>'data']));
    }
    $this->Flash->error('Your username or password is incorrect.');
}
}

public function logout()
{
  // $this->Flash->success('You are now logged out.');
  $this->getRequest()->getSession()->destroy();
  //$session->destroy();
  return $this->redirect($this->Auth->logout());
   // return $this->redirect(['controller'=>'Dashboard','action'=>'display']);
}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['user_roles', 'Departments']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['user_roles', 'Departments']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $roles=$this->Users->user_roles->find('list',
        ['keyField'=>'user_role_id',
        'valueField'=>'user_role_name']);
        $departments = $this->Users->Departments->find('list', ['keyField' => 'department_id', 'valueField'=>'department_name']);
        $this->set(compact('user', 'roles', 'departments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $departments = $this->Users->Departments->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'departments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function changepassword($id=null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user))
             {

               
                $this->Flash->success(__('The password has been successfully changed.. Plz login again with the new password'));
                 $this->redirect(['action' => 'logout']);

            }
            $this->Flash->error(__('The password could not be changed. Please, try again.'));
        }
        $this->set(compact('user'));

}
}

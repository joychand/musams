<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php  $login_user=$this->request->getSession()->read('Auth.User'); 
                  //debug();    
        if ( $login_user['role_id']==13){?>
         <li><?= $this->Html->link(__('Add New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Manage Users'), ['action' => 'index']) ?></li>
        <?php } 
        else {
            $homecontroller=$this->request->getSession()->read('homecontroller');
           // dump($homecontroller);
            ?>
          <li><?= $this->Html->link(__('Home'), ['controller'=>$homecontroller,'action' => 'home']) ?></li>
        <?php }?>
       
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Change Password') ?></legend>
        <?php
           // echo $this->Form->control('user_creation_date', ['empty' => true]);
           //echo $this->Form->control('user_id');
           // echo $this->Form->control('user_name',['label'=>'UserName','required'=>true]);
            echo $this->Form->control('password',['type'=>'password','required'=>true,'label'=>'New Password:','value'=>'']);
            echo $this->Form->control('confirm_passwd',['type'=>'password','required'=>true,'label'=>'Confirm Password:','value'=>'']);
           // echo $this->Form->control('user_email',['label'=>'email','required'=>true]);
           // echo $this->Form->control('user_mobile',['label'=>'Contact No.','required'=>true]);
            //echo $this->Form->control('role_id',['type'=>'select','Label'=>'Role to be Assigned:','options'=>$roles,'empty'=>'Select role','required'=>true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Change Password')) ?>
    <?= $this->Form->end() ?>
</div>
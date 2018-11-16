<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */


$this->layout = false;


$cakeDescription = 'MUSAMS:MU Student Absentees Monitoring System';
?>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    
                        
</head>
<body>
<?= $this->Flash->render() ?>  
<div class="row">
<div class=" small-12  small-centered columns">
<?= $this->Html->image('720039logo.png') ?>
 </div>
</div>
<div class="row">
    
        <h2 class="small-12 small-centered columns" style="text-align:center !important">Monitoring System</h2>
        
   
</div>
 <div class="row">
 
    <div class=" large-5 medium-4 " style="margin: auto !important ;border: 3px !important; padding: 10px!important;">
        <h3 align="center">Login</h3>
        <?= $this->Form->create( ) ?>
        <?= $this->Form->control('user_name',['required'=>true,'autocomplete' => 'off']) ?>
        <?= $this->Form->control('password',['type'=>'password','required'=>true]) ?>
        
        <?= $this->Form->button('Login') ?>
        <?= $this->Form->end() ?>
    </div>
 </div>
 
</body>
</html>
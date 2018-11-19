<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Absentee $absentee
 */
$this->assign('title', 'Weekly Absentee Data');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Reports'), ['action' => 'index']) ?></li>
        <!-- <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li> -->
    </ul>
</nav>
<div class="absentees form large-9 medium-8 columns content">
<!-- <h1>jQuery weekpicker</h1>

  <div id="weekpicker"></div>
  <div class="">Week starting: <b id="week-start"></b></div> -->

  
  <script>
    $(document).ready(function() {
        $( "#from_date" ).datepicker( 
            {dateFormat: 'dd/mm/yy',
            altField: ".from_date",
             altFormat: "yy-mm-dd" ,
            onSelect: function (selected) {
               // alert(selected);
            var dt = new Date(selected);
            //dt.setDate(dt.getDate('dd/mm/yy') + 1);
          // alert(dt);
            $("#to_date").datepicker("option", "minDate",selected);
            }
        
        });
        $( "#to_date" ).datepicker(  
            {dateFormat: 'dd/mm/yy',
             altField: ".to_date",
             altFormat: "yy-mm-dd",
             onSelect: function (selected) {
                
            var dt = new Date(selected);
           // dt.setDate(dt.getDate('dd/mm/yy') - 1);
    // alert(dt);
            $("#from_date").datepicker("option","maxDate",selected );
        }
            
            });
    //   var dateText = '11/14/2018',
    //     display = $('#week-start');
    //   display.text(dateText);
    //   $('#weekpicker').weekpicker({
    //     currentText: dateText,
    //     onSelect: function(dateText, startDateText, startDate, endDate, inst) {
    //       display.text(startDateText);
    //     },
    //     restrictWeeks: ['06/10/2018', '06/24/2018', '07/15/2018']
    //   });
    });
  </script>
</body>
    <?= $this->Form->create($absentee) ?>
    <fieldset>
        <legend><?= __('Add Weekly Absentee Data') ?></legend>
        <?php
            // echo $this->Form->control('department_id', ['options' => $departments, 'empty' => true]);
            // echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            // echo $this->Form->control('creation_date');
            echo $this->Form->control('start_date', [ 'label'=>'Week Start Date','type'=>'text','id'=>'from_date', 'required'=>'true','autocomplete'=>'Off']);
            echo $this->Form->control('end_date', [ 'label'=>'Week End Date','type'=>'text','id'=>'to_date', 'required'=>'true','autocomplete'=>'Off']);
            echo $this->Form->control('from_date', [ 'label'=>'Week Start Date','type'=>'hidden','class'=>'from_date', 'required'=>'true','hidden'=>true]);
            echo $this->Form->control('to_date', [ 'label'=>'Week End Date','type'=>'hidden','class'=>'to_date', 'required'=>'true','hidden'=>true]);
            echo $this->Form->control('total_lectures',['label'=> 'No. of Lectures in the Week:', 'required'=>true]);
            echo $this->Form->control('total_absentees',['label'=> 'No. of Students Absent in the week', 'required'=>true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

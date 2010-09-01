<?php

echo $this->Form->create('Group')
	.$this->Form->input('Group.name', array('type' => 'text', 'label' => __('Name', true)))
	.$this->Form->input('Group.description')
	.$this->Form->input('Group.id', array('type' => 'hidden', array('label' => __('Description', true)))
	.$this->Form->end(__('Save', true))
;

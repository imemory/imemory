<?php

echo $this->Form->create('Group')
	.$this->Form->input('Group.name')
	.$this->Form->input('Group.description')
	.$this->Form->input('Group.id', array('type' => 'hidden'))
	.$this->Form->end('Salvar')
;

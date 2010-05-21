<?php

echo $this->Form->create('Group')
	. $this->Form->input('Group.name')
	. $this->Form->input('Group.description')
	. $this->Form->end('Create')
;

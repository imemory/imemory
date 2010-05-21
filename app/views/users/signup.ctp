
<?php

echo $this->Form->create('User')
	. $this->Form->input('User.username')
	. $this->Form->input('User.email')
	. $this->Form->input('User.password')
. $this->Form->end('Signup')
;

?>

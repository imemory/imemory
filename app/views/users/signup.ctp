
<div class='main signup'>

<?= $this->Form->create('User') ?>

<div class='field-messages<?= ($this->Form->isFieldError('User.username') ? ' error' : '')?>'>
	<div class='field'>
		<?= $this->Form->label('User.username') ?>
		<?= $this->Form->text('User.username', array('type'=>'text')) ?>
	</div>
	<div class='messages'>
		<p>É pelo seu apelido que você vai ser conhecido no iMemory, então escolha um bem legal!</p>
		<?= $this->Form->error('User.username') ?>
	</div>
	<div class='clear'></div>
</div>

<div class='field-messages<?= ($this->Form->isFieldError('User.email') ? ' error' : '')?>'>
	<div class='field'>
		<?= $this->Form->label('User.email') ?>
		<?= $this->Form->text('User.email', array('type'=>'text')) ?>
	</div>
	<div class='messages'>
		<p>Prometemos que não lhe mandaremos spam</p>
		<?= $this->Form->error('User.email') ?>
	</div>
	<div class='clear'></div>
</div>


<div class='field-messages'>
	<div class='field'>
		<?= $this->Form->label('User.password') ?>
		<?= $this->Form->text('User.password', array('type'=>'password')) ?>
	</div>
	<div class='messages'>
		<p>Escolha uma boa senha e não compartilhe com ninguém.</p>
		<?= $this->Form->error('User.password') ?>
	</div>
	<div class='clear'></div>
</div>
<?= $this->Form->end(__('Signup', true)) ?>


</div>

<div class='sidebar'>
	<div class='box'>
		<h3>Porque se cadastrar?</h3>
		<p>Sendo um membro cadastrado, você poderá criar seus próprios flashcards,
		Adicionar amigos, mandar mensagens e estudar seguindo a metodologia iMemory
		tabajara.</p>
	</div>
</div>

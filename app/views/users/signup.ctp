
<div class='main signup'>

<?= $this->Form->create('User') ?>

<div class='field-messages<?= ($this->Form->isFieldError('User.username') ? ' error' : '')?>'>
	<div class='field'>
		<?= $this->Form->label('User.username', __('Username', true)) ?>
		<?= $this->Form->text('User.username', array('type'=>'text')) ?>
	</div>
	<div class='messages'>
		<p><?php __('É pelo seu apelido que você vai ser conhecido no iMemory, então escolha um bem legal!') ?></p>
		<?= $this->Form->error('User.username') ?>
	</div>
	<div class='clear'></div>
</div>

<div class='field-messages<?= ($this->Form->isFieldError('User.email') ? ' error' : '')?>'>
	<div class='field'>
		<?= $this->Form->label('User.email', __('E-mail', true)) ?>
		<?= $this->Form->text('User.email', array('type'=>'text')) ?>
	</div>
	<div class='messages'>
		<p><?php __('Prometemos que não lhe mandaremos spam...') ?></p>
		<?= $this->Form->error('User.email') ?>
	</div>
	<div class='clear'></div>
</div>


<div class='field-messages'>
	<div class='field'>
		<?= $this->Form->label('User.password1', __('Password', true)) ?>
		<?= $this->Form->text('User.password1', array('type'=>'password')) ?>
		<div class="retype-password">
		    <?= $this->Form->label('User.password2', __('Retype password', true)) ?>
    		<?= $this->Form->text('User.password2', array('type'=>'password')) ?>
        </div>
	</div>
	<div class='messages'>
		<p><?php __('Escolha uma boa senha e não compartilhe com ninguém.') ?></p>
		<?= $this->Form->error('User.password1') ?>
		<?= $this->Form->error('User.password2') ?>
	</div>
	<div class='clear'></div>
</div>
<?= $this->Form->end(__('Signup', true)) ?>


</div>

<div class='sidebar'>
	<?= $this->element('locale/en_about_signup'); ?>
</div>

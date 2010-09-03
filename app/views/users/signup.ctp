
<div class='main signup'>

<?= $this->Form->create('User') ?>

<div class='field-messages<?= ($this->Form->isFieldError('User.username') ? ' error' : '')?>'>
	<div class='field'>
		<?= $this->Form->label('User.username', __('Username', true)) ?>
		<?= $this->Form->text('User.username', array('type'=>'text')) ?>
	</div>
	<div class='messages'>
		<p><?php __('In iMemory you´ll be known by your nickname, so choose a nice one!') ?></p>
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
		<p><?php __('We promisse not to send you spam...') ?></p>
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
		<p><?php __('Choose a good password and do not share it with anyone.') ?></p>
		<?= $this->Form->error('User.password1') ?>
		<?= $this->Form->error('User.password2') ?>
	</div>
	<div class='clear'></div>
</div>
<?= $this->Form->end(__('Signup', true)) ?>


</div>

<div class='sidebar'>
	<?= $this->element('locale/'. Configure::read('Config.language') .'_about_signup'); ?>
</div>

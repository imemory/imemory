
<?php echo $this->Html->script('vimeo.js', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
	$(document).ready(function(){
		$.vimeo('#video-placeholder', 'http://www.vimeo.com/757219');
	});
<?php echo $this->Html->scriptEnd(); ?>


<div class='main home'>
	
	<h2>O <strong>iMemory</strong> vai salvar sua vida nos estudos!</h2>
	
	<div class='presentation'>
		<p id='video-placeholder'>Video</p>
	</div>
</div>

<div class='sidebar'>
	<div class='box'>
		<h3>Latest users</h3>
	</div>
</div>


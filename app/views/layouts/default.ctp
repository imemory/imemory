<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang='pt-br' xml:lang='pt-br' xmlns='http://www.w3.org/1999/xhtml'>
  <head>
    <?= $this->Html->charset() ?>
    <title><?= $title_for_layout ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(array('reset', 'layout', 'ui/jquery-ui')) ?>
    <?= $this->Html->script(array('jquery.js', 'jquery-ui', 'imemory')) ?>
    <?= $scripts_for_layout ?>
    <?= $this->Google->initTracker() ?>
  </head>
  <body>
    <div class='header'>
      <h1><?= $this->Html->link('Imemory', '/') ?></h1>
      <div class='user-menu'><?= $this->element('user_menu') ?></div>
      <div class='clear'></div>
    </div>
    <div class='main-menu'>
      <?= $this->element('main_menu') ?>
      <div class='clear'></div>
    </div>
    <div class='content'>
      <?= $this->Session->flash(); ?>
      <?= $this->Session->flash('email') ?>
      <?= $content_for_layout ?>
      <div class='clear'></div>
    </div>
    <div class='footer'>
      <p><?= $html->link('&copy; iMemory - 2010', array('controller' => 'home'), array('escape' => false)) ?></p>
      <?= $this->element('main_menu') ?>
      <p><?php __('Language'); ?>:
      <?php echo $this->Html->link('English', '/lang/en_us'); ?>,
      <?php echo $this->Html->link('Português', '/lang/pt_br'); ?></p>
    </div>
    <?= $this->element('sql_dump') ?>
    <?= $this->Google->endTracker() ?>
  </body>
</html>

<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');?>
<?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');?>
<?php echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');?>

<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
if (extension_loaded('xdebug')) :
    xdebug_print_function_stack();
endif;

$this->end();
endif;
?>
<br>
<div align="center">
<h1><?= h($message) ?></h1>
<p class="error">
    
    <strong><?= __d('cake', '404') ?>: </strong>
    <?= __d('cake', 'The page you are looking for does not exist, sorry about that!<br><br>', "<strong>'{$url}'</strong>") ?>
    <img src="https://i.kym-cdn.com/photos/images/original/001/120/241/0a1.jpg" width="321" height="307" />
    <p><cite>&copy Blizzard Entertainment, Inc. All rights reserved. <br> All trademarks referenced herein are the properties of their respective owners.</cite></p>
</p>
</div>

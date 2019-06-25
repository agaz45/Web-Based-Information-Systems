<?php echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');?>
<?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');?>
<?php echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');?>

<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error500.ctp');

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
<?php if ($error instanceof Error) : ?>
        <strong>Error in: </strong>
        <?= sprintf('%s, line %s', str_replace(ROOT, 'ROOT', $error->getFile()), $error->getLine()) ?>
<?php endif; ?>
<?php
    echo $this->element('auto_table_warning');

    if (extension_loaded('xdebug')) :
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
<div align="center">
<h1><?= __d('cake', 'An Internal Error Has Occurred') ?></h1>
<p class="error">
    <strong><?= __d('cake', '500') ?>: </strong>
    <?= h($message) ?>
    <br>
    <?= 'Sorry about that, we will look into the issue ASAP!' ?>
    <br><br>
    <img src="https://i.imgur.com/eeJXtAo.png" width="240" height="240" /> 
    <img src="https://i.imgur.com/ichvLV5.png" width="240" height="240" />
    <img src="https://i.imgur.com/UeYeoUS.png" width="240" height="240" />
    <p><cite>&copy 2017 Riot Games, Inc. All rights reserved.<br> Riot Games, League of Legends and PvP.net are trademarks, services marks, or registered trademarks of Riot Games, Inc.</cite></p> 
</p>

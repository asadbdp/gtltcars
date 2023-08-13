<?php
/* Smarty version 3.1.30, created on 2016-12-04 00:10:52
  from "/home/users/1/lolipop.jp-clickandget/web/gtltcars/account/ibilling/ui/theme/ibilling/activity.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58430aac9a4a41_67838694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09bf7a8065acb549156ebe944d7d9e689155c6ce' => 
    array (
      0 => '/home/users/1/lolipop.jp-clickandget/web/gtltcars/account/ibilling/ui/theme/ibilling/activity.tpl',
      1 => 1480748795,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_58430aac9a4a41_67838694 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




<div class="row">
    <div class="col-md-12">

        <div id="ib_msg">
            <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

        </div>



    </div>



</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}

<?php
/* Smarty version 3.1.30, created on 2016-12-03 13:55:06
  from "/home/users/1/lolipop.jp-clickandget/web/gtltcars/account/ibilling/ui/theme/ibilling/util_integrationcode.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58427a5a6ebc39_60715473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'daac28f14e33c16ee83dd58d7f87be04e5241e61' => 
    array (
      0 => '/home/users/1/lolipop.jp-clickandget/web/gtltcars/account/ibilling/ui/theme/ibilling/util_integrationcode.tpl',
      1 => 1480748801,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_58427a5a6ebc39_60715473 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




<div class="row">

    <div class="col-md-8 col-xs-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Integration Code'];?>
</h5>

            </div>
            <div class="ibox-content">
                <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Client Login'];?>
</h4>
<pre class="line-numbers language-markup"><code><?php echo $_smarty_tpl->tpl_vars['form_client_login']->value;?>
</code></pre>
                <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Client Registration'];?>
</h4>
                <pre class="line-numbers language-markup"><code><?php echo $_smarty_tpl->tpl_vars['form_client_register']->value;?>
</code></pre>

            </div>
        </div>
    </div>



</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}

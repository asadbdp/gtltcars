<?php
/* Smarty version 3.1.30, created on 2016-12-03 13:55:10
  from "/home/users/1/lolipop.jp-clickandget/web/gtltcars/account/ibilling/ui/theme/ibilling/util_sys_status.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58427a5eaf88a9_70765737',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9666e2e36501be6580446d9f993f98dfb55ac0e8' => 
    array (
      0 => '/home/users/1/lolipop.jp-clickandget/web/gtltcars/account/ibilling/ui/theme/ibilling/util_sys_status.tpl',
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
function content_58427a5eaf88a9_70765737 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




<div class="row">

    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Application Environment'];?>
</h5>

            </div>
            <div class="ibox-content">

                <table class="table table-bordered sys_table">
                    <tbody>

                    <tr>
                        <td width="300px;">Time</td>
                        <td><span id="clock"></span> </td>
                    </tr>

                    <tr>
                        <td>BASE URL</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
</td>
                    </tr>

                    <tr>
                        <td>Application Stage</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['app_stage']->value;?>
</td>
                    </tr>

                    <tr>
                        <td>Default Language</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['_c']->value['language'];?>
</td>
                    </tr>


                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Server Environment'];?>
</h5>
                <div class="ibox-tools">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/sys_status_dl/" class="btn btn-primary btn-xs"><i class="fa fa-download"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Download'];?>
 </a>
                </div>
            </div>
            <div class="ibox-content">

                <?php echo $_smarty_tpl->tpl_vars['pinfo']->value;?>


            </div>
        </div>
    </div>

</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}

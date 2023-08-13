<?php
/* Smarty version 3.1.30, created on 2016-12-03 15:01:13
  from "/home/users/1/lolipop.jp-clickandget/web/gtltcars/account/ibilling/ui/theme/ibilling/account-edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_584289d9e91103_07269445',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f619c1d3d2d2e2a9a93261bb3b74cada0577435f' => 
    array (
      0 => '/home/users/1/lolipop.jp-clickandget/web/gtltcars/account/ibilling/ui/theme/ibilling/account-edit.tpl',
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
function content_584289d9e91103_07269445 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="widget-1 col-md-6 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit_Account'];?>
</h3>
            </div>
            <div class="panel-body">
                <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/edit-post">
                    <div class="form-group">
                        <label for="account"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account_Title'];?>
</label>
                        <input type="text" class="form-control" id="account" name="account" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->account;?>
">
                    </div>
                    <div class="form-group">
                        <label for="description"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->description;?>
">
                    </div>


                    <div class="form-group">
                        <label for="account_number"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account Number'];?>
</label>
                        <input type="text" class="form-control" id="account_number" name="account_number" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->account_number;?>
">
                    </div>

                    <div class="form-group">
                        <label for="contact_person"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Contact Person'];?>
</label>
                        <input type="text" class="form-control" id="contact_person" name="contact_person" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->contact_person;?>
">
                    </div>

                    <div class="form-group">
                        <label for="contact_phone"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</label>
                        <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->contact_phone;?>
">
                    </div>

                    <div class="form-group">
                        <label for="ib_url"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Internet Banking URL'];?>
</label>
                        <input type="text" class="form-control" id="ib_url" name="ib_url" value="<?php echo $_smarty_tpl->tpl_vars['d']->value->ib_url;?>
">
                    </div>


<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                </form>
            </div>
        </div>
    </div> <!-- Widget-1 end-->

    <!-- Widget-2 end-->
</div>


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}

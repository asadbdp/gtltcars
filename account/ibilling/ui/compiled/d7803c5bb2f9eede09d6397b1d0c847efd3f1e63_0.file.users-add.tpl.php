<?php
/* Smarty version 3.1.30, created on 2016-12-03 02:10:58
  from "/home/users/1/lolipop.jp-clickandget/web/gtltcars/account/ibilling/ui/theme/ibilling/users-add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_584270029aa6b8_17636019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7803c5bb2f9eede09d6397b1d0c847efd3f1e63' => 
    array (
      0 => '/home/users/1/lolipop.jp-clickandget/web/gtltcars/account/ibilling/ui/theme/ibilling/users-add.tpl',
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
function content_584270029aa6b8_17636019 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New User'];?>
</h5>

            </div>
            <div class="ibox-content">

                <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-post">
                    <div class="form-group">
                        <label for="username"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Username'];?>
</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="fullname"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Name'];?>
</label>
                        <input type="text" class="form-control" id="fullname" name="fullname">
                    </div>
                    <div class="form-group">
                        
                        
                            
                            

                        
                        

                        <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['User'];?>
 <?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</label>

                        <div class="i-checks"><label> <input type="radio" value="Admin" name="user_type" checked> <i></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Administrator'];?>
 </label></div>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
?>
                            <div class="i-checks"><label> <input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['role']->value['id'];?>
" name="user_type"> <i></i> <?php echo $_smarty_tpl->tpl_vars['role']->value['rname'];?>
 </label></div>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>




                    </div>




                    <div class="form-group">
                        <label for="password"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="form-group">
                        <label for="cpassword"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Confirm Password'];?>
</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Or'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</a>
                </form>

            </div>
        </div>



    </div>



</div>




<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}

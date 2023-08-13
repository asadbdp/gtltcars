<?php
/* Smarty version 3.1.30, created on 2016-12-03 13:24:51
  from "/home/users/1/lolipop.jp-clickandget/web/gtltcars/account/ibilling/ui/theme/ibilling/appearance_editor.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58427343daeea6_04277105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6380780e5bb5ea1483836fd9c461da5e59cecfb' => 
    array (
      0 => '/home/users/1/lolipop.jp-clickandget/web/gtltcars/account/ibilling/ui/theme/ibilling/appearance_editor.tpl',
      1 => 1480748796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_58427343daeea6_04277105 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




<div class="row" id="ib_editor_canvas">
    <div class="col-lg-2">
        <div class="form-group">
            <label for="editor_file"><?php echo $_smarty_tpl->tpl_vars['_L']->value['File'];?>
</label>
            <select name="editor_file" id="editor_file" class="form-control">
                <option value="no_file" selected="selected" ><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select File to Edit'];?>
</option>
                <option value="language.php"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Language File'];?>
</option>
                <option value="invoice_printer.php"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Layout Print'];?>
</option>
                <option value="invoice_pdf.php"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Layout PDF'];?>
</option>


            </select>
        </div>
        <button type="submit" id="ib_btn_save" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
    </div>
    <div class="col-lg-10">


        <div id="editor" style="min-height: 800px;"></div>



    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}

<?php
/* Smarty version 4.2.1, created on 2022-10-18 02:00:19
  from 'C:\xampp\htdocs\web2\templates\mostrarPeleador.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634dec9344ac52_12578240',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '336233c9bc651aa8c696d4f5fd8e18dbd361106b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\templates\\mostrarPeleador.tpl',
      1 => 1666050885,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_634dec9344ac52_12578240 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <li class="list-group-item">nombre:<?php echo $_smarty_tpl->tpl_vars['peleador']->value->nombre;?>
</li>
    <li class="list-group-item">peso:<?php echo $_smarty_tpl->tpl_vars['peleador']->value->peso;?>
</li>
    <li class="list-group-item">nacionalidad:<?php echo $_smarty_tpl->tpl_vars['peleador']->value->nacionalidad;?>
</li>
    <p class="list-group-item">su categoria:</p>
    <li class="list-group-item">nombre:<?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</li>
    <li class="list-group-item">peso:<?php echo $_smarty_tpl->tpl_vars['categoria']->value->peso;?>
</li>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

<?php /* Smarty version Smarty-3.1.11, created on 2017-05-12 22:13:27
         compiled from "templates/plantillas/layout/json.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9864194455908cc788495b1-56855702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2e1aebeeb787353159b0daa9fa2fd6425b01ab9' => 
    array (
      0 => 'templates/plantillas/layout/json.tpl',
      1 => 1493751993,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9864194455908cc788495b1-56855702',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5908cc7889dc89_04723533',
  'variables' => 
  array (
    'json' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5908cc7889dc89_04723533')) {function content_5908cc7889dc89_04723533($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['json']->value!=''){?><?php echo json_encode($_smarty_tpl->tpl_vars['json']->value);?>
<?php }?><?php }} ?>
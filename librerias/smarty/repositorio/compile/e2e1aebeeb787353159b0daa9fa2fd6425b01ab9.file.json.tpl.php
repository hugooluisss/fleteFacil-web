<?php /* Smarty version Smarty-3.1.11, created on 2017-11-09 14:01:51
         compiled from "templates/plantillas/layout/json.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19112965085a047309e79934-34063897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '19112965085a047309e79934-34063897',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a047309ea2476_45637599',
  'variables' => 
  array (
    'json' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a047309ea2476_45637599')) {function content_5a047309ea2476_45637599($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['json']->value!=''){?><?php echo json_encode($_smarty_tpl->tpl_vars['json']->value);?>
<?php }?><?php }} ?>
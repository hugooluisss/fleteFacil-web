<?php /* Smarty version Smarty-3.1.11, created on 2017-11-09 09:14:29
         compiled from "templates/plantillas/layout/json.tpl" */ ?>
<?php /*%%SmartyHeaderCode:782830215a0470d5035b07-55034245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2e1aebeeb787353159b0daa9fa2fd6425b01ab9' => 
    array (
      0 => 'templates/plantillas/layout/json.tpl',
      1 => 1493749916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '782830215a0470d5035b07-55034245',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'json' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a0470d5087732_34872361',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0470d5087732_34872361')) {function content_5a0470d5087732_34872361($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['json']->value!=''){?><?php echo json_encode($_smarty_tpl->tpl_vars['json']->value);?>
<?php }?><?php }} ?>
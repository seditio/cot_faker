<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=tools
[END_COT_EXT]
==================== */

defined('COT_CODE') or die('Wrong URL');

/**
 * Faker Plugin
 *
 * @version 1.00
 * @author Twibie / Dmitri Beliavski
 * @copyright (c) 2025 SED.by
 */

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('plug', 'faker');
cot_block($usr['isadmin']);

require_once cot_incfile('faker', 'plug');
require_once cot_langfile('faker', 'plug');

$t = new XTemplate(cot_tplfile('faker', 'plug', true));

$type = cot_import('type', 'G', 'ALP');

// Pages
$t->assign([
  'FAKER_PAGES_ACTION'    => cot_url('admin', 'm=other&p=faker&type=pages&a=generate'),
  'FAKER_PAGES_CAT'       => cot_selectbox_structure('page', '', 'faker_page_cat'),
  'FAKER_PAGES_AMOUNT'    => cot_inputbox('number', 'faker_page_amount', 1, ['class' => 'form-control w-auto', 'min' => '1']),
  'FAKER_PAGES_MAX_TITLE' => cot_inputbox('number', 'faker_page_max_title', 5, ['class' => 'form-control w-auto', 'min' => '1']),
  'FAKER_PAGES_MAX_DESC'  => cot_inputbox('number', 'faker_page_max_desc', 5, ['class' => 'form-control w-auto', 'min' => '1']),
  'FAKER_PAGES_MAX_TEXT'  => cot_inputbox('number', 'faker_page_max_text', 500, ['class' => 'form-control w-auto', 'min' => '100'])
]);

if ($a == 'generate' && $type == 'pages' && $_SERVER['REQUEST_METHOD'] == 'POST') {
  $page_cat       = cot_import('faker_page_cat', 'P', 'TXT');
  $page_amount    = cot_import('faker_page_amount', 'P', 'INT');
  $page_max_title = cot_import('faker_page_max_title', 'P', 'INT');
  $page_max_desc = cot_import('faker_page_max_desc', 'P', 'INT');
  $page_max_text = cot_import('faker_page_max_text', 'P', 'INT');

  if (faker_gen_pages($page_cat, $page_amount, $page_max_title, $page_max_desc, $page_max_text)) {
    cot_page_updateStructureCounters($page_cat);
    cot_message($L['faker_done_pages'] . ' ' . $page_amount);
  } else {
    cot_error('faker_error_pages');
  }
  cot_redirect(cot_url('admin', 'm=other&p=faker', '', true));
}

// Users
$t->assign([
  'FAKER_USERS_ACTION'  => cot_url('admin', 'm=other&p=faker&type=users&a=generate'),
  'FAKER_USERS_AMOUNT'  => cot_inputbox('number', 'faker_user_amount', 1, ['class' => 'form-control w-auto', 'min' => '1']),
  'FAKER_USERS_GROUP'   => cot_selectbox_groups(4, 'faker_user_group')
]);

if ($a == 'generate' && $type == 'users' && $_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_amount = cot_import('faker_user_amount', 'P', 'INT');
  $user_group  = cot_import('faker_user_group', 'P', 'INT');

  $res = faker_gen_users($user_amount, $user_group);
  $res_tail = ' ' . $res . ' ' . $L['Of'] . ' ' . $user_amount;

  if ($res == 0) {
    cot_error($L['faker_done_users'] . $res_tail);
  } elseif ($res == $user_amount) {
    cot_message($L['faker_done_users'] . $res_tail, 'ok');
  } else {
    cot_message($L['faker_done_users'] . $res_tail, 'warning');
  }
  cot_redirect(cot_url('admin', 'm=other&p=faker', '', true));
}

// Comments
$t->assign([
  'FAKER_COMMENTS_ACTION'   => cot_url('admin', 'm=other&p=faker&type=comments&a=generate'),
  'FAKER_COMMENTS_AMOUNT'   => cot_inputbox('number', 'faker_comment_amount', 1, ['class' => 'form-control w-auto', 'min' => '1']),
  'FAKER_COMMENTS_MAX_TEXT' => cot_inputbox('number', 'faker_comment_max_text', 300, ['class' => 'form-control w-auto', 'min' => '100'])
]);

if ($a == 'generate' && $type == 'comments' && $_SERVER['REQUEST_METHOD'] == 'POST') {
  $comment_amount = cot_import('faker_comment_amount', 'P', 'INT');
  $comment_max_text = cot_import('faker_comment_max_text', 'P', 'INT');

  if (faker_gen_comments($comment_amount, $comment_max_text)) {
    cot_message($L['faker_done_comments'] . ' ' . $comment_amount);
  } else {
    cot_error('faker_error_comments');
  }
  cot_redirect(cot_url('admin', 'm=other&p=faker', '', true));
}

cot_display_messages($t);
$t->parse('MAIN.FORM');
$t->parse();
$adminMain = $t->text();

<?php

/**
 * RU Locale for the Faker Plugin
 *
 * @version 1.00
 * @author Twibie / Dmitri Beliavski
 * @copyright (c) 2025 SED.by
 */

(defined('COT_CODE') && defined('COT_ADMIN')) or die('Wrong URL.');

$L['info_name'] = '[SEDBY] Faker';
$L['info_desc'] = 'Создание тестовых страниц, комментариев и пользовательских аккаунтов';

$L['cfg_path2composer'] = 'Путь к библиотеке Faker';
$L['cfg_path2composer_hint'] = 'Оставить пустым если используется Composer';
$L['cfg_locale'] = 'Локаль';

// Pages
$L['faker_pages_category']  = 'Раздел для страниц';
$L['faker_pages_amount']    = 'Количество создаваемых страниц';
$L['faker_pages_max_title'] = 'Количество слов в заголовке';
$L['faker_pages_max_desc'] = 'Количество слов в описании';
$L['faker_pages_max_text'] = 'Количество символов в тексте';

// Users
$L['faker_users_amount'] = 'Количество создаваемых пользователей';
$L['faker_users_group']  = 'Группа для создаваемых пользователей';

// Comments
$L['faker_comments_amount'] = 'Количество создаваемых комментариев';
$L['faker_comments_max_text'] = 'Количество символов в тексте';

// Buttons
$L['faker_generate'] = 'Создать';

// Messages
$L['faker_done_pages']  = 'Создано страниц:';
$L['faker_done_users']  = 'Создано пользователей:';
$L['faker_done_comments']  = 'Создано комментариев:';

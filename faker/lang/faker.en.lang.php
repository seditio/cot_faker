<?php

/**
 * EN Locale for the Faker Plugin
 *
 * @version 1.00
 * @author Twibie / Dmitri Beliavski
 * @copyright (c) 2025 SED.by
 */

(defined('COT_CODE') && defined('COT_ADMIN')) or die('Wrong URL.');

$L['info_name'] = '[SEDBY] Faker';
$L['info_desc'] = 'Create fake pages and user accounts for testing purposes';

$L['cfg_path'] = 'Path to Faker';
$L['cfg_path_hint'] = 'Leave empty if Composer is used';

// Pages
$L['faker_pages_category']  = 'Page category';
$L['faker_pages_amount']    = 'Number of pages to create';
$L['faker_pages_max_title'] = 'Words in page title';
$L['faker_pages_max_desc'] = 'Words in page description';
$L['faker_pages_max_text'] = 'Characters in page text';

// Users
$L['faker_users_amount'] = 'Number of the users to create';
$L['faker_users_group']  = 'Group for the users to create';

// Comments
$L['faker_comments_amount'] = 'Number of the comments to create';
$L['faker_comments_max_text'] = 'Characters in comment text';

// Buttons
$L['faker_generate'] = 'Generate';

// Messages
$L['faker_error_users'] = 'Users not created';
$L['faker_error_pages'] = 'Pages not created';
$L['faker_error_comments'] = 'Comments not created';

$L['faker_done_pages']  = 'Successfully created pages:';
$L['faker_done_users']  = 'Successfully created users:';
$L['faker_done_comments']  = 'Successfully created comments:';

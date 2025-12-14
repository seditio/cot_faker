<?php

/**
 * Functions for the Faker Plugin
 *
 * @version 1.00
 * @author Twibie / Dmitri Beliavski
 * @copyright (c) 2025 SED.by
 */

(defined('COT_CODE') && defined('COT_ADMIN')) or die('Wrong URL.');

require_once cot_incfile('page', 'module');
require_once cot_incfile('users', 'module');
require_once cot_langfile('faker', 'plug');

if (empty($cfg['plugin']['faker']['path2composer'])) {
  // require_once 'lib/vendor/fakerphp/faker/src/autoload.php';
  require_once 'lib/vendor/autoload.php';
} else {
  require_once $cfg['plugin']['faker']['path'];
}

use lib\vendor\fakerphp\faker\src\Faker\Factory;

/**
 * Generate pages with fake data
 * @param  string $page_cat       Category for pages
 * @param  int    $page_amount    Amount of pages to generate
 * @param  int    $page_max_title Max words in page title
 * @param  int    $page_max_desc  Max words in page description
 * @param  int    $page_max_chars Max characters in page text
 * @return bool                   True on success
 */
function faker_gen_pages($page_cat, $page_amount, $page_max_title, $page_max_desc, $page_max_text) {
  $locale = Cot::$cfg['plugin']['faker']['locale'] ? Cot::$cfg['plugin']['faker']['locale'] : 'en_EN';
  $faker = Faker\Factory::create($locale);

  for ($i = 0; $i < $page_amount; $i++) {
    $page = [
      'page_cat'    => $page_cat,
      'page_title'  => $faker->sentence($nbWords = $page_max_title),
      'page_desc'   => $faker->sentence($nbWords = $page_max_desc),
      'page_text'   => $faker->text($maxNbChars = $page_max_text),
      'page_parser' => Cot::$cfg['page']['parser'],
      'page_author' => $faker->firstName(),
      'page_date'   => $faker->dateTimeBetween(faker_get_admin_regtime(), 'now')->getTimestamp()
    ];
    $pages[] = $page;
  }

  if (Cot::$db->insert(Cot::$db->pages, $pages)) {
    return true;
  } else {
    return false;
  }
}

/**
 * Generate fake users
 * @param  int $user_amount Amount of users to generate
 * @param  int $user_group  User group for generated users
 * @return bool             True on success
 */
function faker_gen_users($user_amount, $user_group) {
  $locale = Cot::$cfg['plugin']['faker']['locale'] ? Cot::$cfg['plugin']['faker']['locale'] : 'en_EN';
  $faker = Faker\Factory::create($locale);

  for ($i = 0; $i < $user_amount; $i++) {
    $user = array(
      'user_name'  => $faker->firstName(),
      'user_text'  => $faker->sentence($nbWords = 5),
      'user_email' => $faker->email()
    );
    $users[] = $user;
  }

  $ii = 0;
  foreach ($users as $user) {
    (cot_add_user($user, $user['user_email'], $user['user_name'], '', $user_group, false)) && $ii++;
  }

  return $ii;
}

/**
 * Generate comments with fake data
 * @param  int    $comment_amount   Amount of comments to generate
 * @param  int    $comment_max_text Max characters in comment text
 * @return bool                     True on success
 */
function faker_gen_comments($comment_amount, $comment_max_text) {
  $locale = Cot::$cfg['plugin']['faker']['locale'] ? Cot::$cfg['plugin']['faker']['locale'] : 'en_EN';
  $faker = Faker\Factory::create($locale);

  for ($i = 0; $i < $comment_amount; $i++) {
    $comment = [
      'com_area'  => 'page',
      'com_code'  => faker_get_random_pageid(),
      'com_text'  => '<p>' . $faker->text($maxNbChars = $comment_max_text) . '</p>',
      'com_author' => $faker->firstName(),
      'com_authorid' => 0,
      'com_authorip' => '127.0.0.1',
      'com_date'   => $faker->dateTimeBetween(faker_get_admin_regtime(), 'now')->getTimestamp()
    ];
    $comments[] = $comment;
  }

  if (Cot::$db->insert(Cot::$db->com, $comments)) {
    return true;
  } else {
    return false;
  }
}

function faker_get_random_pageid() {
  $db_pages = Cot::$db->pages;
  $query = "SELECT page_id from $db_pages WHERE page_state = 0 AND page_cat != 'system'";
  $res = Cot::$db->query($query);
  while ($row = $res->fetchColumn()) {
    $ids[] = $row;
  }
  return $ids[array_rand($ids)];
}

function faker_get_admin_regtime() {
  $db_users = Cot::$db->users;
  $query = "SELECT user_regdate from $db_users WHERE user_id = 1";
  return cot_stamp2date(Cot::$db->query($query)->fetchColumn());
}

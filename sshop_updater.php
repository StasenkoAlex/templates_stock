<?php
/**
 * Simpla CMS Update
 * 
 * powered by Vados SimplaShop
 *
 * Файлик для внесения изменений в базу, необходимых для модуля "ЧПУ-фильтр расширенный"
 *
 */
 
require_once('api/Simpla.php');
$simpla = new Simpla();

/**
 * Добавляем необходимые поля в таблицы s_options и s_features
 */
$simpla->db->query("ALTER TABLE __options ADD `translit` VARCHAR(255) NOT NULL DEFAULT '' AFTER value");
$simpla->db->query("ALTER TABLE __features ADD `url` VARCHAR(255) NOT NULL DEFAULT '', ADD `is_index` TINYINT(1) NOT NULL DEFAULT '0';");
print_r('Поля добавлены');

/**
 * Проставляем урлы для свойств
 */
$simpla->db->query("SELECT `id`, `name` FROM __features ORDER BY id");
foreach($simpla->db->results() as $f){
    $simpla->features->update_feature($f->id,array('url'=>$simpla->features->translit($f->name)));
}
print_r('<br /><br />Урлы проставлены');

/**
 * Транслитерируем значения свойств
 */
$simpla->db->query("SELECT * FROM __options");
foreach($simpla->db->results() as $o){
    $simpla->features->update_option($o->product_id,$o->feature_id,$o->value);
}
print_r('<br /><br />Свойства транслитерированы');

//Автоудалялка
@unlink($_SERVER['SCRIPT_FILENAME']);
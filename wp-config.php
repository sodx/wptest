<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wptest2');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'T;]/xPwKM/X~xA)7c| N@VvD%U<yid{c.6sPZ[.0Cg)3%EhOnm7%3q%4X<?2.FdU');
define('SECURE_AUTH_KEY',  'GNHlEgG^|bhqebg@DMBSN~!{vL#1:O4:Ml>*sXXfM9a*uqyk#1+=+GX4&LDgl1wX');
define('LOGGED_IN_KEY',    'CyU5E]8j<uCF?/[I!Tg6 9:Xke/0XPsiKRh&]Aue nk?GRNLWV*tJ^Zy*9O7kV^^');
define('NONCE_KEY',        '^AvEd:FU4ud]n:!3HBaWT{ObZPw#gp,$E6O5oSka0@MJT7pSZ0GnZ4(lwb$yOjq)');
define('AUTH_SALT',        'Umf(xpuL[ {!6j?fas2gFkFg 6Ka&ftL^BZ|q|943ou^kxz?<{zlv)^V_szc+#|0');
define('SECURE_AUTH_SALT', 'bny_w=!Rgy-_|]-Ucl#vV<p;,Xut0ZRQjK=Kr~i39q(jGWIYd=yFJO9!yPh0h2Q1');
define('LOGGED_IN_SALT',   '(E%H./oJl>IvQ]0ySZkdG/.nkS |V_>e%C]?WG/|0)@)c)qQYpbEfCl`d@(sd| v');
define('NONCE_SALT',       '0aOL(8ZyUSfj9a=kRI^5^]]Oyt([Z39EBk)ApIjkymIM1hZ6.4ap5~zq,*?1e9^=');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'w_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');

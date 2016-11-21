<?php
/**
 * Created by PhpStorm.
 * User: dllo
 * Date: 16/9/5
 * Time: 下午3:06
 */

date_default_timezone_set("PRC");
mysql_connect(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,	SAE_MYSQL_PASS);
mysql_select_db(SAE_MYSQL_DB);
mysql_query("set names utf8");

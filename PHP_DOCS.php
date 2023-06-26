<?php
  /*
    String
    - lcfirst($str);
    - ucfirst($str);
    - strtolower($str);
    - strtoupper($str);
    - ucwords($str, $delimiters);
    - str_repeat($str, $count);
    - explode($separator, $str, $limit);
    - str_shuffle($str);
    - strrev($str);
    - trim($str, $chars_list);
    - ltrim($str, $chars_list);
    - rtrim($str, $chars_list);
    - chunk_split($str, $len, $end);
    - strlen($str);
    - str_split($str, $len);
    - strip_tags($str, $allowed_tags);
    - nl2br($str, $XHTML?);
    - strpos($str, $search, $start);
    - strrpos($str, $search, $start);
    - stripos($str, $search, $start);
    - strripos($str, $search, $start);
    - substr($str, $start, $len);
    - substr_count($str, $search, $start, $len);
    - parse_str($str, $result_arr);
    - quotemeta($str);
    - str_pad($str, $pad_length, $pad_string, $flag); => 
            $flag = STR_PAD_BOTH, STR_PAD_RIGHT, STR_PAD_LEFT
    - strtr($str, $from, $to);
    - strtr($str, $translation_array);
    - str_replace($search, $replace, $str, $replace_count_variable);
    - str_ireplace($search, $replace, $str, $replace_count_variable);
    - substr_replace($str, $replace, $start, $len);
    - wordwrap($str, $width, $break, $cut_long?);
    - ord($char);
    - chr($char_code);
    - similar_text($str1, $str2, $percent_variable);
    - strstr($str, $search, $before_search?);
    - stristr($str, $search, $before_search?);
    - number_format($number, $decimals, $dec_point, $thousands_point);
    - str_word_count($str);
    - strcmp($str1, $str2);
    - substr_compare($str1, $str2, $start, $len, $insensetive);
    - implode($separator, $array);
    - mb_strlen($str, $encoding);
  */

  /*
    Array
    - array_chunk($arr, $len, $preserve_keys?);
    - array_change_key_case($arr, $case);
    - array_combine($keys_arr, $values_arr);
    - array_count_values($arr);
    - array_reverse($arr, $preserve_keys?);
    - array_flip($arr);
    - count($arr, $mode);
    - in_array($search, $arr, $type?);
    - array_key_exists($key, $arr);
    - array_keys($arr, $value, $type?)
    - array_values($arr);
    - array_pad($arr, $pad_length, $pad_string);
    - array_product($arr);
    - array_sum($arr);
    - current($arr);
    - next($arr);
    - prev($arr);
    - reset($arr);
    - end($arr);
    - array_merge($arr1, $arr2);
    - array_replace($arr, $arr2);
    - array_rand($arr, $num);
    - shuffle($arr);
    - array_shift($arr);
    - array_pop($arr);
    - array_unshift($arr, $values);
    - array_push($arr, $values);
    - array_slice($arr, $start, $len, $preserver_keys?);
    - array_splice($arr, $start, $len, $arr_elements|$element);
    - sort($arr, $flag);
          $flag = SORT_REGULAR, SORT_NATURAL, SORT_NUMERIC, SORT_STRING, SORT_FLAG_CASE
    - rsort($arr, $flag);
    - asort($arr, $flag);
    - arsort($arr, $flag);
    - ksort($arr, $flag);
    - krsort($arr, $flag);
    - natsort($arr, $flag);
    - array_map($callback, $arr1, $other_arrs);
    - array_filter($arr, $callback, $flag);
          $flag = 0, ARRAY_FILTER_USE_KEY, ARRAY_FILTER_USE_BOTH
    - array_reduce($arr, $callback, $initial_value);
    - array_search($str, $arr, $sensitive?)
  */

  /* 
    Math
    abs($num);
    mt_rand($min, $max) | rand($min, $max);
    mt_getrandmax();
    intdiv($num1, $num2);
    fmod($num1, $num2);
    ceil($num);
    floor($num);
    round($num, $precision, $mode);
          $mode = PHP_ROUND_HALF_UP, PHP_ROUND_HALF_DOWN, PHP_ROUND_HALF_EVEN, PHP_ROUND_HALF_ODD
    sqrt($num);
    min($arr|$nums);
    max($arr|$nums);
  */

  /*
    Filter
    - filter_list();
    - filter_id($filter_name);
    - filter_var($value, $filter, $options)
          $filter = FILTER_VALIDATE_BOOL, FILTER_VALIDATE_URL, FILTER_VALIDATE_IP,
                    FILTER_VALIDATE_MAC, FILTER_VALIDATE_INT, FILTER_VALIDATE_EMAIL
                    FILTER_VALIDATE_FLOAT, FILTER_SANITIZE_EMAIL, FILTER_SANITIZE_NUMBER_INT,
                    FILTER_SANITIZE_NUMBER_FLOAT, FILTER_SANITIZE_URL
          $flags  = FILTER_NULL_ON_FAILURE, FILTER_FLAG_PATH_REQUIRED, FILTER_FLAG_QUERY_REQUIRED,
                    FILTER_FLAG_IPV4, FILTER_FLAG_IPV6, FILTER_FLAG_ALLOW_THOUSAND,
                    FILTER_FLAG_ALLOW_FRACTION
          $options = min_range, max_range
    - filter_input($type, $value, $filter, $options);
          $type = INPUT_GET, INPUT_POST, INPUT_COOKIE, INPUT_SERVER, INPUT_ENV
  */

  /*
    File System
    - disk_total_space($path);
    - disk_free_space($path);
    - file_exists($path);
    - filesize($path);
    - is_dir($path);
    - mkdir($path, $mode, $recursive?, $context);
    - rmdir($path, $content);
    - chmod($path, $mode);
    - chown($path, $mode);
    - chgrp($path, $mode);
    - fileperms($path);
    - clearstatcache();
    - basename($path, $suffix);
    - dirname($path, $levels);
    - realpath($path);
    - pathinfo($path, $flags);
    -       $flags = PATHINFO_DIRNAME, PATHINFO_FILENAME, PATHINFO_EXTENSION, PATHINFO_BASENAME
    - fopen($path, $mode);
    -       $mode = r, r+, w, w+, a, a+, x, x+, c, c+
    - fgets($handle, $len);
    - fread($handle, $len);
    - fclose($handle);
    - fwrite($handle,$str, $len);
    - feof($handle);
    - ftell($handle);
    - rewind($handle);
    - fseek($handle, $start, $whence);
          $whence = SEEK_SET, SEEK_CUR, SEEK_END
    - file($handle);
    - glob($pattern);
    - rename($old, $new);
    - copy($old, $new);
    - unlink($path);
    - opendir($path);
    - readdir($dir_handle);
    - closedir($dir_handle);
    - get_include_path();
    - file_get_contents($path, $use_include_path, $context, $start, $maxlen);
    - file_put_contents($path, $data, $flags, $context);
          $flags = FILE_APPEND
    - readfile($path);
  */

  /*
    Date
    - date_default_timezone_get();
    - date_default_timezone_set($str);
    - checkdate($month, $day, $year);
    - timezone_open($str);
    - date_create($str, $DateTimeZone);
    - date_format($DateTimeObject, $format);
    - date_interval_create_from_date_string();
    - date_add($DateTimeObject, $interval);
    - date_sub($DateTimeObject, $interval);
    - date_modify($DateTimeObject, $str);
    - date($format, $time_stamp);
    - time();
    - getdate($time_stamp);
    - date_parse($str);
    - date_diff($DateTimeObject1, $DateTimeObject2);
    - strtotime($str, $base_time_stamp);
    - mktime(hour, minute, second, month, day, year);
  */

  /*
		Network
		- setcookie($name, $value, $expires, $path, $domain, $secure?, $http_only?);
		- session_start();
		- session_id($key);
		- session_unset();
		- session_destroy();
		- header($header, $replace?, $http_response_code);
  */

	/*
		Super Globals
		- $GLOBALS
		- $_SERVER
		- $_REQUEST
		- $_POST
		- $_GET
		- $_FILES
		- $_ENV
		- $_COOKIE
		- $_SESSION
	*/

	/*
		Regular Expression
		- preg_match($pattern, $str, $matches_variable);
		- preg_match_all($pattern, $str, $matches_variable);
		- preg_replace($pattern, $str, $string_variable);
	*/

	/*
		Exceptions
		- Exception(message, code, previous);
		- getMessage();
		- getPrevious();
		- getCode();
		- getFile();
		- getLine();
	*/

  /*
  MYSQL
  - new mysqli($servername, $username, $password, $database_name, $port);
  - $conn->connect_error;
  - $conn->close();
  - $conn->query($sql);
  - $conn->error;
  - $conn->insert_id;
  - $conn->multi_query($sql);
  - $conn->prepare($sql);
  - $stmt->bind_param(param_type_string, ...$values);
  - $stmt->execute();
  - $stmt->get_result();
  - $stmt->close();
  - $result->fetch_assoc();
  - $result->num_rows
  */

  /*
  MYSQLI
  - mysqli_connect($servername, $username, $password, $database_name, $port);
  - mysqli_connect_error()
  - mysqli_close($conn);
  - mysqli_query($conn, $sql);
  - mysqli_error($conn);
  - mysqli_insert_id($conn);
  - mysqli_multi_query($conn, $sql);
  - mysqli_fetch_assoc($result);
  - mysqli_num_rows($result);
  - mysqli_prepare($conn, $sql);
  - mysqli_stmt_bind_param($stmt, param_type_string, ...$values);
  - mysqli_stmt_execute($stmt);
  - mysqli_stmt_close($stmt);
  */
  
  /*
  SQL
  - SELECT column_name FROM table_name
  - SELECT DISTINCT column_name FROM table_name
  - SELECT COUNT(DISTINCT column_name) FROM table_name
  - WHERE condition (AND, OR, NOT, IS NULL, IS NOT NULL, BETWEEN, LIKE, IN)
  - ORDER BY column_name
  - INSERT INTO table_name VALUES values
  - UPDATE table_name
    SET column_name=value
    WHERE condition
  - DELETE FROM table_name WHERE condition
  - LIMIT Number
  - OFFSET Number
  - MIN(column_name)
  - MAX(column_name)
  - COUNT(column_name)
  - AVG(column_name)
  - SUM(column_name)
  - CONCAT(values)
  - AS Alias
  - JOIN column_name_joined ON condition
  - INNER JOIN column_name_joined ON condition
  - LEFT JOIN column_name_joined ON condition
  - RIGHT JOIN column_name_joined ON condition
  - FULL OUTER JOIN column_name_joined ON condition
  - UNION
  - GROUP BY column_name
  - HAVING condition
  - Exists
  - ANY
  - ALL
  - SELECT column_name INTO table_destination FROM table_source
  - INSERT INTO table_destination SELECT column_name FROM table_source
  - CASE
    WHEN condition1 THEN result1
    WHEN condition2 THEN result2
    WHEN conditionN THEN resultN
    ELSE result
    END
  - IFNULL()
  - COALESCE()
  - CREATE PROCEDURE procedure_name
    AS
    sql_statement
    GO
  - CREATE DATABASE database_name
  - DROP DATABASE database_name
  - BACKUP DATABASE database_name
    TO DISK = 'filepath'
  - CREATE TABLE table_name (
    column1 datatype,
    column2 datatype,
    column3 datatype,
    );
  - DROP TABLE table_name
  - TRUNCATE TABLE table_name
  - ALTER TABLE table_name (
      ADD column_name datatype
      DROP COLUMN column_name
      DROP INDEX index_name;
      RENAME COLUMN old_name to new_name
      MODIFY COLUMN column_name datatype
    )
  - Constraints (
    NOT NULL, 
    UNIQUE, 
    PRIMARY KEY, 
    FOREIGN KEY (column_name) REFERENCES referenced_table_name (referenced_column_name), 
    Check(condition), 
    DEFAULT default_value, 
    AUTO_INCREMENT
    )
  - CREATE VIEW view_name AS
    SELECT column1, column2, ...
    FROM table_name
    WHERE condition;
  - CREATE OR REPLACE VIEW view_name AS
    SELECT column1, column2, ...
    FROM table_name
    WHERE condition;
  - DROP VIEW view_name;
  - Data Types (
    CHAR(size)
    VARCHAR(size)
    TEXT(size)
    INT(size)
    DATE
    DATETIME(fsp)
    TIME(fsp)
    )
  */
/*
  [Year]
  - Y => Four Digits
  - y => Two Digits

  [Month]
  - m => 01-12
  - M => Text Month => 3 Letters
  - F => Full Text
  - t => Number Of Days In This Month

  [Day]
  - d => Day of The Month 1-31
  - j => Day Without Leading Zero
  - D => Text Day => 3 Letters
  - l => Full Text
  - z => Day Of The Year 0-365
  - S => st, rd, nth Suffix For Day Of The Month

  [Time]
  - a => Small am/pm
  - A => Capital AM/PM

  [Hour]
  - g => 1-12
  - h => 01-12
  - G => 0-23
  - H => 00-23

  [Minutes, Seconds, Micro]
  - i => 00-59
  - s => 00-59
  - u => Microseconds

*/
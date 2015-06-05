<?php
function get_id($par1){//поиск турнира по ID и игр к нему
$id=json_decode($par1)->id;
if ($id==""){
return $this->error_message('you must enter a value');
}
else
{
$query=mysql_query('SELECT t_id, t_type FROM o_tournaments WHERE t_id='.mysql_real_escape_string($id));//сначала находим турнир по его ID
if (mysql_error()!='')
{
return $this->error_message(mysql_error());
}
else
{
if (mysql_num_rows($query)>0)//если турнир с таким ID существует то начинаем искать игры
{
$row=mysql_fetch_array($query);
switch($row['t_type'])//тут использовал оператор switch чтобы не использовать if лишний раз надеюсь так можно делать
{
case 2: //если тип_турнира=2 тогда берем игры из таблицы o_games
$query=mysql_query('SELECT * FROM o_games WHERE trn_id='.mysql_real_escape_string($id));
if (mysql_num_rows($query)>0)
{
return json_encode(mysql_fetch_array($query));
}
else
{
return $this->error_message('no matches found');
} break;
case 3://если тип_турнира=3 или 4 тогда берем игры из таблицы o_games_e
case 4:
$query=mysql_query('SELECT * FROM o_games_e WHERE trn_id='.mysql_real_escape_string($id));
if (mysql_num_rows($query)>0)
{
return json_encode(mysql_fetch_array($query));
}
else
{
return $this->error_message('no matches found');
} break;
default: return $this->error_message('nothing');//в случае если тип турнира не подходит надо что-то вернуть
}
}
else
{
return $this->error_message('no matches found');//если турнира с таким ID нету тогда возвратить ошибку
}
}
}
}

?>

<?php session_start();
  if (isset($_GET["order"])) $order = @$_GET["order"];
  if (isset($_GET["type"])) $ordtype = @$_GET["type"];

  if (isset($_POST["filter"])) $filter = @$_POST["filter"];
  if (isset($_POST["filter_field"])) $filterfield = @$_POST["filter_field"];
  $wholeonly = false;
  if (isset($_POST["wholeonly"])) $wholeonly = @$_POST["wholeonly"];

  if (!isset($order) && isset($_SESSION["order"])) $order = $_SESSION["order"];
  if (!isset($ordtype) && isset($_SESSION["type"])) $ordtype = $_SESSION["type"];
  if (!isset($filter) && isset($_SESSION["filter"])) $filter = $_SESSION["filter"];
  if (!isset($filterfield) && isset($_SESSION["filter_field"])) $filterfield = $_SESSION["filter_field"];

?>

<html>
<head>
<title>stock -- proveedores</title>
<meta name="generator" http-equiv="content-type" content="text/html">
<style type="text/css">
  body {
    background-color: #FFFFFF;
    color: #004080;
    font-family: Arial;
    font-size: 12px;
  }
  .bd {
    background-color: #FFFFFF;
    color: #004080;
    font-family: Arial;
    font-size: 12px;
  }
  .tbl {
    background-color: #FFFFFF;
  }
  a:link { 
    color: #FF0000;
    font-family: Arial;
    font-size: 12px;
  }
  a:active { 
    color: #0000FF;
    font-family: Arial;
    font-size: 12px;
  }
  a:visited { 
    color: #800080;
    font-family: Arial;
    font-size: 12px;
  }
  .hr {
    background-color: #336699;
    color: #FFFFFF;
    font-family: Arial;
    font-size: 12px;
  }
  a.hr:link {
    color: #FFFFFF;
    font-family: Arial;
    font-size: 12px;
  }
  a.hr:active {
    color: #FFFFFF;
    font-family: Arial;
    font-size: 12px;
  }
  a.hr:visited {
    color: #FFFFFF;
    font-family: Arial;
    font-size: 12px;
  }
  .dr {
    background-color: #FFFFFF;
    color: #000000;
    font-family: Arial;
    font-size: 12px;
  }
  .sr {
    background-color: #FFFFCF;
    color: #000000;
    font-family: Arial;
    font-size: 12px;
  }
</style>
</head>
<body>
<table class="bd" width="100%"><tr><td class="hr"><h2>PHP Generator</h2></td></tr></table>
<table width="100%">
<tr>

<td width="10%" valign="top">
<li><a href="pruducto.php?a=reset">pruducto</a>
</td>
<td width="5%">
</td>
<td bgcolor="#e0e0e0">
</td>
<td width="5%">
</td>
<td width="80%" valign="top">
<?php
  $conn = connect();
  $showrecs = 20;
  $pagerange = 10;

  $a = @$_GET["a"];
  $recid = @$_GET["recid"];
  $page = @$_GET["page"];
  if (!isset($page)) $page = 1;

  $sql = @$_POST["sql"];

  switch ($sql) {
    case "insert":
      sql_insert();
      break;
    case "update":
      sql_update();
      break;
    case "delete":
      sql_delete();
      break;
  }

  switch ($a) {
    case "add":
      addrec();
      break;
    case "view":
      viewrec($recid);
      break;
    case "edit":
      editrec($recid);
      break;
    case "del":
      deleterec($recid);
      break;
    default:
      select();
      break;
  }

  if (isset($order)) $_SESSION["order"] = $order;
  if (isset($ordtype)) $_SESSION["type"] = $ordtype;
  if (isset($filter)) $_SESSION["filter"] = $filter;
  if (isset($filterfield)) $_SESSION["filter_field"] = $filterfield;
  if (isset($wholeonly)) $_SESSION["wholeonly"] = $wholeonly;

  mysql_close($conn);
?>
</td></tr></table>
<table class="bd" width="100%"><tr><td class="hr">http://www.sqlmaestro.com/products/mysql/phpgenerator/</td></tr></table>
</body>
</html>

<?php function select()
  {
  global $a;
  global $showrecs;
  global $page;
  global $filter;
  global $filterfield;
  global $wholeonly;
  global $order;
  global $ordtype;


  if ($a == "reset") {
    $filter = "";
    $filterfield = "";
    $wholeonly = "";
    $order = "";
    $ordtype = "";
  }

  $checkstr = "";
  if ($wholeonly) $checkstr = " checked";
  if ($ordtype == "asc") { $ordtypestr = "desc"; } else { $ordtypestr = "asc"; }
  $res = sql_select();
  $count = sql_getrecordcount();
  if ($count % $showrecs != 0) {
    $pagecount = intval($count / $showrecs) + 1;
  }
  else {
    $pagecount = intval($count / $showrecs);
  }
  $startrec = $showrecs * ($page - 1);
  if ($startrec < $count) {mysql_data_seek($res, $startrec);}
  $reccount = min($showrecs * $page, $count);
?>
<table class="bd" border="0" cellspacing="1" cellpadding="4">
<tr><td>Table: proveedores</td></tr>
<tr><td>Records shown <?php echo $startrec + 1 ?> - <?php echo $reccount ?> of <?php echo $count ?></td></tr>
</table>
<hr size="1" noshade>
<form action="proveedores.php" method="post">
<table class="bd" border="0" cellspacing="1" cellpadding="4">
<tr>
<td><b>Custom Filter</b>&nbsp;</td>
<td><input type="text" name="filter" value="<?php echo $filter ?>"></td>
<td><select name="filter_field">
<option value="">All Fields</option>
<option value="<?php echo "id_proveedor" ?>"<?php if ($filterfield == "id_proveedor") { echo "selected"; } ?>><?php echo htmlspecialchars("id_proveedor") ?></option>
<option value="<?php echo "nom_proveedor" ?>"<?php if ($filterfield == "nom_proveedor") { echo "selected"; } ?>><?php echo htmlspecialchars("nom_proveedor") ?></option>
<option value="<?php echo "direccion" ?>"<?php if ($filterfield == "direccion") { echo "selected"; } ?>><?php echo htmlspecialchars("direccion") ?></option>
<option value="<?php echo "e_mail" ?>"<?php if ($filterfield == "e_mail") { echo "selected"; } ?>><?php echo htmlspecialchars("e_mail") ?></option>
<option value="<?php echo "tlefono" ?>"<?php if ($filterfield == "tlefono") { echo "selected"; } ?>><?php echo htmlspecialchars("tlefono") ?></option>
</select></td>
<td><input type="checkbox" name="wholeonly"<?php echo $checkstr ?>>Whole words only</td>
</td></tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="action" value="Apply Filter"></td>
<td><a href="proveedores.php?a=reset">Reset Filter</a></td>
</tr>
</table>
</form>
<hr size="1" noshade>
<?php showpagenav($page, $pagecount); ?>
<br>
<table class="tbl" border="0" cellspacing="1" cellpadding="5"width="100%">
<tr>
<td class="hr">&nbsp;</td>
<td class="hr">&nbsp;</td>
<td class="hr">&nbsp;</td>
<td class="hr"><a class="hr" href="proveedores.php?order=<?php echo "id_proveedor" ?>&type=<?php echo $ordtypestr ?>"><?php echo htmlspecialchars("id_proveedor") ?></a></td>
<td class="hr"><a class="hr" href="proveedores.php?order=<?php echo "nom_proveedor" ?>&type=<?php echo $ordtypestr ?>"><?php echo htmlspecialchars("nom_proveedor") ?></a></td>
<td class="hr"><a class="hr" href="proveedores.php?order=<?php echo "direccion" ?>&type=<?php echo $ordtypestr ?>"><?php echo htmlspecialchars("direccion") ?></a></td>
<td class="hr"><a class="hr" href="proveedores.php?order=<?php echo "e_mail" ?>&type=<?php echo $ordtypestr ?>"><?php echo htmlspecialchars("e_mail") ?></a></td>
<td class="hr"><a class="hr" href="proveedores.php?order=<?php echo "tlefono" ?>&type=<?php echo $ordtypestr ?>"><?php echo htmlspecialchars("tlefono") ?></a></td>
</tr>
<?php
  for ($i = $startrec; $i < $reccount; $i++)
  {
    $row = mysql_fetch_assoc($res);
    $style = "dr";
    if ($i % 2 != 0) {
      $style = "sr";
    }
?>
<tr>
<td class="<?php echo $style ?>"><a href="proveedores.php?a=view&recid=<?php echo $i ?>">View</a></td>
<td class="<?php echo $style ?>"><a href="proveedores.php?a=edit&recid=<?php echo $i ?>">Edit</a></td>
<td class="<?php echo $style ?>"><a href="proveedores.php?a=del&recid=<?php echo $i ?>">Delete</a></td>
<td class="<?php echo $style ?>"><?php echo htmlspecialchars($row["id_proveedor"]) ?></td>
<td class="<?php echo $style ?>"><?php echo htmlspecialchars($row["nom_proveedor"]) ?></td>
<td class="<?php echo $style ?>"><?php echo htmlspecialchars($row["direccion"]) ?></td>
<td class="<?php echo $style ?>"><?php echo htmlspecialchars($row["e_mail"]) ?></td>
<td class="<?php echo $style ?>"><?php echo htmlspecialchars($row["tlefono"]) ?></td>
</tr>
<?php
  }
  mysql_free_result($res);
?>
</table>
<br>
<?php showpagenav($page, $pagecount); ?>
<?php } ?>

<?php function showrow($row, $recid)
  {
?>
<table class="tbl" border="0" cellspacing="1" cellpadding="5"width="50%">
<tr>
<td class="hr"><?php echo htmlspecialchars("id_proveedor")."&nbsp;" ?></td>
<td class="dr"><?php echo htmlspecialchars($row["id_proveedor"]) ?></td>
</tr>
<tr>
<td class="hr"><?php echo htmlspecialchars("nom_proveedor")."&nbsp;" ?></td>
<td class="dr"><?php echo htmlspecialchars($row["nom_proveedor"]) ?></td>
</tr>
<tr>
<td class="hr"><?php echo htmlspecialchars("direccion")."&nbsp;" ?></td>
<td class="dr"><?php echo htmlspecialchars($row["direccion"]) ?></td>
</tr>
<tr>
<td class="hr"><?php echo htmlspecialchars("e_mail")."&nbsp;" ?></td>
<td class="dr"><?php echo htmlspecialchars($row["e_mail"]) ?></td>
</tr>
<tr>
<td class="hr"><?php echo htmlspecialchars("tlefono")."&nbsp;" ?></td>
<td class="dr"><?php echo htmlspecialchars($row["tlefono"]) ?></td>
</tr>
</table>
<?php } ?>

<?php function showroweditor($row, $iseditmode)
  {
  global $conn;
?>
<table class="tbl" border="0" cellspacing="1" cellpadding="5"width="50%">
<tr>
<td class="hr"><?php echo htmlspecialchars("id_proveedor")."&nbsp;" ?></td>
<td class="dr"><input type="text" name="id_proveedor" value="<?php echo str_replace('"', '&quot;', trim($row["id_proveedor"])) ?>"></td>
</tr>
<tr>
<td class="hr"><?php echo htmlspecialchars("nom_proveedor")."&nbsp;" ?></td>
<td class="dr"><input type="text" name="nom_proveedor" maxlength="30" value="<?php echo str_replace('"', '&quot;', trim($row["nom_proveedor"])) ?>"></td>
</tr>
<tr>
<td class="hr"><?php echo htmlspecialchars("direccion")."&nbsp;" ?></td>
<td class="dr"><input type="text" name="direccion" maxlength="30" value="<?php echo str_replace('"', '&quot;', trim($row["direccion"])) ?>"></td>
</tr>
<tr>
<td class="hr"><?php echo htmlspecialchars("e_mail")."&nbsp;" ?></td>
<td class="dr"><input type="text" name="e_mail" maxlength="30" value="<?php echo str_replace('"', '&quot;', trim($row["e_mail"])) ?>"></td>
</tr>
<tr>
<td class="hr"><?php echo htmlspecialchars("tlefono")."&nbsp;" ?></td>
<td class="dr"><input type="text" name="tlefono" maxlength="30" value="<?php echo str_replace('"', '&quot;', trim($row["tlefono"])) ?>"></td>
</tr>
</table>
<?php } ?>

<?php function showpagenav($page, $pagecount)
{
?>
<table class="bd" border="0" cellspacing="1" cellpadding="4">
<tr>
<td><a href="proveedores.php?a=add">Add Record</a>&nbsp;</td>
<?php if ($page > 1) { ?>
<td><a href="proveedores.php?page=<?php echo $page - 1 ?>">&lt;&lt;&nbsp;Prev</a>&nbsp;</td>
<?php } ?>
<?php
  global $pagerange;

  if ($pagecount > 1) {

  if ($pagecount % $pagerange != 0) {
    $rangecount = intval($pagecount / $pagerange) + 1;
  }
  else {
    $rangecount = intval($pagecount / $pagerange);
  }
  for ($i = 1; $i < $rangecount + 1; $i++) {
    $startpage = (($i - 1) * $pagerange) + 1;
    $count = min($i * $pagerange, $pagecount);

    if ((($page >= $startpage) && ($page <= ($i * $pagerange)))) {
      for ($j = $startpage; $j < $count + 1; $j++) {
        if ($j == $page) {
?>
<td><b><?php echo $j ?></b></td>
<?php } else { ?>
<td><a href="proveedores.php?page=<?php echo $j ?>"><?php echo $j ?></a></td>
<?php } } } else { ?>
<td><a href="proveedores.php?page=<?php echo $startpage ?>"><?php echo $startpage ."..." .$count ?></a></td>
<?php } } } ?>
<?php if ($page < $pagecount) { ?>
<td>&nbsp;<a href="proveedores.php?page=<?php echo $page + 1 ?>">Next&nbsp;&gt;&gt;</a>&nbsp;</td>
<?php } ?>
</tr>
</table>
<?php } ?>

<?php function showrecnav($a, $recid, $count)
{
?>
<table class="bd" border="0" cellspacing="1" cellpadding="4">
<tr>
<td><a href="proveedores.php">Index Page</a></td>
<?php if ($recid > 0) { ?>
<td><a href="proveedores.php?a=<?php echo $a ?>&recid=<?php echo $recid - 1 ?>">Prior Record</a></td>
<?php } if ($recid < $count - 1) { ?>
<td><a href="proveedores.php?a=<?php echo $a ?>&recid=<?php echo $recid + 1 ?>">Next Record</a></td>
<?php } ?>
</tr>
</table>
<hr size="1" noshade>
<?php } ?>

<?php function addrec()
{
?>
<table class="bd" border="0" cellspacing="1" cellpadding="4">
<tr>
<td><a href="proveedores.php">Index Page</a></td>
</tr>
</table>
<hr size="1" noshade>
<form enctype="multipart/form-data" action="proveedores.php" method="post">
<p><input type="hidden" name="sql" value="insert"></p>
<?php
$row = array(
  "id_proveedor" => "",
  "nom_proveedor" => "",
  "direccion" => "",
  "e_mail" => "",
  "tlefono" => "");
showroweditor($row, false);
?>
<p><input type="submit" name="action" value="Post"></p>
</form>
<?php } ?>

<?php function viewrec($recid)
{
  $res = sql_select();
  $count = sql_getrecordcount();
  mysql_data_seek($res, $recid);
  $row = mysql_fetch_assoc($res);
  showrecnav("view", $recid, $count);
?>
<br>
<?php showrow($row, $recid) ?>
<br>
<hr size="1" noshade>
<table class="bd" border="0" cellspacing="1" cellpadding="4">
<tr>
<td><a href="proveedores.php?a=add">Add Record</a></td>
<td><a href="proveedores.php?a=edit&recid=<?php echo $recid ?>">Edit Record</a></td>
<td><a href="proveedores.php?a=del&recid=<?php echo $recid ?>">Delete Record</a></td>
</tr>
</table>
<?php
  mysql_free_result($res);
} ?>

<?php function editrec($recid)
{
  $res = sql_select();
  $count = sql_getrecordcount();
  mysql_data_seek($res, $recid);
  $row = mysql_fetch_assoc($res);
  showrecnav("edit", $recid, $count);
?>
<br>
<form enctype="multipart/form-data" action="proveedores.php" method="post">
<input type="hidden" name="sql" value="update">
<input type="hidden" name="xid_proveedor" value="<?php echo $row["id_proveedor"] ?>">
<?php showroweditor($row, true); ?>
<p><input type="submit" name="action" value="Post"></p>
</form>
<?php
  mysql_free_result($res);
} ?>

<?php function deleterec($recid)
{
  $res = sql_select();
  $count = sql_getrecordcount();
  mysql_data_seek($res, $recid);
  $row = mysql_fetch_assoc($res);
  showrecnav("del", $recid, $count);
?>
<br>
<form action="proveedores.php" method="post">
<input type="hidden" name="sql" value="delete">
<input type="hidden" name="xid_proveedor" value="<?php echo $row["id_proveedor"] ?>">
<?php showrow($row, $recid) ?>
<p><input type="submit" name="action" value="Confirm"></p>
</form>
<?php
  mysql_free_result($res);
} ?>

<?php function connect()
{
  $conn = mysql_connect("localhost", "root", "");
  mysql_select_db("stock");
  return $conn;
}

function sqlvalue($val, $quote)
{
  if ($quote)
    $tmp = sqlstr($val);
  else
    $tmp = $val;
  if ($tmp == "")
    $tmp = "NULL";
  elseif ($quote)
    $tmp = "'".$tmp."'";
  return $tmp;
}

function sqlstr($val)
{
  return str_replace("'", "''", $val);
}

function sql_select()
{
  global $conn;
  global $order;
  global $ordtype;
  global $filter;
  global $filterfield;
  global $wholeonly;

  $filterstr = sqlstr($filter);
  if (!$wholeonly && isset($wholeonly) && $filterstr!='') $filterstr = "%" .$filterstr ."%";
  $sql = "SELECT `id_proveedor`, `nom_proveedor`, `direccion`, `e_mail`, `tlefono` FROM `proveedores`";
  if (isset($filterstr) && $filterstr!='' && isset($filterfield) && $filterfield!='') {
    $sql .= " where " .sqlstr($filterfield) ." like '" .$filterstr ."'";
  } elseif (isset($filterstr) && $filterstr!='') {
    $sql .= " where (`id_proveedor` like '" .$filterstr ."') or (`nom_proveedor` like '" .$filterstr ."') or (`direccion` like '" .$filterstr ."') or (`e_mail` like '" .$filterstr ."') or (`tlefono` like '" .$filterstr ."')";
  }
  if (isset($order) && $order!='') $sql .= " order by `" .sqlstr($order) ."`";
  if (isset($ordtype) && $ordtype!='') $sql .= " " .sqlstr($ordtype);
  $res = mysql_query($sql, $conn) or die(mysql_error());
  return $res;
}

function sql_getrecordcount()
{
  global $conn;
  global $order;
  global $ordtype;
  global $filter;
  global $filterfield;
  global $wholeonly;

  $filterstr = sqlstr($filter);
  if (!$wholeonly && isset($wholeonly) && $filterstr!='') $filterstr = "%" .$filterstr ."%";
  $sql = "SELECT COUNT(*) FROM `proveedores`";
  if (isset($filterstr) && $filterstr!='' && isset($filterfield) && $filterfield!='') {
    $sql .= " where " .sqlstr($filterfield) ." like '" .$filterstr ."'";
  } elseif (isset($filterstr) && $filterstr!='') {
    $sql .= " where (`id_proveedor` like '" .$filterstr ."') or (`nom_proveedor` like '" .$filterstr ."') or (`direccion` like '" .$filterstr ."') or (`e_mail` like '" .$filterstr ."') or (`tlefono` like '" .$filterstr ."')";
  }
  $res = mysql_query($sql, $conn) or die(mysql_error());
  $row = mysql_fetch_assoc($res);
  reset($row);
  return current($row);
}

function sql_insert()
{
  global $conn;
  global $_POST;

  $sql = "insert into `proveedores` (`id_proveedor`, `nom_proveedor`, `direccion`, `e_mail`, `tlefono`) values (" .sqlvalue(@$_POST["id_proveedor"], false).", " .sqlvalue(@$_POST["nom_proveedor"], true).", " .sqlvalue(@$_POST["direccion"], true).", " .sqlvalue(@$_POST["e_mail"], true).", " .sqlvalue(@$_POST["tlefono"], true).")";
  mysql_query($sql, $conn) or die(mysql_error());
}

function sql_update()
{
  global $conn;
  global $_POST;

  $sql = "update `proveedores` set `id_proveedor`=" .sqlvalue(@$_POST["id_proveedor"], false).", `nom_proveedor`=" .sqlvalue(@$_POST["nom_proveedor"], true).", `direccion`=" .sqlvalue(@$_POST["direccion"], true).", `e_mail`=" .sqlvalue(@$_POST["e_mail"], true).", `tlefono`=" .sqlvalue(@$_POST["tlefono"], true) ." where " .primarykeycondition();
  mysql_query($sql, $conn) or die(mysql_error());
}

function sql_delete()
{
  global $conn;

  $sql = "delete from `proveedores` where " .primarykeycondition();
  mysql_query($sql, $conn) or die(mysql_error());
}
function primarykeycondition()
{
  global $_POST;
  $pk = "";
  $pk .= "(`id_proveedor`";
  if (@$_POST["xid_proveedor"] == "") {
    $pk .= " IS NULL";
  }else{
  $pk .= " = " .sqlvalue(@$_POST["xid_proveedor"], false);
  };
  $pk .= ")";
  return $pk;
}
 ?>

<!-- painel.php -->
<html>
<head>
<META HTTP-EQUIV="Refresh" CONTENT="60">
</head>
<body>
<h3>Painel de Monitoramento de Hosts</h3>
<table border=1 cellspacing=3>
<tr>
<?
$servidores = array (
"fabio.vivaolinux.com.br" => "200.215.128.83",
"webmail.vivaolinux.com.br" => "200.215.128.241"
);

while (list($site,$ip) = each($servidores)) {
$comando = "/bin/ping -c 1 " . $ip;
$saida = shell_exec($comando);

echo "<td>".$site."<br>".$ip."<br>"."Status:";
if ( ereg("bytes from",$saida) ) {
echo "<b>online</b></td>";
} else {
echo "<font color=red><b>não responde</b></font></td>";
}
}
?>
</tr>
</table>
</body>
</html>
<!-- fim do programa -->

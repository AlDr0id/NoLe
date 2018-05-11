<?php

require_once("usuarioSA.php");

$sa = new usuarioSA();

$sa->newUsuario(new usuarioTransfer("raul","raul","gomez","123","raul@m.m",
"", "", 1));

$ok = $sa->valorarUsuario("raul", 1);
if($ok) echo "ok";
?>
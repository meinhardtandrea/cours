<?php
function MessageErreur ($message) {
echo '<link href="style.css" rel="stylesheet" type="text/css">';
echo'<center><br>'.$message.'<br><br><a href="javascript:window.history.go(-1)" class="lien3">Retour</a></center><br>';
exit;
}
?>
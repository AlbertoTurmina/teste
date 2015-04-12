<?php

include ('conn.php');
mysql_select_db($basedados, $conn);

$resultado = mysql_query("SELECT * FROM `vitrines` ORDER BY rand() limit 12");

 $colTotal   = round(count($resultado) / 2);
 $colCurrent = -4;
 $lastItem   = 1;
 $fristItem  = 0;

 // Colunas
  while($colCurrent <= $colTotal) {
  echo "<div class='rock_club_photo_slider_item'>";
	// Itens
	while( $fristItem <= $lastItem ) {

    $linha = mysql_fetch_array($resultado);

    echo "<div class='rock_club_photo_item'>
    <img src='img/" . $linha['n_img'] ."' alt='" . $linha['n_titulo'] ."' />
      <div class='rock_club_photo_overlay'>
        <div class='photo_link animated fadeInDown'> <a href=''><i class='fa fa-link'></i></a> <a class='fancybox' data-fancybox-group='group1' href='img/" . $linha['n_img'] ."'><i class='fa fa-search-plus'></i></a> </div>
        <a class='rock_club_photo_detail animated fadeInUp' href=''>" . $linha['n_titulo'] ."</a> </div>
    </div>";
    $fristItem++;

	}
	echo "</div> ";
	$lastItem = $lastItem + 2;
	$colCurrent++;
  }
mysql_close($conn);
?>

<?php
@include_once 'head.html';
$pathImages = '../zdjecia';
$pathServer = 'http://serwer1591827.home.pl/';
if($uchwyt = @opendir($pathImages)) {
	echo '<div id="banner"><a href="index.php"><div class="back"><img src="images/arrow-right.png"></div> </a><h2> Twoje zdjęcia ! </h2></div>';
	echo '<section id="show">';
        echo '<div class="categories">';
        echo '<input class="cat selected" value="Bez folderu" readonly>';
                if($hang = @opendir($pathImages)) {
                    while($read = readdir($hang)) {
                            $name = substr($read,0,40);
                            $pos = strrpos($read, '.');
                            if($pos == false && strlen($name) >= 3){
                                
                                echo '<input class="cat"  value="'.strtoupper(substr($name,0,1)).substr($name,1,strlen($name)).'" readonly>';
                            }
                    }
                } 
        echo '</div>';
	echo '<div class="elements"></div>';
         
	 echo '</section>';
} 



?>
<script type="text/javascript" src="dist/js/lightbox-plus-jquery.min.js"></script>'
<script type="text/javascript" src="scripts.js"></script>
<script type="text/javascript" src="filter.js"></script>
</body>
</html>
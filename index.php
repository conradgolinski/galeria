<?php
include_once 'something';   
include_once 'formatBytes.php';
include_once 'form.php';  
if(isset($_POST['submitDone'])){
    if(isset($_POST['category'])){
            $flor_s = '_s';
            $size =$_FILES['fileUploaded']['size'];
            $name = $_FILES['fileUploaded']['name'];
            $path = $_FILES['fileUploaded']['tmp_name'];
            $type = $_FILES['fileUploaded']['type'];
            $typ = "jpg,png";
            $expl = explode(',',$typ);
            $dot = strpos($name,'.');
            $tP = substr($name,$dot+1); 
            $name = substr($name,0,$dot);                     
            $destination = '../zdjecia';
            $cat=  $_POST['category'];
    if(is_uploaded_file($path)) {
        for($i=0; $i < count($expl);$i++)
                {   
            if($tP == 'jpg' ||  $tP == 'png') {
                $cat=  $_POST['category'];
                if($cat == ''){
                    move_uploaded_file($path, "$destination/$name.$tP");
                    $cat = 'zdjecia';
                     }
                 else {
                     move_uploaded_file($path, "$destination/$cat/$name.$tP");
                     $cat = 'zdjecia/'.$cat;
                    }
                 }
                 }  echo "<p><h2> PLIK PRZESŁANO </h2><br />Nazwa: <b>".$name."</b><br /> Wielkość: <b>".  formatBytes($size, 2)."</b><br /> Umieszczony w: <b>".$cat."/".$name.".".$tP."</b><br /> Plik :<b>".  strtoupper($tP)."</b><p>";
               }else echo 'podaj plik';
    }else echo 'wybierz kategorie';
}



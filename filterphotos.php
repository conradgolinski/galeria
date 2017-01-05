<?php
$pathImages;
$rest=false;

$_POST['folder'] = strtolower($_POST['folder']);
if($_POST['folder'] === "bez folderu")$pathImages = '../zdjecia';
else if($_POST['folder'] === "wszystkie"){$pathImages = '../zdjecia';$rest=true;}
else $pathImages = '../zdjecia/'.$_POST['folder'];
$pathServer = 'http:\\serwer1591827.home.pl\\';
if($_POST['folder'] != ''){
    if($uchwyt = @opendir($pathImages)) {
     while($odczyt = readdir($uchwyt)) {
                    $pos = strrpos($odczyt, '.');
                    $name = substr($odczyt,0,$pos); 
                    $ext = substr($odczyt, $pos + 1);
             if($ext == 'jpg' or $ext == 'png'){
                  if(strlen($pathImages)>10)$pathImages=substr($pathImages,0,10)."\\".substr($pathImages,11,strlen($pathImages)); 
                   $path = $pathImages.'\\'.$name.'.'.$ext;
                   $path = str_replace(' ', '%20', $path); 
                   $path = substr($path,0,2)."\\".substr($path,3,strlen($path));
                   $pathServ = $pathServer.substr($path,3,strlen($path)); 
                   $value .= $path."|||".$pathServ."|||".$name."|||";

                }
             }
    }
}
//if(rest){    
//    $pathe = '../zdjecia/';
//    $tab;
//     if($hang = @opendir($pathe)) {
//        while($read = readdir($hang)) {
//            $folder = substr($read,0,strlen($read));
//            $pos = strrpos($read, '.');
//            if($pos == false && strlen($folder) >= 3 && $folder != ''){
//                $pathImages .= $pathe.$folder."||";   
//            }
//        }   
//        $pathImages = substr($pathImages,10,strlen($pathImages)-12);
//        $tab = explode("||",$pathImages);                 
//    }  
//  
//    for($i=0;$i<sizeof($tab);$i++){ 
//        if($uchwyt = @opendir($tab[i])) {
//                    while($odczyt = readdir($uchwyt)) {
//                                   $pos = strpos($odczyt, ".");
//                                   $name = substr($odczyt,0,$pos); 
//                                   $ext = substr($odczyt, $pos + 1,strlen($odczyt));
//                            if($ext == 'jpg' or $ext == 'png'){
//                                 if(strlen($pathImages)>10)$pathImages=substr($pathImages,0,10)."\\".substr($pathImages,11,strlen($pathImages)); 
//                                  $path = $pathImages.'\\'.$name.'.'.$ext;
//                                  $path = str_replace(' ', '%20', $path); 
//                                  $path = substr($path,0,2)."\\".substr($path,3,strlen($path));
//                                  $pathServ = $pathServer.substr($path,3,strlen($path)); 
//                                  $value .= $path."|||".$pathServ."|||".$name."|||";
//
//                               }
//                            }
//                   }
//    }
//
//}
echo json_encode($value);

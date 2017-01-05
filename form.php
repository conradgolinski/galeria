<?php @include_once 'head.html'; ?>
    <div class="wrapper">
        <section id="main"> 
        <header> <h1> Wrzuć zdjęcie </h1> </header>
       <form action="index.php" method="POST" enctype="multipart/form-data">
        <label class="upload">
          <img src="images/upload.png" height="70" alt="prześlij zdjęcie" />
          <input type="file" name="fileUploaded" id="upload"/> <br />
          <input id="filename" type="text" disabled/>
        </label>
         <p>
           Folder:<br />
              <div class="left">
                  <div class="fol"><input type="radio" name="category" checked value="" ><span>bez folderu</span></div>
                <?php 
                $path = '../zdjecia/';
                if($hang = @opendir($path)) {
                    while($read = readdir($hang)) {
                            $name = substr($read,0,40);
                            $pos = strrpos($read, '.');
                            if($pos == false && strlen($name) >= 3)
                            echo '<div class="fol"><input type="radio" name="category" value="'.$name.'"><span>'.$name.'</span></div>';
                        
                    }
                }
                ?>
              </div>
              <div class="right">
                  <span>+</span>
              </div>
                 <input type="submit" value="Ok" name="submitDone" id="submitDone">

                 
      </form>
        
       </section>
        
      <section id="hiper">  <a href="galleryPictures.php">
          <div class="photo">

          </div>
         
            <div class="gallery">
              <img src="images/arrow-right.png"><br />
            </div>
          </a>
     </section>
     </div>
        
<?php include_once 'endbody.html'; ?>

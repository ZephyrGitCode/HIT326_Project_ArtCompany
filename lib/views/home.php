<h1>Home page</h1>

<h2>Art company</h2>

<p><?php echo $message ?></p>

<?php

if(!empty($arts)){
    echo "<h2>Artworks</h2>";
    foreach($arts As $art){
      $artno = htmlspecialchars($art['artNo'],ENT_QUOTES, 'UTF-8');
      $title = htmlspecialchars($art['title'],ENT_QUOTES, 'UTF-8');
      $artdesc = htmlspecialchars($art['artdesc'],ENT_QUOTES, 'UTF-8');
      $price = htmlspecialchars($art['price'],ENT_QUOTES, 'UTF-8');
      $category = htmlspecialchars($art['category'],ENT_QUOTES, 'UTF-8');
      $size = htmlspecialchars($art['size'],ENT_QUOTES, 'UTF-8');
      $image = htmlspecialchars($art['link'],ENT_QUOTES, 'UTF-8');
      ?>
      <div class="artlist">
      <a href="<?php echo "/"."art/"."{$artno}"?>" id="car1">
            <div class="dimage">
              <img href="" src="<?php echo "{$image}"?>" class="artimage"/>
            </div>
          </a>
<?php
      echo "<li>{$title}, {$artdesc}, {$price}, {$category}, {$size}</li>";
?>
      </div>
<?php
    }
  }
  else{
    echo "<h2>No artworks to display</h2>";
}
?>



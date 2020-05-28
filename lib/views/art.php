<section class="products">
<!--- Product details container --->

<body>
<!--- PHP for dynamic pages --->
<?php

if(!empty($arts)){
    echo "<h2>Artworks</h2>";
    foreach($arts As $art){
      $artno = htmlspecialchars($art['artNo'],ENT_QUOTES, 'UTF-8');
      if ($artno == $id){
        $title = htmlspecialchars($art['title'],ENT_QUOTES, 'UTF-8');
        $artdesc = htmlspecialchars($art['artdesc'],ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars("$".$art['price'],ENT_QUOTES, 'UTF-8');
        $category = htmlspecialchars($art['category'],ENT_QUOTES, 'UTF-8');
        $size = htmlspecialchars($art['size'],ENT_QUOTES, 'UTF-8');
        $image = htmlspecialchars($art['link'],ENT_QUOTES, 'UTF-8');
      ?>
      <div class="productcontainer">
        <img class=productimage src="<?php echo "{$image}" ?>" class="artimage"/>
        <div class="producttext">
          <h2><i><?php echo "<li>{$title}"?></i></h2>
          <p><b>Author: placeholder<?php //echo "{$author}" ?></b></p>
          <p class="price">AUD <?php echo "{$price}" ?></p>
          <p><b>Size: </b><?php echo "{$size}" ?></P>

          <label class=productlabel>Quantity:</label>
          <input class=productinput type="text" value="1">
          <button type="button" class="btn btn-default cart">
          Add to cart</button>
        </div>
      </div>
<?php
      }
    }
  }
  else{
    echo "<h2>Artwork failed to load</h2>";
}

?>

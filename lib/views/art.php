<section class="products">

<!--- Bootstrap stylesheets --->
<head>
  <link href="stylesheet.css" rel="stylesheet">
  <link rel="stylesheet"
  href=<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<!--- Product details container --->
<body>
    <div class="container">
      <img class=productimage src="https://i.imgur.com/WijgGCs.png">
      <div class="producttext">
        <h2><i>Sonic Meme</i></h2>
        <p><b>0nyxheart</b></p>
        <p class="price">AUD $12.50</p>
        <p><b>Size: </b>60x55cm</P>
        <label>Quantity:</label>
        <input type="text" value="1">
        <button type="button" class="btn btn-default cart">
        Add to cart</button>
      </div>
    </div>
</body>

</section>

<!--- PHP for dynamic pages --->
<?php
/*
if(!empty($arts)){
    echo "<h2>Artworks</h2>";
    foreach($arts As $art){
      $artno = htmlspecialchars($art['artNo'],ENT_QUOTES, 'UTF-8');
      if ($artno == 1){
        $title = htmlspecialchars($art['title'],ENT_QUOTES, 'UTF-8');
        $artdesc = htmlspecialchars($art['artdesc'],ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars("$".$art['price'],ENT_QUOTES, 'UTF-8');
        $category = htmlspecialchars($art['category'],ENT_QUOTES, 'UTF-8');
        $size = htmlspecialchars($art['size'],ENT_QUOTES, 'UTF-8');
        $image = htmlspecialchars($art['link'],ENT_QUOTES, 'UTF-8');
      ?>
      <div class="artlist">
      <a href="<?php echo "/"."art/"."{$artno}"?>">
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
  }
  else{
    echo "<h2>No artworks to display</h2>";
}
?>
*/
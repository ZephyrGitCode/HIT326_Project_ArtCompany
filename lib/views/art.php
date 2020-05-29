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
        //$author = htmlspecialchars($art['author'],ENT_QUOTES, 'UTF-8');
        $artdesc = htmlspecialchars($art['artdesc'],ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars("$".$art['price'],ENT_QUOTES, 'UTF-8');
        $category = htmlspecialchars($art['category'],ENT_QUOTES, 'UTF-8');
        $size = htmlspecialchars($art['size'],ENT_QUOTES, 'UTF-8');
        $image = htmlspecialchars($art['link'],ENT_QUOTES, 'UTF-8');
      ?>
      <div class="productcontainer">
        <img class="productimage" src="<?php echo "{$image}" ?>" class="artimage"/>
        <div class="producttext">
          <h2><i><?php echo "{$title}"?></i></h2>
          <p><b>Author: 0nyxheart<?php //echo "{$author}" ?></b></p>
          <p class="price">AUD <?php echo "{$price}" ?></p>
          <p><b>Size: </b><?php echo "{$size}" ?></P>

          <label class="productlabel">Quantity:</label>
          <input class="productinput" id="quantity" type="number" value="1" min=0 oninput="validity.valid||(value='');">
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
<script>
  //localStorage.clear();
  
  document.querySelector(".cart").addEventListener('click', addtocart);

  function addtocart(evt){
    var quant = document.getElementById("quantity").value;
    artdata = {"artno":<?php echo $id ?>,"quantity":quant};
    var saveinputs = JSON.stringify(artdata);
    var totalkeys = localStorage.length;
    localStorage.setItem("art"+totalkeys, saveinputs);
    //window.location.href = "/";
  }

</script>

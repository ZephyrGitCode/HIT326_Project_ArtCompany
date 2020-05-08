<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/standard.css" />
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/stylesheet.css">
    <meta name="Description" content="Darwin Art Company">
    <title><?php echo $title ?></title>
  </head>
  <body>

    <?php
      require PARTIALS."/header.html.php";
    ?>

    
    <div class="bodycontent">
      <!--
      <nav>
        <ul>
          <li><a href='/'>Home</a></li>
          <li><a href='/signin'>Sign in</a></li>
          <li><a href='/signup'>Sign up</a></li>
          <li><a href='/signout'>Sign out</a></li>
          <li><a href='/change'>Change password</a></li>
        </ul>
      </nav>
      -->

      <div id='content'>
        <?php
          if(!empty($flash)){
            echo "<p class='flash'>{$flash}</p>";
          }
          if(!empty($error)){
            echo "<p class='flash'>{$error}</p>";	
          }
          require $content;
        ?>
      </div> <!-- end content -->
    </div> <!-- end main -->
    <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "70%";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.body.style.backgroundColor = "white";
      }
    </script>
  </body>
</html>
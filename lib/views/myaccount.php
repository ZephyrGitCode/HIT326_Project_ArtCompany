<head>
    <meta charset="utf-8">
    <title>My Account</title>
    <link href="stylesheet.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body class="accountBody">
    <div class="userBox">
        <h3 class="accounth3">My Account</h3>
        <label class="userPic" for="userImage">
            <input type="file" name="userImage" id="userImage" style="display:none;">
            <img class="userPic" src="https://i.imgur.com/cmDNHJ7.png" id="avatar" style="cursor:pointer"/>
        </label>
        <form>
            <div class="inputBox">
                <input type="text" id="userName" name="" placeholder="Username" value="Comic">
                <span><i class="fa fa-user" aria-hidden="true"></i></span>
            </div>

            <h4>Password</h4>
            <div class="inputBox">
                <input type="password" id="userPassCurrent" name="" placeholder="Current password">
                <span><i class="fa fa-lock" aria-hidden="true"></i></span>
            </div>
            <div class="inputBox">
                <input type="password" id="userPassNew" name="" placeholder="New password">
                <span><i class="fa fa-lock" aria-hidden="true"></i></span>
            </div>
            <div class="inputBox">
                <input type="password" name="" id="userPassNewConfirm" placeholder="Confirm new password">
                <span><i class="fa fa-lock" aria-hidden="true"></i></span>
            </div>

            <h4>Email</h4>
            <div class="inputBox">
                <input type="text" name="" id="userEmail" placeholder="Email" value="terellricardo@hotmail.com">
                <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>


                <input type="submit" name="" value="Save">
        </form>


    </div>
</body>



<!-- Update user image in database through file upload?

<form 
    enctype="multipart/form-data" action="upload.php" method="POST">
    <input name="uploaded" type="file" /><br />
    <input type="submit" value="Upload" />
</form>

-->

<?php

/*

    $target = "upload/";
    $target = $target . basename( $_FILES['uploaded']['name']) ;
    $ok=1;
    if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)){
    echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
    }
    else{
    echo "Sorry, there was a problem uploading your file.";
}

*/

?>

<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body class="accountBody">
    <div class="userBox">
        <h3 style="padding: 0 0 20px;">Shopping Cart</h3>
        <?php     
        /*
        $to_email = 'zephyr.dobson@outlook.com';
        $subject = 'Testing PHP Mail';
        $message = 'This mail is sent using the PHP mail function';
        $headers = 'From: zephyr.dobson@outlook.com';
        mail($to_email,$subject,$message,$headers);
        */
        ?>
        <form action='/cart' method='POST'>
            <input type='hidden' name='_method' value='post' />
            
            <div class="artworks" id="artworks"></div>


        </form>
       

        <div class="checkout">
            <button id="checkoutbtn" onclick="checkout()">Checkout</button>
        </div>
    </div>
    

</body>

<script>
    
    for(var i = 0; i < 11; i++) { //localStorage.length+1
        var data = JSON.parse(localStorage.getItem("art"+i));
        if (data != null && "artno" in data){
            console.log("Artno "+data['artno']);
            console.log("Quantity "+data['quantity']);

            var newart = document.createElement('div');
            newart.setAttribute("style","margin-bottom: 20px;")

            var artimg = document.createElement('img');
            var desc = document.createElement('p');

            artimg.setAttribute("src", data["url"]);
            artimg.setAttribute("class", "productimage");

            desc.innerHTML = data['title']+", Quantity: "+data['quantity']+" Total: $"+ (data['price'] * data['quantity']);
            desc.setAttribute("style", "margin-bottom:.4rem;");

            // Adds a delete button for each entry
            var deleteRow = document.createElement('td');
            var deleteButton = document.createElement('button');
            deleteButton.setAttribute('class', 'delbtn');
            deleteButton.setAttribute('id', 'delbtn');
            deleteButton.innerHTML = 'Delete';
            deleteButton.dataset.key = i;
            deleteButton.addEventListener('click', deleteart, false);

            newart.appendChild(artimg);
            newart.appendChild(desc);
            newart.appendChild(deleteButton);

            document.querySelector('.artworks').appendChild(newart);
        }  
    }

    function deleteart(evt){
        var key = parseInt(evt.target.dataset.key);
        localStorage.removeItem("art"+key);
        // Reloads the window
        window.location.href = "";
    }

    function checkout(evt){
        var subject = "Purchase";
        var body = "All art here";
        // Work in progress
        window.open('mailto:zephyr.dobson@outlook.com?subject='+subject+'&body='+body+'');
    }

    var form = "data";
    var serializedData = form.serialize()
    console.log(serializedData);
    request = $.ajax({
        url: "/cart.php",
        type: "post",
        data: serializedData
    });

</script>
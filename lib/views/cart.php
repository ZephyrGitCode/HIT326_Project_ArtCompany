<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body class="accountBody">
    <?php
    echo $_POST['data'];
    foreach ($_POST as $key => $value) {
        echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
    }
    ?>
    <p id="response"></p>
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
            <button id="checkoutbtn" onclick="purchase()">Checkout</button>
        </div>
    </div>
    

</body>

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
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
        window.location.href = "/";
    }

    function purchase(){

        //date_default_timezone_set("Australia/North");
        //$OrderDate = date('Y/m/d H:m:s');
        
        // once clicked do for item in storage, send it to server
        // Server insert purchase(id), get purchaseNo then
        // insert purchaseitem(purchaseNo,artNo,Quantity)
        var array=[];
        for(var i = 0; i < 11; i++) { //localStorage.length+1
            //var data = localStorage.getItem("art"+i);
            var data = JSON.parse(localStorage.getItem("art"+i));
            if (data != null){ //&& "artno" in data
                $.ajax({
                    dataType: 'json',
                    type: 'POST',  
                    url: '/cart', 
                    data: {
                        artno:data['artno'],
                        quantity:data['quantity']
                    },
                    success: function(response) {
                        $("#response").html(response);
                    }
                });
                localStorage.removeItem("art"+i);
            }
            
        }
        //window.location.href = "/";
    }
</script>
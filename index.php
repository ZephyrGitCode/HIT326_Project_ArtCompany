<?php
# Set to noisy error reporting for development. Comment out later for production mode.
ini_set('display_errors','On');
error_reporting(E_ERROR | E_PARSE);

# Paths
DEFINE("LIB",__DIR__."/lib");
DEFINE("VIEWS",LIB."/views");
DEFINE("PARTIALS",VIEWS."/partials");

# Paths to actual files
DEFINE("MODEL",LIB."/model.php");
DEFINE("APP",LIB."/application.php");

# Define a layout
DEFINE("LAYOUT","standard");

# This inserts our application code which handles the requests and other things
require APP;

#Global, damn it! Oh well we'll take care of this somehow later on ... stay tuned.
$messages = array();

# Below are all the request handlers written as callbacks

get("/",function(){
   force_to_http("/");
   $messages["title"]="Home";
   $messages["message"]="Welcome";
   render($messages,LAYOUT,"home");
});

get("/?signin",function(){
   force_to_https("/?signin");
   $messages["title"]="Sign in";
   require MODEL;
   try{
     if(is_authenticated()){
        set_flash("Why on earth do you want to sign in again. You are already signed in. Perhaps you want to sign out first.");
     }
   
   }
   catch(Exception $e){
       set_flash($e->getMessage());
   }
   render($messages,LAYOUT,"signin");
});

get("/?signup",function(){
   force_to_https("/?signup");
   require MODEL;
   $messages["title"]="Sign up";
   try{
     if(is_authenticated()){
        set_flash("You are already signed in. Why do you want to sign up? Do you want another account? OK then ... who am I to complain!");
     }
   }
   catch(Exception $e){
       set_flash($e->getMessage());
   }
   render($messages,LAYOUT,"signup");
});

get("/?change",function(){
   force_to_https("/?change");
   $messages["title"]="Change password";
   render($messages,LAYOUT,"change_password");
});


get("/?signout",function(){
   // should this be GET or POST or PUT?????
   force_to_https("/?signout");
   require MODEL;
   if(is_authenticated()){
      try{
         sign_out();
         set_flash("You are now signed out.");
         redirect_to("/");
      }
      catch(Exception $e){
        set_flash("Something wrong with the sessions.");
        redirect_to("/");        
     }
   }
   else{
        set_flash("You can't sign out if you are not signed in!");
        redirect_to("/?signin");
   }   

   

});


post("/?signup",function(){
  $name = form('name');
  $pw = form('password');
  $confirm = form('password-confirm');
   
  if($name && $pw && $confirm){
     require MODEL;
     try{
        sign_up($name,$pw,$confirm);
        set_flash("Lovely, you are now signed up, ".htmlspecialchars(form('name'))." Now sign in!");    
     }
     catch(Exception $e){
          set_flash($e->getMessage());  
          redirect_to("/?signup");          
     }
  }
  else{
     set_flash("You are not signed up. Try again and don't leave any fields blank.");  
     redirect_to("/?signup");
  }
  redirect_to("/?signin");
});

post("/?signin",function(){
  $name = form('name');
  $password = form('password');
  if($name && $password){
    require MODEL;
    try{
       sign_in($name,$password);
    }
    catch(Exception $e){
      set_flash("Could not sign you in. Try again. {$e->getMessage()}");
      redirect_to("/?signin");      
    }
  }
  else{
       set_flash("Something wrong with name or password. Try again.");
       redirect_to("/?signin");
  }
  set_flash("Lovely, you are now signed in!");
  redirect_to("/");
});

put("/?change",function(){
  // Not complete of course
  set_flash("Password is changed");
  redirect_to("/");
});

# The Delete call back is left for you to work out

# This function is automatically run if the scrupt gets this far
error_404(function(){
    header("HTTP/1.0 404 Not Found");
    render($messages,LAYOUT,"404");
}); 

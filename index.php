<?php
/* SET to display all warnings in development. Comment next two lines out for production mode*/
ini_set('display_errors','On');
error_reporting(E_ERROR | E_PARSE);

/* Set the path to the Application folder */
DEFINE("LIB",$_SERVER['DOCUMENT_ROOT']."/lib/");

//test

/* SET VIEWS path */
DEFINE("VIEWS",LIB."views/");
DEFINE("PARTIALS",VIEWS."/partials");


# Paths to actual files
DEFINE("MODEL",LIB."/model.php");
DEFINE("APP",LIB."/application.php");

# Define a layout
DEFINE("LAYOUT","standard");

# This inserts our application code which handles the requests and other things
require APP;




/* Here is our Controller code i.e. API if you like.  */
/* The following are just examples of how you might set up a basic app with authentication */

get("/",function($app){
   //$app->force_to_http("/");
   $app->set_message("title","Darwin Art Company");
   $app->set_message("message","Welcome to Darwin Art Company, please browse our wonderful selection of fine arts.");
   require MODEL;
   try{
      $app->set_message("arts",get_products());
   }catch(Exception $e){
      // Failed to load DB
   }
   
   $app->render(LAYOUT,"home");
});

get("/art/:id;[\d]+",function($app){
   //$app->force_to_http("/art/1");
   $app->set_message("title","Darwin Art Company");
   $app->set_message("message","Welcome");
   require MODEL;
   $id = $app->route_var("id");
   $app->set_message("arts", get_products());
   $app->set_message("id", $id);
   $app->render(LAYOUT,"art");
});


get("/myaccount/:id;[\d]+",function($app){
   $id = $app->route_var("id");
   $app->set_message("title","Darwin Art Company");
   $app->set_message("message","Welcome".$id);
   require MODEL;
   try{
      if(is_authenticated()){
         $app->render(LAYOUT,"myaccount");
       }   
    }
    catch(Exception $e){
        $app->set_message("message",$e->getMessage($app));
    }
   $app->set_message("note", "You must be logged in to see your account");
   $app->render(LAYOUT,"/signin");
});

get("/signin",function($app){
   $app->force_to_http("/signin");
   $app->set_message("title","Sign in");
   require MODEL;
   try{
     if(is_authenticated()){
        $app->set_message("message","Why on earth do you want to sign in again. You are already signed in. Perhaps you want to sign out first.");
        $app->set_flash("You are already signed in");
        $app->force_to_http("/");
        header("location: /");
      }   
   }
   catch(Exception $e){
       $app->set_message("message",$e->getMessage($app));
   }
   $app->render(LAYOUT,"signin");
});

get("/signup",function($app){
    $app->force_to_http("/signup");  
    require MODEL;
    $is_authenticated=false;
    
    try{
       $is_authenticated = is_authenticated();
    }
    catch(Exception $e){
       $app->set_flash("We have a problem with DB. The gerbils are working on it."); 
       $app->redirect_to("/"); 
    }   
    
    if($is_authenticated){
        $app->set_message("message","You are already signed in.");
        $app->set_flash("message","You are already signed in."); 
        $app->force_to_http("/");
        header("location: /");
    }
    else if(!$is_authenticated ){
       //$app->set_message("error","You are the SUPER USER. This account cannot be deleted. You are the boss. The only way to clear the SUPER USER from the database is to DROP the entire table. Please sign in after you have finished signing up.");  
    }
    else{
       $app->set_flash("You are not authorised to access this resource yet. I'm gonna tell your mum if you don't sign in."); 
       $app->redirect_to("/signin");        
    }
    
   $app->set_message("title","Sign up");
   $app->render(LAYOUT,"signup");
});

get("/change/:id[\d]+",function($app){
   $id = $app->route_var("id");
   $app->force_to_http("/change");
   $app->set_message("title","Change password");
   require MODEL;
   $name="";
   try{
      if(is_authenticated()){
        try{
           $name = get_user_name(); 
           $app->set_message("name",$name);
           $id = get_user_id();
           $app->set_message("user_id",$id);           
        }
        catch(Exception $e){
            $app->set_message("error","Error with retrieving name");
        }
      }
      else{
          $app->set_flash("You are not authorised to do this.");
          $app->redirect_to("/");   
      }
   }
   catch(Exception $e){
       $app->set_message("error",$e->getMessage());       
   }
   $app->render(LAYOUT,"change_password");
});


get("/signout",function($app){
   // should this be GET or POST or PUT?????
   $app->force_to_http("/signout");
   require MODEL;
   if(is_authenticated()){
      try{
         sign_out();
         $app->set_flash("You are now signed out.");
         $app->redirect_to("/");
      }
      catch(Exception $e){
        $app->set_flash("Something wrong with the sessions.");
        $app->redirect_to("/");        
     }
   }
   else{
        $app->set_flash("You can't sign out if you are not signed in!");
        $app->redirect_to("/signin");
   }   
});


post("/signup",function($app){
    require MODEL;
    try{
        if(!is_authenticated()){
          $fname = $app->form('fname');
          $lname = $app->form('lname');
          $email = $app->form('email');
          $pw = $app->form('password');
          $confirm = $app->form('passw-c');
   
          if($fname && $lname && $email && $pw && $confirm){
              try{
                sign_up($fname,$lname,$email,$pw,$confirm);
                $app->set_flash("Welcome ".$fname.", now please sign in"); 
                $app->redirect_to("/");   
             }
             catch(Exception $e){
                  $app->set_flash($e->getMessage());  
                  $app->redirect_to("/signup");          
             }
          }
          else{
             $app->set_flash("You are not signed up. Try again and don't leave any fields blank.");  
             $app->redirect_to("/signup");
          }
          $app->redirect_to("/signup");
        }
        else{
           $app->set_flash("You are not authenticated, please login");  
           $app->redirect_to("/");           
        }
    }
    catch(Exception $e){
         $app->set_flash("{$e->getMessage()}");  
         $app->redirect_to("/");
    }
});

post("/signin",function($app){
  $email = $app->form('email');
  $password = $app->form('password');
  if($email && $password){
    require MODEL;
    try{
       sign_in($email,$password);
    }
    catch(Exception $e){
      $app->set_flash("Could not sign you in. Try again. {$e->getMessage()}");
      $app->redirect_to("/signin");      
    }
  }
  else{
       $app->set_flash("Something wrong with name or password. Try again.");
       $app->redirect_to("/signin");
  }
  $app->set_message("note","Lovely, you are now signed in!");
  $app->redirect_to("/");
});

put("/change/:id[\d]+",function($app){
   // Not complete because can't handle complex routes like /change/23
   //$app->set_flash("Password is changed");
   //$app->redirect_to("/");

   $id = $app->route_var("id");
   $app->force_to_http("/change");
   $app->set_message("title","Change password");
   require MODEL;
   try{
      if(!is_authenticated()){
         $pw_old = $app->form('old-password');
         $pw_new = $app->form('password');
         $pw_confirm = $app->form('passw-c');

         if($pw_old && $pw_new && $pw_confirm){
            try{
               $return = change_password($id,$pw_old,$pw_new,$pw_confirm);
               $app->set_flash($return);
               $app->set_message("note","Password successfully changed."); 
               $app->redirect_to("/");   
            }
            catch(Exception $e){
               $app->set_flash($e->getMessage());  
               $app->redirect_to("/");          
            }
         }
         else{
            $app->set_flash("Field entry failed, incorrect credentials.");  
            //$app->redirect_to("/change/:id[\d]+");
         }
         $app->redirect_to("/");
      }
      else{
         $app->set_flash("You are not logged in.");  
         $app->redirect_to("/");           
      }
   }
   catch(Exception $e){
      $app->set_flash("{$e->getMessage()}");  
      $app->redirect_to("/");
   }
});

# The Delete call back is left for you to work out
delete("/user",function($app){
   //query to delete
   $app->set_flash("User has been deleted");
   $app->redirect_to("/");
});
// Now. If it get this far then page not found
resolve();
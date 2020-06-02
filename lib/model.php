<?php

function get_db(){
    $db = null;

    try{
        $db = new PDO('mysql:host=localhost;dbname=art_db', 'root','');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        // notice how we THROW the exception. You can catch this in your controller code in the usual way
        throw new Exception("Something wrong with the database: ".$e->getMessage());
    }
    return $db;

}

/* Other functions can go below here */

function get_user($id){
   //$list = null;
   try{
      $db = get_db();
      $query = "SELECT * FROM users where id=?";
      if($statement = $db->prepare($query)){
         $binding = array($id);
         if(!$statement -> execute($binding)){
             throw new Exception("Could not execute query.");
         }
      }
      $list = $statement->fetchall(PDO::FETCH_ASSOC);
      return $list;
   }
   catch(PDOException $e){
      throw new Exception($e->getMessage());
      return "";
      }
}

function get_products(){
   //$arts = null;
   try{
      $db = get_db();
      $query = "SELECT artNo, title, artdesc, price, category, size, link FROM art";
      //add author
      $statement = $db->prepare($query);
      $statement -> execute();
      $arts = $statement->fetchall(PDO::FETCH_ASSOC);
      return $arts;
   }
   catch(PDOException $e){
      throw new Exception($e->getMessage());
      return "";
      }
}

function sign_up($fname, $lname, $email, $password, $password_confirm){
   try{
     $db = get_db();
     
     if(validate_user_name($db,$fname) && validate_passwords($password,$password_confirm)){
          $salt = generate_salt();
          $password_hash = generate_password_hash($password,$salt);
          $query = "INSERT INTO users (fname,lname,email,salt,hashed_password) VALUES (?,?,?,?,?)";
          if($statement = $db->prepare($query)){
             $binding = array($fname,$lname,$email,$salt,$password_hash);
             if(!$statement -> execute($binding)){
                 throw new Exception("Could not execute query.");
             }
          }
          else{
            throw new Exception("Could not prepare statement.");

          }
     }
     else{
        throw new Exception("Invalid data.");
     }
     

   }
   catch(Exception $e){
       throw new Exception($e->getMessage());
   }

}

function get_user_id(){
   $id="";
   session_start();  
   if(!empty($_SESSION["userno"])){
      $id = $_SESSION["userno"];
   }
   session_write_close();
   return $id;	
}

function get_user_name(){
   $id="";
   $name="";
   session_start();  
   if(!empty($_SESSION["userno"])){
      $id = $_SESSION["userno"];
   }
   session_write_close();
   
   if(empty($id)){
     throw new Exception("User has no valid id");	
   }
	
   try{
      $db = get_db();  
      $query = "SELECT fname FROM users WHERE id=?";
      if($statement = $db->prepare($query)){
         $binding = array($id);
         if(!$statement -> execute($binding)){
                 throw new Exception("Could not execute query.");
         }
         else{
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $name = $result['fname'];
         }
      }
      else{
            throw new Exception("Could not prepare statement.");
      }

   }
   catch(Exception $e){
      throw new Exception($e->getMessage());
   }
   return $name;	
}

function sign_in($useremail,$password){
   try{
      $db = get_db();  
      $query = "SELECT id, email, salt, hashed_password FROM users WHERE email=?";
      if($statement = $db->prepare($query)){
         $binding = array($useremail);
         if(!$statement -> execute($binding)){
                 throw new Exception("Could not execute query.");
         }
         else{
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $salt = $result['salt'];
            session_start();
            $_SESSION['result'] = $result;
            $_SESSION['salt'] = $salt;
            $_SESSION['hash'] = $result['hashed_password'];
            session_write_close();
            $hashed_password = $result['hashed_password'];
            
            if(generate_password_hash($password,$salt) != $hashed_password){
                throw new Exception("Account does not exist! .");
            }
            else{
               $email = $result["email"];
               $userno = $result["id"];
               set_authenticated_session($email,$hashed_password, $userno);
            }
         }
      }
      else{
            throw new Exception("Could not prepare statement.");
      }

   }
   catch(Exception $e){
      throw new Exception($e->getMessage());
   }
}

function update_details($id,$title,$fname,$lname,$email,$phone,$city,$state,$country,$postcode,$shipping_address){
   try{
     $db = get_db();
     if(validate_user_name($db,$fname)){
         $query = "UPDATE users SET title=?, fname=?, lname=?, email=?, phone=?, city=?, shipping_state=?, shipping_address=?, country=?, postcode=? WHERE id=?";
         if($statement = $db->prepare($query)){
            $binding = array($title,$fname,$lname,$email,$phone,$city,$state,$shipping_address,$country,$postcode,$id);
            if(!$statement -> execute($binding)){
               throw new Exception("Could not execute query.");
            }else{
               session_start();  
               $_SESSION["email"] = $email;
               session_write_close();
            }
         }
         else{
         throw new Exception("Could not prepare statement.");
         }
     }
     else{
        throw new Exception("Invalid data.");
     }
     

   }
   catch(Exception $e){
       throw new Exception($e->getMessage());
   }

}

function is_db_empty(){
   $is_empty = false;
   try{
      $db = get_db();  
      $query = "SELECT id FROM users WHERE id=?";
      if($statement = $db->prepare($query)){
	     $id=1;
         $binding = array($id);
         if(!$statement -> execute($binding)){
                 throw new Exception("Could not execute query.");
         }
         else{
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if(empty($result)){
	          $is_empty = true;
            }
         }
      }
      else{
            throw new Exception("Could not prepare statement.");
      }

   }
   catch(Exception $e){
      throw new Exception($e->getMessage());
   }
   return $is_empty;	
	
}

function set_authenticated_session($email,$password_hash, $userno){
      session_start();  
      
      //Make it a bit harder to session hijack
      session_regenerate_id(true);
      $_SESSION["userno"] = $userno;
      $_SESSION["email"] = $email;
      $_SESSION["hash"] = $password_hash;
      session_write_close();
}

function generate_password_hash($password,$salt){
      return hash("sha256", $password.$salt, false);
}

function generate_salt(){
    $chars = "0123456789ABCDEF";
    return str_shuffle($chars);
}

function validate_user_name($db,$user_name){
    // is it a valid name?
    // use get_user_id function. if empty then it doesn't exist
    // if all good return true, other return false
    return true;
}

function validate_passwords($password, $password_confirm){
   if($password === $password_confirm && validate_password($password)){
      return true;
   }
   return false;
}

function validate_password($password){
  //Does the password pass the strong password tests
  return true;
}


function is_authenticated(){
    $email = "";
    $hash="";
    
    session_start();
    if(!empty($_SESSION["email"]) && !empty($_SESSION["hash"])){
       $email = $_SESSION["email"];
       $hash = $_SESSION["hash"];
    }
    session_write_close();
 
    if(!empty($email) && !empty($hash)){

        try{
           $db = get_db();
           $query = "SELECT hashed_password FROM users WHERE email=?";
           if($statement = $db->prepare($query)){
             $binding = array($email);
             if(!$statement -> execute($binding)){
                return false;
             }
             else{
                 $result = $statement->fetch(PDO::FETCH_ASSOC);
                 if($result['hashed_password'] === $hash){
                   return true;
                 }
             }
           }
            
        }
        catch(Exception $e){
           throw new Exception("Authentication not working properly. {$e->getMessage()}");
        }
    
    }
    return false;

}

function sign_out(){
    session_start();
    if( !empty($_SESSION["email"]) && !empty($_SESSION["hash"]) && !empty($_SESSION["userno"]) ){
       $_SESSION["email"] = "";
       $_SESSION["hash"] = "";
       $_SESSION["userno"] == "";
       $_SESSION = array();
       session_destroy();                     
    }
    session_write_close();
}


function change_password($id, $old_pw, $new_pw, $pw_confirm){
   try{
      $db = get_db();
      $query = "SELECT salt, hashed_password FROM users WHERE id=?";
      if($statement = $db->prepare($query)){
         $binding = array($id);
         if(!$statement -> execute($binding)){
                 throw new Exception("Could not execute query.");
         }
         else{
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $salt = $result['salt'];
            $hash = $result['hashed_password'];
            if(generate_password_hash($old_pw,$salt) != $hash){
               throw new Exception("Old Password does not match.");
           }
           else{
               if (validate_passwords($new_pw, $pw_confirm)){
                  $salt = generate_salt();
                  $password_hash = generate_password_hash($new_pw,$salt);
                  $query = "UPDATE users SET hashed_password=?, salt=? WHERE id=?";
                  if($statement = $db->prepare($query)){
                     $binding = array($password_hash, $salt, $id);
                     if(!$statement -> execute($binding)){
                           throw new Exception("Could not execute query.");
                     }else{
                        sign_out();
                     }
                  }
                  else{
                  throw new Exception("Could not prepare statement.");
                  }
               }else{
                  throw new Exception("New password and confirm password did not match.");
               }
            }
         }
      }
      else{
      throw new Exception("Could not prepare statement.");
      }
 
    }
    catch(Exception $e){
        throw new Exception($e->getMessage());
    }
}
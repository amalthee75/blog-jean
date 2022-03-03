<?php 
        try{
            $pdo= new PDO("mysql:host=localhost;dbname=blogjean", "root");
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        // $req=$pdo->prepare("insert into fonctions(fonction, role) values(:fc, :rl)");
        // $req->execute(array(":fc"=>"strlen"));
  

?>
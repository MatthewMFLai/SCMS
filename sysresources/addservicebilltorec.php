<?php

/* 
 * script that adds service bill to details to database
 */
    require '../dbConfig.php';
    
    $servicebillto=$_POST["servicebillto"];
    $platformid=$_POST['platformid'];
    
    $sql1 = $conn->prepare('SELECT servicebillto FROM servicebillto WHERE servicebillto = ? AND serviceplatform=?');
    $sql1->bind_param('si',$servicebillto,$platformid);
    
    
     if($sql1->execute()){
          $sql1->store_result();
          if($sql1->num_rows()>0){
              echo 'exists';
          }
          else {
               $sql= $conn->prepare('INSERT INTO servicebillto (servicebillto,serviceplatform) VALUES (?,?)');
                $sql->bind_param('si',$servicebillto,$platformid);
                if($sql->execute()){
                    echo 'success';

                }
                else{
                    echo 'failed';
                }
          }
     }
     else{
          echo 'failed';
     }
   
    mysqli_close($conn);
?>
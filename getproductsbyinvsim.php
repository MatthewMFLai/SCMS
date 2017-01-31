<?php

/* 
 * get product models that does not have sim assigned
 */
    require 'dbConfig.php';
    
  
    $invNum=$_POST['invNum'];
    
    $sql= $conn->prepare('SELECT productmodel.prodmodelid,productmodelmaster.productmodelname FROM productmodel INNER JOIN productmodelmaster ON productmodelmaster.productmodelid=productmodel.productmodel LEFT JOIN productmodelsim ON productmodelsim.productmodelinv=productmodel.prodmodelid WHERE productmodel.invNum=? AND productmodelsim.productmodelinv IS NULL');
    $sql->bind_param('i',$invNum);
    $sql->execute();
    $sql->bind_result($productmodelid,$productmodelname);
    echo '<option value="Blank"><--Select--></option>';
    while($sql->fetch()){
        echo '<option value="'.$productmodelid.'">'.$productmodelid.'-'.$productmodelname.'</option>';
        
    }
   
    mysqli_close($conn);
?>
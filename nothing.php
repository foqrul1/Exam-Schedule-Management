<?php
            $id = $_POST['created_by']; 
            $query = "SELECT name FROM admin WHERE id=$id";
            $result = mysqli_query($conn,$query);
            $name = mysqli_fetch_assoc($result);
            ?> 

            <td><?php echo $name['name']; ?></td> 




            print_r($row);
      exit();
    }
    ?>
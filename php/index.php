<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Profile</title>
</head>
<body>
    <form method="post">
        <input type="submit" name="addbtn" value="Add +" />
        <table>
            <tr>
                <th>Flight</th>
                <th>Terminal</th>
                <th>Gate</th>
                <th>Aircraft</th>
            </tr>
            <?php
                require('dbh.php');
                require('getSql.php');
                $selectSql = new Dotaz('select', 'let', '*');
                $result = $db->query($selectSql->getRequest());
                $i = 0;
    
                while ($row = mysqli_fetch_assoc($result)){
                    $i++;
                    echo "<tr id='row$i'>";           
                    echo "<td>".$row['id']."<button type='submit' value='".$row['id'].'=id='.$row['id']."' name='edit' id='edit$i'>E</button><button value='id=".$row['id']."' name='delete'>D</button>";
                    echo "<td>".$row['terminal']."<button type='submit' value='".$row['id'].'=terminal='.$row['terminal']."' name='edit' id='edit$i'>E</button></td>";
                    echo "<td>".$row['gate']."<button type='submit' value='".$row['id'].'=gate='.$row['gate']."' name='edit' id='edit$i'>E</button></td>";
                    echo "<td>".$row['letadlo']."<button type='submit' value='".$row['id'].'=letadlo='.$row['letadlo']."' name='edit' id='edit$i'>E</button></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </form>
    
    <?php
        if(isset($_POST['edit'])){
            $editData = explode('=', $_POST['edit']);
            $id = $editData[0];
            $column = $editData[1];
            $data = $editData[2];
    
            echo "<form action='applyChange.php' method='post'>";
            echo "<input type='hidden' name='post_data' value='$id=$column=$data'>";
            echo "<input type='text' name='new_value' placeholder='Edit $column $data' required>";
            echo "<input type='submit' name='apply'>";
            echo "</form>";
        }
    
        if(isset($_POST['addbtn'])){
            echo "<form action='applyChange.php' method='post'>";
            echo "<input type='text' name='id' placeholder='ID' required>";
            echo "<input type='text' name='terminal' placeholder='Terminal' required>";
            echo "<input type='text' name='gate' placeholder='Gate' required>";
            echo "<input type='text' name='aircraft' placeholder='Aircraft' required>";
            echo "<input type='submit' name='insert' value='Add'>";
            echo "</form>";
        }
    
        if(isset($_POST['delete'])){
            $deleteData = $_POST['delete'];
            echo "<form action='applyChange.php' method='post'>";
            echo "<input type='hidden' name='post_data' value='$deleteData'>";
            echo "<input type='submit 'name='yes-delete' value='Yes'>";
            echo "<input type='submit' name='no-delete' value='No'>";
            echo "</form>";
        }
    ?>
</body>

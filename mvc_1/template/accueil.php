<?php 
    include_once 'header.php';
?>
<!--READ table Users-->
                
        <h1>Liste des participants</h1>

    <table>
        <thead>
            
            <tr>
                <th>lastName</th>
                <th>firstName</th>
                <th>email</th>
                <th>role</th>
            </tr>
        </thead>
    <tbody>
        
        <?php
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . $user->getLastName() . "</td>";
            echo "<td>" . $user->getFirstName() ."</td>";
            echo "<td>" . $user->getEmail() . "</td>";
            echo "<td>" . $user->getRole() . "</td>";
            echo "</tr>";

        }
        ?>
        
    </tbody>
    </table>
    
    <!--READ table category-->
        <h1>Liste de categories d'ateliers</h1>

    
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>description</th>
            </tr>
        </thead>
    <tbody>
        
        <?php
        foreach($category as $cat){
            ?>
            <tr>
                <td><?= $cat->getId(); ?></td>
                <td><?= $cat->getName(); ?></td>
                <td><?= $cat->getDescription();?></td>
                
            </tr>
            <?php
        }
        ?>
    </tbody>
    </table>



<!-- READ table Atelier-->
        <h1>Liste ateliers réservés</h1>
    
    <table>
    <thead>
        <th>id</th>
        <th>created_at</th>
        <th>category_id</th>
        <th>url_picture</th>

    </thead>
    <tbody>
        
        <?php
        foreach($atelier as $shop){
            ?>
            <tr>
                <td><?= $shop->getId(); ?></td>
                <td><?= $shop->getDate(); ?></td>
                <td><?= $shop->getCategory_id();?></td>
                <td><?= $shop->getUrl_picture();?></td>

            </tr>
            <?php
        }
        ?>
        
    </tbody>
    </table>

<div id="footer">
        <p>&copy; Isa Geek <?php echo date("Y"); ?></p>
    </div>
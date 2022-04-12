<?php 
    include_once 'header.php';
?>

    <h1 class="header">Inscrivez-vous</h1>


    <form method="post" action="./model/user.php">
        <input type="hidden" name="type" value="register">
        <input type="text" name="usersFirstName" 
        placeholder="FirstName...">
        <input type="text" name="usersLastName" 
        placeholder="LastName...">
        <input type="password" name="usersPwd" 
        placeholder="Password...">
        <input type="password" name="pwdRepeat" 
        placeholder="Repeat password">
        <button type="submit" name="submit">Valider</button>
    </form>
    
<?php 
    include_once 'footer.php'
?>
<?php 
    include_once 'header.php';
?>
    <h1 class="header">Connectez-vous</h1>


    <form method="post" action="./model/user.php">
    <input type="hidden" name="type" value="login">
        <input type="text" name="name/email"  
        placeholder="Email...">
        <input type="password" name="userPwd" 
        placeholder="Password...">
        <button type="submit" name="submit">connexion</button>
    </form>


<h1 class="header">Inscrivez-vous</h1>


    <form method="post" action="./model/user.php">
        <input type="hidden" name="type" value="register">
        <input type="text" name="usersFirstName" 
        placeholder="FirstName...">
        <input type="text" name="usersLastName" 
        placeholder="LastName...">
        <input type="password" name="usersPwd" 
        placeholder="Password..." required>
        <input type="password" name="pwdRepeat" 
        placeholder="Repeat password" required>
        <button type="submit" name="submit">Valider</button>
    </form>
    
<?php 
    include_once 'footer.php'
?>


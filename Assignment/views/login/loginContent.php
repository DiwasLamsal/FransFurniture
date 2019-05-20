<!-- The login form -->
<main class = "home">

  <h2>Log in</h2>
  <form action="/Assignment/public/Login" method="post" style="padding: 40px">
    <label>Username: </label>
    <input type="text" placeholder="Username" name="username" />
    <label>Password: </label>
    <input type="password" placeholder="Password" name="password" />
    <br>
    <!-- Display invalid login message -->
    <?php echo '<label>'.$text.'</label>';?>
    <input type="submit" name="submit" value="Log In" />
  </form>

</main>

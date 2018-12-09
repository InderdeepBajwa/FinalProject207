<?php require("head.php"); ?>

<nav>
  <ul>
    <li <?php if($_SERVER['SCRIPT_NAME']=="/fp2/index.php") { ?>  class="active"   <?php   }  ?>>
      <a class="a" href="/fp2">Home</a></li>
    <?php if (!isset($_SESSION['LoggedUser'])): ?>
      <li style="float:right" <?php if($_SERVER['SCRIPT_NAME']=="/fp2/pages/signUp.php") { ?>  class="active"   <?php   }  ?>>
        <a href="/fp2/pages/signUp.php">Sign Up</a></li>
      <li style="float:right" <?php if($_SERVER['SCRIPT_NAME']=="/fp2/pages/signIn.php") { ?>  class="active"   <?php   }  ?>>
        <a href="/fp2/pages/signIn.php">Sign In</a></li>
      <?php else: ?>
      <li style="float:right" >
        <a href="/fp2/pages/signOut.php">Sign Out</a></li>
      <?php if ($_SESSION['LoggedUser']['isAdmin']=="HasAccess"): ?>
      <li style="float:right" <?php if($_SERVER['SCRIPT_NAME']=="/fp2/admin/index.php") { ?>  class="active"   <?php   }  ?>>
      <a href="/fp2/admin">Admin</a></li>
    <?php endif; ?>
  <?php endif; ?>
  </ul>
</nav>

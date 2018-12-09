<?php
  ob_start();
  require('../boilerplate/head.php');
  require('../boilerplate/navbar.php');

  $buffer=ob_get_contents();
  ob_end_clean();

  $title = "Admin Panel";
  $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer); echo $buffer;

 ?>
<aside class="admin-leftbar">
  <ul>
    <li><a>Profile</a></li>
    <li><a>{Name}</a></li>
    <li><a>Manage Posts</a></li>
    <li><a>Manage Users</a></li>
  </ul>
</aside>

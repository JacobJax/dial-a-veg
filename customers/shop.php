<?php
session_start();
echo "<h1>" . $_SESSION["id"] . "</h1><br>";
echo "<h1> Full name: " . $_SESSION['fullname'] . "</h1>";
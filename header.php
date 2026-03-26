<?php 

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

?>

<header>
       <img class="imazhi1" src="spi-logo.svg" alt="logo-Pilates" onclick="window.location.href='Pilates.php'">
       <nav>
        <ul class="nav_links">
            <li><a href="Pilates.php" class="<?php echo ($currentPage == 'Pilates.php') ? 'active' : ''; ?>">Home</a></li>
             <li><a href="about.php" class="<?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>">About</a></li>
             <li><a href="services.php" class="<?php echo ($currentPage == 'services.php') ? 'active' : ''; ?>">Services</a></li>
             <li><a href="contact.php" class="<?php echo ($currentPage == 'contact.php') ? 'active' : ''; ?>">Contact</a></li>
            <li><a href="booking.php" class="<?php echo ($currentPage == 'booking.php') ? 'active' : ''; ?>">Book Online</a></li>

            <?php if(isset($_SESSION['user_id'])): ?>
                <li><a href="logout.php" style="color: red;">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
       </nav>
   </header>
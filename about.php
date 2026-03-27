<?php

require_once 'Database.php';
require_once 'Content.php';

$db=new Database();
$connection=$db->getConnection();
$contentManager=new Content($connection);

$aboutIntro=$contentManager->getSection('about_page_intro');

$instructors=$contentManager->getAllInstructors();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <?php include 'header.php'; ?>

   <section class="studio-section">
    <div class="studio-text">
        <h2>Discover Our Space</h2>
        <p>
            Welcome to our Pilates Studio, where a warm atmosphere meets modern training 
            techniques. Our space is yhoughtfully designed to motivate, inspire and 
            support you throughout your wellnes journey.
        </p>
    </div>
    <div class="studio-image">
        <img src="images/photo-1604467731651-3d8b9c702b86.avif" alt="foto">
    </div>
   </section>

   <section class="instructors">
    <h2 class="title">Meet Our Instructors</h2>
    <p class="subtitle">
        Our team of experienced instructors is here to guide you through your Pilates 
        practice with skill and passion. Meet the dedicated individuals who bring energy,
        knowledge and care to our studio.
    </p>

    <div class="instructor-section">
        <?php foreach($instructors as $inst): ?>
        <div class="instructor">
            <img src="images/<?php echo $inst['image']; ?>" alt="instruktori">
            <h3><?php echo $inst['name'];?></h3>
            <p class="role"><?php echo $inst['role']; ?></p>
            <p><?php echo $inst['bio']; ?></p>
            <a class="email" href="#"><?php echo $inst['email']; ?></a>
        </div>
        <?php endforeach; ?>
    </div>
   </section>


   <?php include 'footer.php'; ?>

 <script src="script1.js"></script>
</body>
</html>
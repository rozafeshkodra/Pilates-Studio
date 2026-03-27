<?php

require_once 'Database.php';
require_once 'Content.php';

$db=new Database();
$connection=$db->getConnection();

$contentManager=new Content($connection);

$aboutMain=$contentManager->getSection('about_main');
$aboutMission=$contentManager->getSection('about_mission');
$whyUsMain=$contentManager->getSection('why_us_main');
$whyUsPoints=$contentManager->getWhyUSPoints();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilates Studio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>

   <!--Pilates join now :>-->
   <section class="hero">
       <img class="foto" src="premium_photo-1674675647732-ba72cd15ff93.avif" alt="foto1">
       <img class="foto" src="photo-1717500252573-d31d4bf5ddf1.avif" alt="foto2">
   </section>
   <div class="overlay">
       <h2>Discover the <br> Power of Pilates</h2>
       <p>Welcome to our Pilates studio, where strength and flexibility come together. Join us for personalized sessions in a supportive environment.</p>
       <button onclick="window.location.href='login.php'">Join Now</button>                                                                            <!-- <button src="login.html">Join Now</button> -->
    </div>

    <!--Pjesa e book your session :>-->
    <section class="book-session">
        <h2>Book Your Session</h2>
    </section>
    <div class="katrorat">

        <div class="katror">
            <img src="images/pic2.avif" alt="">
            <h3>Beginner Pilates</h3>
            <p>Start your journey to strength and flexibility—perfect for beginners!</p> <br>
            <p>Thu <br> 30 min</p>
            <p>$30</p>
            <button class="book-btn" onclick="window.location.href='login.html'" >Book Now</button>
        </div>

        <div class="katror">
            <img src="images/pic4.avif" alt="">
            <h3>Advanced Pilates</h3>
            <p>Push your limits and master advanced techniques for total body transformation.</p><br>
            <p>Thu <br>50 min</p>
            <p>$50</p>
            <button class="book-btn" onclick="window.location.href='login.html'">Book Now</button>
        </div>

        <div class="katror">
            <img src="images/pic3.avif" alt="">
            <h3>Reformer Pilates</h3>
            <p>Maximize your strength, flexibility, and muscle tone with the power of the Reformer.</p><br>
            <p>Thu <br> 60 min</p>
            <p>$60</p>
            <button class="book-btn" onclick="window.location.href='login.html'">Book Now</button>
        </div>
    </div>

 <!--Pjesa e about our studio-->
    <section class="about-section">
        <div class="about-container">
        <div class="about-image">
            <img src="<?php echo $aboutMain['image_path']; ?>" alt="Pilates Studio"/>
        </div>
        <div class="about-text">
            <h2><?php echo $aboutMain['title']; ?></h2>
            
            <h3>Our Story</h3>
            <p><?php echo $aboutMain['content']; ?></p>

            <h3><?php echo $aboutMission['title']; ?></h3>
            <p><?php echo $aboutMission['content']; ?></p>
            <button class="learn-more" onclick="window.location.href='about.php'">Learn More</button>
        </div>
        </div>
    </section>

<!--Pjesa (why us?)-->
    <section class="why-us">
        <div class="us-left">
            <h1><?php echo $whyUsMain['title']; ?></h1>
            <p><?php echo $whyUsMain['content']; ?> </p>
        </div>

        <div class="us-right">
            <?php foreach($whyUsPoints as $index => $point): ?>
                <div class="us-box">
                    <h3><?php echo $point['title']; ?></h3>
                    <p><?php echo $point['content']; ?> </p>
                </div>
                <?php if($index< count($whyUsPoints)-1): ?>

                <div class="divider"></div>

                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </section>

<!-- get in touch with us :> -->
 <section class="contact-section">
    <div class="contact-image">
        <img src="images/pic5.avif" alt="Yoga Pose">
    </div>
    <div class="contact-form">
        <h2>Get in Touch With Us</h2>
        <form>
            <div class="form-group">
                <label for="clientMessage">Tell us anything: a comment, suggestion, or just spred some positivity!</label>
                <textarea id="clientMessage" name="clientMessage" placeholder="Write your message here..." required></textarea>
            </div>
            <button class="btn-contact-form" type="submit">Send</button>
            <div id="contact-status" class="status-message"></div>
        </form>
    </div>
</section>

<!--Pjesa e footer-it-->

<?php include 'footer.php'; ?>

 <script src="script1.js"></script>
</body>
</html>
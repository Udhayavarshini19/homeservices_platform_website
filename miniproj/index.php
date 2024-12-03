<?php include_once "./include/header.php"; ?>

<style>
 body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #757575;
}
/* Hero section */
.hero {
    color: black;
    text-align: center;
    padding: 100px 20px;
    text-shadow: 1px 1px  rgba(0, 0, 0, 0.6);
}

.hero h1 {
    font-size: 3em;
    margin-bottom: 10px;
}

.hero p {
    font-size: 1.2em;
}

.hero .cta-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 25px;
    background-color: #00264e;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.hero .cta-btn:hover {
    background-color: #0056b3;
}   

/* Introductory section */
.intro {
    padding: 40px 20px;
    text-align: center;
    background-color: white;
}

.intro p {
    font-size: 1.2em;
    color: #484848;
}
/* General container styling */
.container {
    margin-top: 40px;
}

/* Grid layout */
.service-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

/* Individual service box */
.service-box {
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    border-radius: 10px;
    text-align: center;
    padding: 30px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    cursor: pointer;
}

/* Service box hover effect */
.service-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    background-color: #f8f9fa;
}

/* Service title styling */
.service-box h5 a {
    text-decoration: none;
    color: #343a40;
    font-size: 1.2em;
    font-weight: bold;
    transition: color 0.3s;
}

/* Hover effect on links */
.service-box h5 a:hover {
    color: #007bff;
}
/* Why choose us section */
.why-choose {
    background-color: #00264e ;
    color: white;
    padding: 50px 20px;
    text-align: center;
}

.why-choose h2 {
    margin-bottom: 20px;
}

.why-choose .points {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.point {
    width: 250px;
    margin: 10px;
    text-align: center;
}
.contact-btn {
    display: inline-block;
    margin-top: 30px;
    padding: 10px 20px;
    background-color: #00264e;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.contact-btn:hover {
    background-color: #0056b3;
}
/* Responsive adjustments */
@media (max-width: 768px) {
    .service-grid {
        grid-template-columns: 1fr;
    }
}

/*hero section*/
</style><div class="hero">
    <h1>Welcome to Our Service Platform</h1>
    <p>Connecting you with skilled professionals for all your needs.</p>
    <a href="findservice.php" class="cta-btn">Explore Services -></a>
</div>

<!-- Introductory Section -->
<div class="intro">
    <p>We offer reliable and professional services including electrical work, plumbing, carpentry, and more.
        
        Tap to add service at your doorstep. <br>Your satisfaction is our top priority.</p>
</div>


<div class="container" >
    <div class="service-grid" >
        <div class="service-box">
            <h5><a href="findservice.php" style="text-decoration: none; color: black;"> ELECTRICIAN</a></h5>
        </div>
        <div class="service-box">
            <h5><a href="findservice.php" style="text-decoration: none; color: black;"> <i class="fas fa-tools"></i> PLUMBING</a></h5>
        </div>
        <div class="service-box">
            <h5><a href="findservice.php" style="text-decoration: none; color: black;">CARPENTERING</a></h5>
        </div>
        <div class="service-box">
            <h5><a href="findservice.php" style="text-decoration: none; color: black;">HOME DECOR</a></h5>
        </div>
        <div class="service-box">
            <h5><a href="findservice.php" style="text-decoration: none; color: black;">EVENT MANAGEMENT</a></h5>
        </div>
        <div class="service-box" >
            <h5><a href="findservice.php" style="text-decoration: none; color: black;">TECHNICAL SERVICES</a></h5>
        </div>
        <div class="service-box">
            <h5><a href="findservice.php" style="text-decoration: none; color: black;">PAINTERS</a></h5>
        </div>
        <div class="service-box">
            <h5><a href="findservice.php" style="text-decoration: none; color: black;">REPAIR SERVICE</a></h5>
        </div>
    </div>
</div>
<br>
<br>
<!-- Why Choose Us Section -->
<div class="why-choose">
    <h2>Why Choose Us?</h2>
    <div class="points">
        <div class="point"><strong>✔ Professional Experts</strong></div>
        <div class="point"><strong>✔ 24/7 Customer Support</strong></div>
        <div class="point"><strong>✔ Affordable Pricing</strong></div>
        <div class="point"><strong>✔ Trusted by Thousands</strong></div>
    </div>
</div>
<!-- Contact Button -->
<div class="container">
    <a href="about.php" class="contact-btn">Get in Touch</a>
</div>



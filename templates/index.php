<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpGrade</title>

    
    <!-- <link rel="stylesheet" href="../static/css/navbar.css"> -->
    <link rel="stylesheet" href="../static/css/home.css">

    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-latest.js"></script> -->
</head>
<body>
    <header class="">
        <a href="#" class="site-logo" aria-label="homepage">UpGrade</a>

        <nav class="main-nav">
            <ul class="nav__list">
            <li class="nav__list-item"><a href="#top" class="nav__link">Home</a></li>
            <li class="nav__list-item">
                <a href="#about-us" class="nav__link">About</a>
            </li>
            <li class="nav__list-item">
                <a href="#contact-us" class="nav__link">Contact</a>
            </li>
            </ul>
        </nav>
        <nav class="account">
            <ul class="nav__list">
            <li class="nav__list-item">
                <a class="nav__link btn primary" href="./login.php">Login</a>
            </li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="sectionOne" id="top">
            <div class="containerOne">
                <div class="s1h1">
                <h1>Want to create your own tests?</h1> 
                </div>
                <div class="s1h3">
                    <p><b>Create quizzes</b>, <b>make tests</b>, <b>build exams</b> or <b>deliver assignments</b> with <span class="product-name">UpGrade</span><b>.</b></p>
                </div>
                <br>
                <div class="cta">
                    <p>Give UpGrade a try!</p>
                    <a class="btn primary nav__link nav__link--btn cta-btn" href="./login.php">Get Started</a>
                </div>
            </div>
        </section>
        <br><br><br>
        <section id="about-us">
            <div class="content">
                <div class="slider from-left">
                    <p>Everything you need to create perfect tests</p>
                </div>
                
                <div class="columns">
                    <div class="col fade-in">
                        <div class="gd icon-contain">
                            <ion-icon name="build-outline" size="large"></ion-icon>
                        </div>
                        <div class="gd">
                            <h3>Customizable Questions</h3>
                            <p>Caters all types of questions from single choice, multiple choice, fill in the blanks and match the pairs.</p>
                        </div>
                    </div>
                    <div class="col fade-in">
                        <div class="gd icon-contain">
                            <ion-icon name="calendar-outline" size="large"></ion-icon>
                        </div>
                        <div class="gd icon-contain">
                            <h3>Schedule Tests</h3>
                            <p>Flexibly generate timings as per your needs, open and close quiz whenever you want.</p>
                        </div>
                    </div>
                    <div class="col fade-in">
                        <div class="gd icon-contain">
                            <ion-icon name="bar-chart-outline" size="large"></ion-icon>
                        </div>
                        <div class="gd">
                            <h3>Statistical Reports </h3>
                            <p>Detailed reports for each tests along with key insights regarding students' doubts.</p>
                        </div>
                    </div>
                    <div class="col fade-in">
                        <div class="gd icon-contain">
                            <ion-icon name="cloud-upload-outline" size="large"></ion-icon>
                        </div>
                        <div class="gd">
                            <h3>Upload Assignments</h3>
                            <p>Student can upload the desired documents for assessments too.</p>
                        </div>
                    </div>
                    <div class="col fade-in">
                        <div class="gd icon-contain">
                            <ion-icon name="bookmarks-outline" size="large"></ion-icon>
                        </div>
                        <div class="gd">
                            <h3>Bookmark Questions</h3>
                            <p>Note down questions for later references.</p>
                        </div>
                    </div>
                    <div class="col fade-in">
                        <div class="gd icon-contain">
                            <ion-icon name="help-circle-outline" size="large"></ion-icon>
                        </div>
                        <div class="gd">
                            <h3>Resolve Queries</h3>
                            <p>Answer queries and clarifications raised by students for quiz questions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="content" id="contact-us">
            <div class="act-card fade-in">
                <div class="content-part">
                    <div class="text-part">
                        <p class="card-head">Have any questions?</p>
                        <p class="card-body">Drop us your queries and we will get it resolved at the earliest. Feel free to send in your suggestions and feedbacks. We value your voice! </p>
                    </div>
                    <a class="nav__link btn cta-btn tertiary" href="#">Drop a message</a>
                </div>
                <div class="act-card-img">
                    <img src="../static/img/question.png" alt="">
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-content">
            Created by <a href="https://github.com/rajsinh2181">Raj Singh</a>, 
            <a href="https://github.com/ritwik4690">Ritwik Vaidya</a> and 
            <a href="https://github.com/sauravUppoor">Saurav Uppoor</a>.
        </div>
    </footer>
    <script src="../static/js/home.js"></script>
</body>
</html>
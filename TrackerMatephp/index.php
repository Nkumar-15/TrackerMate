<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrackerMate</title>
    <link rel="icon" href="img/icon.png"size="64x64">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="./css/slider.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing:border-box ;
    font-family: 'Open Sans', sans-serif;
}

.slider {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: linear-gradient(to right,#9454be,#cf54ae,#fdeff9);
    z-index: -1;
}

nav{
    display: grid;
    grid-template-columns: 10% 1fr 1fr 10%;
    min-height: 10vh;
    color: white;
    align-items: center;
}
#logo{
    grid-column: 2/3;
    font-size: 24px;
    color:black;
}
.Zero_Buggers{
    justify-self: end;
}

section{
    display: flex;
    height: 80vh;
    justify-content: center;
    align-items: center;
}

.logo{
    height: 60%;
    width: 100%;
    position: relative;
}
.logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border: 2px solid black;
    border-radius:10px;
}
.headline{
    position: absolute;
    bottom:8%;
    right:8%;
    font-size: 25px;
    transform: translate(-20%,-70%);
    color:white;
    text-decoration: none;
    z-index: 100;
    padding: 10px;
    background-color: black;
    border-radius: 10px;
    font-family: 'Poppins', sans-serif;
    border: 3px solid pink;
}
.logo::after{
    content: "";
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0.3;
}
    </style>
</head>
<body>

    <header>
        <nav>
            <h3 id="logo">Zero_Buggers</h3>
            <img class="Zero_Buggers"src="./img/zbg.png"width="100px" alt="Zero_Buggers">
        </nav>
        <section>
            <div class="logo">
                <img class="logimg" src="./img/Trackermate_Pink.jpg"alt="TrackerMate">
                <a href="Login.php"class="headline">Login Page</a>
            </div>
        </section>
    </header>

    <div class="slider">
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" integrity="sha512-DkPsH9LzNzZaZjCszwKrooKwgjArJDiEjA5tTgr3YX4E6TYv93ICS8T41yFHJnnSmGpnf0Mvb5NhScYbwvhn2w==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js" integrity="sha512-0xrMWUXzEAc+VY7k48pWd5YT6ig03p4KARKxs4Bqxb9atrcn2fV41fWs+YXTKb8lD2sbPAmZMjKENiyzM/Gagw==" crossorigin="anonymous"></script>
    <script src="./js/slider.js"></script>
</body>
</html>
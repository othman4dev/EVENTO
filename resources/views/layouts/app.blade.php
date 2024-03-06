<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="{{asset('assets/LOGO.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <title>QuickTable | Reserve  It Now</title>
</head>
<body>
    <header class="index-header">
        <img src="assets/LOGO.svg" class="table-icon" alt="">
        @if (session('user'))
        <div class="account" id="account-bar" onclick="dropdown(this)">
            <i class="bi bi-person-down" id="arrow" style="font-size: 30px;"></i>
            <span>{{session('user')->firstname}} {{session('user')->lastname}}</span>
        </div>
        @else
        <div class="logins">
            <a href="/login?login"><button class="log">Login</button></a>
            <a href="/login?register"><button class="log">Register</button></a>
        </div>
        @endif
        <div class="account-drop" id="accountDrop">
            <div class="x-btn" onclick="dropdown(this)">
                <i class="bi bi-x-lg"></i>
            </div>
            <div class="drop-option">
                <i class="bi bi-person" style="font-size: 20px;"></i>
                <span>Profile</span>
            </div>
            <div class="drop-option">
                <i class="bi bi-gear" style="font-size: 20px;"></i>
                <span>Settings</span>
            </div>
            <div class="drop-option" onclick="window.location.href='/logout'">
                <i class="bi bi-box-arrow-right" style="font-size: 20px;"></i>
                <span>Logout</span>
            </div>
        </div>
    </header>
    <main class="index-main">
        <section class="side-bar" id="all-side">
            <div class="menu-btn" onclick="shrinkSide(this)">
                <i class="bi bi-list"></i>
            </div>
            <div class="main-side" id="main-side">
                <div class="side-option">
                    <i class="bi bi-house" style="font-size: 20px;"></i>
                    <span>Home</span>
                </div>
                <div class="side-option">
                    <i class="bi bi-star" style="font-size: 20px;"></i>
                    <span>Favourites</span>
                </div>
                <div class="side-option">
                    <img src="assets/rest.png" style="height: 25px;" alt="">
                    <span>Restaurants</span>
                </div>
                <div class="side-option">
                    <i class="bi bi-cup-hot" style="font-size: 20px;"></i>
                    <span>Coffee shops</span>
                </div>
                <div class="side-option">
                    <i class="bi bi-scissors" style="font-size: 20px;"></i>
                    <span>Barbers</span>
                </div>
                <div class="side-option">
                    <i class="bi bi-person" style="font-size: 20px;"></i>
                    <span>Profile</span>
                </div>
                <div class="side-option">
                    <i class="bi bi-gear" style="font-size: 20px;"></i>
                    <span>Settings</span>
                </div>
            </div>
        </section>
        @yield('content')
    </main>
    <div class="alert-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Title</h2>
                <div class="modal-close" onclick="this.parentNode.parentNode.parentNode.style.display = 'none'">
                    <i class="bi bi-x-lg"></i>
                </div> 
            </div>
            <div class="modal-body">
                <p class="modal-description">Description</p>
            </div>
            <div class="modal-footer">
                <button class="modal-buttons">Ok</button>
                <button class="modal-buttons">Cancel</button>
            </div>
        </div>
    </div>
    <div class="image-big-display">
        <div class="image-big-content">
            <div class="image-big-close">
                <div class="icon-wrapper">
                    <i class="bi bi-download" style="cursor: pointer" onclick="downloadImage()"></i>
                </div>
                <div class="icon-wrapper close">
                    <i class="bi bi-x-lg" style="cursor: pointer" onclick="this.parentNode.parentNode.parentNode.parentNode.style.display = 'none'"></i>
                </div>          
            </div>
            <img src="assets/s1.jfif" alt="" class="image-big" id="display-image">
    </div>
</body>
</html>
<script src="js/script.js"></script>
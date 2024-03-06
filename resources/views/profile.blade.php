@extends('layouts.app')
@section('content')
    <section class="all">
            <section class="profile">
                <div class="user-banner" style="background-image: url('../assets/s4.jpeg')">
                    <div class="user-overlay">
                        <div class="overlay-btns-wrapper">
                            <button class="overlay-btns">Follow <i class="bi bi-person-fill-add"></i></button>
                            <button class="overlay-btns">Message <i class="bi bi-chat-dots-fill"></i></button>
                            <button class="overlay-btns">Report <i class="bi bi-exclamation-triangle-fill"></i></button>
                        </div>
                    </div>
                </div>
                <div class="user-info">
                    <div class="user-pp">
                        <img src="assets/s2.jpg" alt="">
                    </div>
                    <div class="user-texts">
                        <h1 class="user-name">{{ $user->firstname }} {{ $user->lastname }} <i class="bi bi-patch-check-fill verified"></i></h1>
                        <p class="user-description">{{ @$user->description }} Description for the business</p>
                    </div>
                    <div class="user-status">
                        <div class="user-status-item">
                            <h1>Business Type</h1>
                            <span>Coffee shop</span>
                        </div>
                        <div class="user-status-item">
                            <h1>Posts</h1>
                            <span>100</span>
                        </div>
                        <div class="user-status-item">
                            <h1>Followers</h1>
                            <span>100</span>
                        </div>
                        <div class="user-status-item">
                            <h1>Following</h1>
                            <span>100</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="profile-about">
                <div class="profile-about-section">
                    <h1 class="about-about">
                        About
                    </h1>
                    <p class="about-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Facilis sunt provident dolorem perspiciatis soluta molestias 
                        placeat debitis ipsa, modi, voluptas in laudantium sint, aliquam 
                        ab dicta aperiam pariatur odio! Numquam?
                    </p>
                </div>
                <div class="profile-about-section">
                    <h1 class="about-about">
                        Location
                    </h1>
                    <p class="about-text">
                        <i class="bi bi-geo-alt-fill"></i> London, United Kingdom.
                        Navi 6th Avenue, 23 Street 485 Building 3rd Floor 5th Door

                    </p>
                </div>
            </section>
            <section class="swippers">
                <div class="swiper-section">
                    <div class="swiper-title">
                        <h1>Places / Facilities</h1>
                    </div>
                    <div class="swiper">
                        <div class="swiper-wrapper">
                          <img class="swiper-slide" src="assets/s1.jfif" alt="">
                          <img class="swiper-slide" src="assets/s2.jpg" alt="">
                          <img class="swiper-slide" src="assets/s3.jpg" alt="">
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
                <div class="swiper-section">
                    <div class="swiper-title">
                        <h1>Best Plates / Dishes / Services</h1>
                    </div>
                    <div class="swiper">
                        <div class="swiper-wrapper">
                          <img class="swiper-slide" src="assets/s1.jfif" alt="">
                          <img class="swiper-slide" src="assets/s2.jpg" alt="">
                          <img class="swiper-slide" src="assets/s3.jpg" alt="">
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
                <div class="menu-section">
                    
                </div>
            </section>

            <section class="feed">
                <section class="my-city">
                    <div class="nearby">
                        <h1>Top Services</h1>
                    </div>
                    <div class="nearby-option service-item">
                        <div class="nearby-option-texts">
                            <h3 class="nearby-option-title">Service Name</h3>
                            <p class="nearby-option-description">Description Of Service</p>
                        </div>
                        <div class="nearby-option-logo">
                            18$
                        </div>
                    </div>
                    <div class="nearby-option service-item">
                        <div class="nearby-option-texts">
                            <h3 class="nearby-option-title">Service Name</h3>
                            <p class="nearby-option-description">Description Of Service</p>
                        </div>
                        <div class="nearby-option-logo">
                            18$
                        </div>
                    </div>
                    <div class="nearby-option service-item">
                        <div class="nearby-option-texts">
                            <h3 class="nearby-option-title">Service Name</h3>
                            <p class="nearby-option-description">Description Of Service</p>
                        </div>
                        <div class="nearby-option-logo">
                            18$
                        </div>
                    </div>
                    <div class="nearby-option service-item">
                        <div class="nearby-option-texts">
                            <h3 class="nearby-option-title">Service Name</h3>
                            <p class="nearby-option-description">Description Of Service</p>
                        </div>
                        <div class="nearby-option-logo">
                            18$
                        </div>
                    </div>
                    <div class="nearby-loading">
                        <div class="loader"></div>
                        <a href="" class="all-services">
                            View All Services <i class="bi bi-arrow-right-circle-fill"></i>
                        </a>
                    </div>
                </section>
                <section class="posts">
                    <div class="post">
                        <div class="post-header">
                            <div class="post-profile">
                                <div class="post-profile-image">
    
                                </div>
                                <div class="post-profile-texts">
                                    <span class="post-profile-name">Name here</span>
                                    <span class="post-profile-description">Description , London</span>
                                </div>
                            </div>
                            <div class="post-buttons">
                                <button class="post-btns-btn">Follow <i class="bi bi-plus-lg button-icons"></i> </button>
                                <button class="post-btns-btn">Reserve <i class="bi bi-person-fill-check button-icons"></i></button>
                                <button class="post-btns-btn" onclick="showMore(this.nextElementSibling)">More <i class="bi bi-three-dots-vertical button-icons"></i></button>
                                <div class="more-dropdown">
                                    <div class="more-option">
                                        <i class="bi bi-bookmark" style="font-size: 15px;"></i>
                                        <span>Save</span>
                                    </div>
                                    <div class="more-option">
                                        <i class="bi bi-eye-slash" style="font-size: 15px;"></i>
                                        <span>Hide</span>
                                    </div>
                                    <div class="more-option">
                                        <i class="bi bi-exclamation-triangle-fill" style="font-size: 15px;"></i>
                                        <span>Report</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-body">
                            <div class="post-image" style="background-image: url('../assets/s1.jfif')">
                                
                            </div>
                            <div class="post-side">
                                <h3 class="post-title">Title Of Post</h3>
                                <p class="post-description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Ipsa quae, eius pariatur, ab debitis id quas fugiat dolores
                                    eum nihil nulla eos. Amet, ipsam. Sit labore a temporibus 
                                    voluptatem odio!
                                </p>
                            </div>
                        </div>
                        <div class="post-footer">
                            <div class="post-likes">
                                <i class="bi bi-heart like-btn"></i>
                                <span>100</span>
                            </div>
                            <div class="post-likes">
                                <i class="bi bi-chat chat-btn" onclick="showComment(this)"></i>
                                <span>12</span>
                            </div>
                            <div class="post-comment">
                                <form class="note-form" method="post">
                                    <input type="text" class="note-inp" placeholder="Write a positive comment ...">
                                    <button class="note-btn"><i class="bi bi-send" style="font-size: 18px;"></i></button>
                                </form>
                            </div>
                            <div class="post-likes">
                                <i class="bi bi-share share-btn"></i>
                                <span>5</span>
                            </div>
                            <div class="post-likes">
                                <i class="bi bi-question-circle question-btn" onclick="showNote(this)"></i>
                                <span>5</span>
                            </div>
                            <div class="post-note">
                                <form class="note-form" method="post">
                                    <input type="text" class="note-inp" placeholder="Send a note or a question ...">
                                    <button class="note-btn"><i class="bi bi-send" style="font-size: 18px;"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="post-comments">
                        <div class="comments-h1">
                            <h1>Comments</h1>
                        </div>
                        <div class="comment">
                            <div class="comment-user">
                                <div class="comment-user-image">
    
                                </div>
                                <div class="comment-user-texts">
                                    <span class="comment-user-name">Name here</span>
                                    <span class="comment-user-description">Description , London</span>
                                </div>
                            </div>
                            <div class="comment-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Dolores amet, praesentium numquam inventore 
                                itaque beatae? Omnis libero, tempora odit 
                                facilis vitae expedita cumque iusto maiores 
                                possimus pariatur assumenda consequatur rerum?
                            </div>
                        </div>
                        <div class="comment">
                            <div class="comment-user">
                                <div class="comment-user-image">
    
                                </div>
                                <div class="comment-user-texts">
                                    <span class="comment-user-name">Name here</span>
                                    <span class="comment-user-description">Description , London</span>
                                </div>
                            </div>
                            <div class="comment-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Dolores amet, praesentium numquam inventore 
                                itaque beatae? Omnis libero, tempora odit 
                                facilis vitae expedita cumque iusto maiores 
                                possimus pariatur assumenda consequatur rerum?
                            </div>
                        </div>
                        <div class="comments-footer">
                            <button class="comments-btns">
                                More Comments <i class="bi bi-chevron-expand"></i>
                            </button>
                        </div>
                    </div>
                    <div class="post">
                        <div class="post-header">
                            <div class="post-profile">
                                <div class="post-profile-image">
    
                                </div>
                                <div class="post-profile-texts">
                                    <span class="post-profile-name">Name here</span>
                                    <span class="post-profile-description">Description , London</span>
                                </div>
                            </div>
                            <div class="post-buttons">
                                <button class="post-btns-btn">Follow <i class="bi bi-plus-lg button-icons"></i> </button>
                                <button class="post-btns-btn">Reserve <i class="bi bi-person-fill-check button-icons"></i></button>
                                <button class="post-btns-btn" onclick="showMore(this.nextElementSibling)">More <i class="bi bi-three-dots-vertical button-icons"></i></button>
                                <div class="more-dropdown">
                                    <div class="more-option">
                                        <i class="bi bi-bookmark" style="font-size: 15px;"></i>
                                        <span>Save</span>
                                    </div>
                                    <div class="more-option">
                                        <i class="bi bi-eye-slash" style="font-size: 15px;"></i>
                                        <span>Hide</span>
                                    </div>
                                    <div class="more-option">
                                        <i class="bi bi-exclamation-triangle-fill" style="font-size: 15px;"></i>
                                        <span>Report</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-body">
                            <div class="post-image" style="background-image: url('../assets/s1.jfif')">
                                
                            </div>
                            <div class="post-side">
                                <h3 class="post-title">Title Of Post</h3>
                                <p class="post-description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Ipsa quae, eius pariatur, ab debitis id quas fugiat dolores
                                    eum nihil nulla eos. Amet, ipsam. Sit labore a temporibus 
                                    voluptatem odio!
                                    <br><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Ipsa quae, eius pariatur, ab debitis id quas fugiat dolores
                                    eum nihil nulla eos. Amet, ipsam. Sit labore a temporibus 
                                    voluptatem odio!
                                    <br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Ipsa quae, eius pariatur, ab debitis id quas fugiat dolores
                                    eum nihil nulla eos. Amet, ipsam. Sit labore a temporibus 
                                    voluptatem odio!
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Ipsa quae, eius pariatur, ab debitis id quas fugiat dolores
                                    eum nihil nulla eos. Amet, ipsam. Sit labore a temporibus 
                                    voluptatem odio!
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Ipsa quae, eius pariatur, ab debitis id quas fugiat dolores
                                    eum nihil nulla eos. Amet, ipsam. Sit labore a temporibus 
                                    voluptatem odio!
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Ipsa quae, eius pariatur, ab debitis id quas fugiat dolores
                                    eum nihil nulla eos. Amet, ipsam. Sit labore a temporibus 
                                    voluptatem odio!
                                    <br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Ipsa quae, eius pariatur, ab debitis id quas fugiat dolores
                                    eum nihil nulla eos. Amet, ipsam. Sit labore a temporibus 
                                    voluptatem odio!
                                </p>
                                <div class="post-side-overlay">
                                    <p class="read-more" onclick="readMore(this)">Read More...</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-footer">
                            <div class="post-likes">
                                <i class="bi bi-heart like-btn"></i>
                                <span>100</span>
                            </div>
                            <div class="post-likes">
                                <i class="bi bi-chat chat-btn" onclick="showComment(this)"></i>
                                <span>12</span>
                            </div>
                            <div class="post-comment">
                                <form class="note-form" method="post">
                                    <input type="text" class="note-inp" placeholder="Write a positive comment ...">
                                    <button class="note-btn"><i class="bi bi-send" style="font-size: 18px;"></i></button>
                                </form>
                            </div>
                            <div class="post-likes">
                                <i class="bi bi-share share-btn"></i>
                                <span>5</span>
                            </div>
                            <div class="post-likes">
                                <i class="bi bi-question-circle question-btn" onclick="showNote(this)"></i>
                                <span>5</span>
                            </div>
                            <div class="post-note">
                                <form class="note-form" method="post">
                                    <input type="text" class="note-inp" placeholder="Send a note or a question ...">
                                    <button class="note-btn"><i class="bi bi-send" style="font-size: 18px;"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </section>
        <script>
            const swiper = new Swiper('.swiper', {
                  // Optional parameters
              direction: 'horizontal',
              loop: true,

              // If we need pagination
              pagination: {
                el: '.swiper-pagination',
              },
          
              // Navigation arrows
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
          
              // And if we need scrollbar
              scrollbar: {
                el: '.swiper-scrollbar',
              },
            });
        </script>
@endsection
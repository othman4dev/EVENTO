@extends('layouts.app')
@section('content')
<section class="all">
    <section class="advertisement">
        <div class="overplay">
            <h1 class="title-ad"><img src="assets/LOGO.svg" style="height: 100px;margin-left:20px" class="inline-img" alt=""></h1>
            <h2 class="sub-ad">Find, Book, and Attend Events Effortlessly.</h2>
            <h5 class="types">Elevate Your Event Experience with Evento</h5>
        </div>
        <div class="slider" id="slider">
            
        </div>
    </section>
    <section class="feed">
        <section class="my-city">
            <div class="nearby">
                <h1>Nearby</h1>
            </div>
            <div class="nearby-option">
                <div class="nearby-option-image">
                    <img src="assets/s1.jpg" alt="">
                </div>
                <div class="nearby-option-texts">
                    <h3 class="nearby-option-title">Restaurant Name</h3>
                    <p class="nearby-option-description">Description , London</p>
                </div>
                <div class="nearby-option-logo">
                    <i class="bi bi-cup-hot" style="font-size: 20px;"></i>
                </div>
            </div>
            <div class="nearby-option">
                <div class="nearby-option-image">
                    <img src="assets/s1.jpg" alt="">
                </div>
                <div class="nearby-option-texts">
                    <h3 class="nearby-option-title">Restaurant Name</h3>
                    <p class="nearby-option-description">Description , London</p>
                </div>
                <div class="nearby-option-logo">
                    <i class="bi bi-scissors" style="font-size: 20px;"></i>
                </div>
            </div>
            <div class="nearby-option">
                <div class="nearby-option-image">
                    <img src="assets/s1.jpg" alt="">
                </div>
                <div class="nearby-option-texts">
                    <h3 class="nearby-option-title">Restaurant Name</h3>
                    <p class="nearby-option-description">Description , London</p>
                </div>
                <div class="nearby-option-logo">
                    <i class="bi bi-cup-hot" style="font-size: 20px;"></i>
                </div>
            </div>
            <div class="nearby-option">
                <div class="nearby-option-image">
                    <img src="assets/s1.jpg" alt="">
                </div>
                <div class="nearby-option-texts">
                    <h3 class="nearby-option-title">Restaurant Name</h3>
                    <p class="nearby-option-description">Description , London</p>
                </div>
                <div class="nearby-option-logo">
                    <img src="assets/rest.png" style="height: 25px;filter: invert(1);" alt="">
                </div>
            </div>
            <div class="nearby-loading">
                <div class="loader"></div>
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
@endsection
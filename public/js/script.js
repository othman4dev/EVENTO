console.log('╭─────────────────────────────────────────────────────╮');
console.log('│                                                     │');
console.log('│                 Welcome to QuickTable!              │');
console.log('│                                                     │');
console.log('╰─────────────────────────────────────────────────────╯');

document.addEventListener('DOMContentLoaded',function(event){
    // array with texts to type in typewriter
    var dataText = [
        "Discover Exciting Events Near You.",
        "Seamless Event Reservation Experience.",
        "Find, Book, and Attend Events Effortlessly.",
        "Elevate Your Event Experience with Evento"
    ];
    
    // type one text in the typwriter
    // keeps calling itself until the text is finished
    function typeWriter(text, i, fnCallback) {
      // chekc if text isn't finished yet
      if (i < (text.length)) {
        // add next character to h1
       document.querySelector("#login-animation").innerHTML = text.substring(0, i+1) +'<span class="test-animation" aria-hidden="true"></span>';
  
        // wait for a while and call this function again for next character
        setTimeout(function() {
          typeWriter(text, i + 1, fnCallback)
        }, 100);
      }
      // text finished, call callback if there is a callback function
      else if (typeof fnCallback == 'function') {
        // call callback after timeout
        setTimeout(fnCallback, 700);
      }
    }
    // start a typewriter animation for a text in the dataText array
     function StartTextAnimation(i) {
       if (typeof dataText[i] == 'undefined'){
          setTimeout(function() {
            StartTextAnimation(0);
          }, 20000);
       }
       // check if dataText[i] exists
      if (i < dataText[i].length) {
        // text exists! start typewriter animation
       typeWriter(dataText[i], 0, function(){
         // after callback (and whole text has been animated), start next text
         StartTextAnimation(i + 1);
       });
      }
    }
    // start the text animation
    StartTextAnimation(0);
  });

  let loginType = window.location.href.split('?')[1];
  if (loginType == 'login') {
      //switchLogin();
  } else if (loginType === 'register') {
      switchLogin();
  }

// This is the start of script :
function reserveAjax(id, element) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `/reserve/${id}`, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            if (this.responseText === 'login') {
                window.location.href = '/login';
            } else if (this.responseText === 'Reserved') {
                element.innerHTML = this.responseText + '<i class="bi bi-check"></i>';
                element.disabled = true;
            } else {
                element.innerHTML = 'Reserved <i class="bi bi-check"></i>';
                element.disabled = true;
                document.getElementById('alert').style.display = 'flex';
                document.getElementById('alert-message').innerHTML = this.responseText;
            }
        } else {
            element.innerHTML = 'Failed to reserve' + '<i class="bi bi-x"></i>';
        }
    };
    xhr.send();
}

// This is the start of script :
function cancelAjax(id, element) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `/cancel/${id}`, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            if (this.responseText == 'Canceled') {
                element.innerHTML =  'Canceled <i class="bi bi-check"></i>';
                element.disabled = true;
                window.location.reload();
            } else {
                element.innerHTML = 'Cannot cancel <i class="bi bi-x"></i>';
                element.disabled = true;
            }
        } else {
            element.innerHTML = 'Failed to cancel reservation' + '<i class="bi bi-x"></i>';
        }
    };
    xhr.send();
}

function searchAjax(element) {
    if (element.value === '') {
        document.getElementById('search-results').style.display = 'none';
    } else {
        document.getElementById('search-results').style.display = 'flex';
    }
    let xhr = new XMLHttpRequest();
    let search = element.value;
    xhr.open('GET', `/search/${search}`, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('search-results').innerHTML = this.responseText;
        } else {
            console.log('Failed to search');
        }
    };
    xhr.send();

}

let side = true;
let drop = false;
function shrinkSide(btn) {
    let mainPart = document.getElementById('main-side');
    let allSide = document.getElementById('all-side');
    if (side) {
        btn.style.width='50px';
        allSide.style.width = '50px';
        mainPart.querySelectorAll('span').forEach(element => {
            element.style.display = 'none';
        });
        setTimeout(() => {
            mainPart.querySelectorAll('.side-option').forEach(element => {
                element.style.justifyContent = 'center';
            });
        }, 300);
        side = false;
    } else {
        btn.style.width='125px';
        allSide.style.width = '250px';
        mainPart.querySelectorAll('span').forEach(element => {
            element.style.display = 'inline';
        });
        mainPart.querySelectorAll('.side-option').forEach(element => {
            element.style.justifyContent = 'unset';
        });
        side = true;
    }
}
shrinkSide(document.querySelector('.menu-btn'));

let more = false;

function showMore(element) {
    if (more) {
        element.style.animationName = 'showLess';
        more = false;
    } else {
        element.style.animationName = 'showMore';
    }
}
function dropdown(it) {
    if (drop) {
        document.getElementById('accountDrop').style.display = 'none';
        let person = document.querySelector('#arrow');
        person.classList.remove('bi-person-up');
        person.classList.add('bi-person-down');
        drop = false;
    } else {
        document.getElementById('accountDrop').style.display = 'flex';
        let person = document.querySelector('#arrow');
        person.classList.remove('bi-person-down');
        person.classList.add('bi-person-up');
        drop = true;
    }
}
function readMore(btn) {
    btn.parentElement.style.display = 'none';
    btn.parentElement.parentElement.style.paddingRight = '15px';
    let side = btn.parentElement.parentElement;
    side.style.overflowY = 'scroll';
}
function showNote(btn) {
    let comment = btn.parentElement.parentElement.querySelector('.post-comment');
    let note = btn.parentElement.parentElement.querySelector('.post-note');
    if (note.offsetWidth === 0) {
        note.style.width = '300px';
        comment.style.width = '0px';
    } else {
        note.style.width = '0px';
    }
}
function showComment(btn) {
    let comment = btn.parentElement.parentElement.querySelector('.post-comment');
    let note = btn.parentElement.parentElement.querySelector('.post-note');
    if (comment.offsetWidth === 0) {
        note.style.width = '0px';
        comment.style.width = '300px';
    } else {
        comment.style.width = '0px';
    }
}
function showMore(more) {
    if (more.offsetHeight <= 50) {
        more.style.opacity = '1';
        more.style.height = '115px';
    } else {
        more.style.opacity = '0';
        more.style.height = '0px';
    }
}
let pictures = ['../assets/s1.jfif', '../assets/s2.jpg' , '../assets/s2.webp', '../assets/s3.jpg', '../assets/s2.webp', '../assets/s4.jpg'];
let currentIndex = 0;
let maxIterations = 1000; // Set the maximum number of iterations
let interval = 3000; // Set the interval time in milliseconds

function changeImage() {
    document.getElementById('slider').style.backgroundImage = `url(${pictures[currentIndex]})`;
    currentIndex = (currentIndex + 1) % pictures.length;
}

let iterations = 0;
let intervalId = setInterval(() => {
    changeImage();
    iterations++;
    if (iterations === maxIterations) {
        clearInterval(intervalId);
    }
}, interval);

var login = true;

function switchLogin() {
    if (login) {
        document.querySelector('.flip-card-inner').style.transform = 'rotateY(0deg)';
        login = false;
    } else {
        document.querySelector('.flip-card-inner').style.transform = 'rotateY(180deg)';
        login = true;
    }
}
function validation(type) {
    if (type == 'login') {
        let email = document.querySelector('#email1');
        if (email.value == '') {
            email.setCustomValidity('Please fill this field');
        } else {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                email.setCustomValidity('Please enter a valid email address');
            } else {
                email.setCustomValidity('');
                if (document.querySelector('#password').value == '') {
                    document.querySelector('#password').setCustomValidity('Please fill this field');
                } else {
                    if (document.querySelector('#password').value.length <= 7) {
                        document.querySelector('#password').setCustomValidity('Password must be at least 8 characters long');
                    } else {
                        document.querySelector('#password').setCustomValidity('');
                        document.querySelector('#login-form').submit();
                    }
                }
            }
        }
    } else if (type == "register") {
        let email = document.querySelector('#email2');
        if (email.value == '') {
            email.setCustomValidity('Please fill this field');
        } else {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                email.setCustomValidity('Please enter a valid email address');
            } else {
                email.setCustomValidity('');
                if (document.querySelector('#pass1').value == '') {
                    document.querySelector('#pass1').setCustomValidity('Please fill this field');
                } else {
                    if (document.querySelector('#pass1').value.length <= 7) {
                        document.querySelector('#pass1').setCustomValidity('Password must be at least 8 characters long');
                    } else {
                        document.querySelector('#pass1').setCustomValidity('');
                        if (document.querySelector('#pass2').value == '') {
                            document.querySelector('#pass2').setCustomValidity('Please fill this field');
                        } else {
                            if (document.querySelector('#pass2').value.length <= 7) {
                                document.querySelector('#pass2').setCustomValidity('Password must be at least 8 characters long');
                            } else {
                                document.querySelector('#pass2').setCustomValidity('');
                                if (document.querySelector('#pass1').value != document.querySelector('#pass2').value) {
                                    document.querySelector('#pass2').setCustomValidity("Passwords Don't Match");
                                } else {
                                    document.querySelector('#pass2').setCustomValidity('');
                                    document.querySelector('#register-form').submit();
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

function sendMail(email) {

    var xhr = new XMLHttpRequest();

    xhr.open('POST', '/sendMail', true);

    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function() {
        if (xhr.status === 200) {
            
            console.log('Email sent successfully');
        } else {
            
            console.log('Failed to send email');
        }
    };

    var requestBody = JSON.stringify({ email: email });

    xhr.send(requestBody);
}

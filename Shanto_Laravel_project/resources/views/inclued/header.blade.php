

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
  background-color:#d2fff7;
}
#top-head{
  width: 100%;
  border-radius:30px;
  height: 60px;
  background: #fff;
  display: flex;
  position: fixed;
  z-index: 999;
}
#top-head .inner {
  float: left;
  width: 90%;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
/*logo style*/
.inner h1 a {
  color: #20b2aa;
  text-decoration: none;
  font-weight: bold;
  display: flex;
}
/*nav style*/
#top-head nav ul {
  display: flex;
  list-style-type: none;
}
/*nav link style*/
#top-head nav ul li a {
  text-decoration: none;
  padding: 16px;
  color: #404040;
}
#top-head nav ul li a:hover {
  color: #20b2aa;
}
#nav_toggle {
  display: none;
}
img {
  margin-top: 60px;
  width: 100%;
}
/*============================
mobile style
============================*/
@media screen and (max-width:680px) {
/*hamburger menu style*/
  #nav_toggle {
    display: block;
    width: 30px;
    height: 30px;
    position: relative;
    top: 4px;
    z-index: 100;
  }
  #nav_toggle div {
    position: relative;
  }
/*hamburger menu close style*/
  #nav_toggle span {
    display: block;
    height: 2px;
    background: #404040;
    position:absolute;
    width: 100%;
    left: 0;
    -webkit-transition: 0.5s ease-in-out;
    -moz-transition: 0.5s ease-in-out;
    transition: 0.5s ease-in-out;
  }
  #nav_toggle span:nth-child(1) {
    top:0px;
  }
  #nav_toggle span:nth-child(2) {
    top:10px;
  }
  #nav_toggle span:nth-child(3) {
    top:20px;
  }
/*hamburger menu open style*/
  .open #nav_toggle span:nth-child(1) {
    top: 10px;
    -webkit-transform: rotate(135deg);
    -moz-transform: rotate(135deg);
    transform: rotate(135deg);
  }
  .open #nav_toggle span:nth-child(2) {
    width: 0;
    left: 50%;
  }
  .open #nav_toggle span:nth-child(3) {
    top: 10px;
    -webkit-transform: rotate(-135deg);
    -moz-transform: rotate(-135deg);
    transform: rotate(-135deg);
  }
/*nav style*/
  #top-head nav {
    display: none;
    position: absolute;
    top: 60px;
    left: 0;
    width: 100%;
    height: 1040px;
    background: #fff;
    z-index: 999;
  }
  #top-head nav ul {
    display: block;
    width: 80%;
  }
  #top-head nav ul li {
    text-align: center;
    border-bottom: 1px solid #dcdcdc;
  }
  #top-head nav ul li:last-child {
    border: none;
  }
/*nav link style*/
  #top-head nav ul li a {
    display: block;
  }
}
@media screen and (min-width: 681px) {
  #top-head nav {
    display: block;
    position: static;
    height: auto;
    background: none;
  }
  #top-head nav ul {
    display: flex;
    justify-content: space-between;
  }
}

    </style>
  </head>

    <body>
        <header id="top-head">
          <div class="inner">
            <h1><a href="#">LOGO</a></h1>
            <div id="nav_toggle">
              <div>
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
            <nav>
              <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="/view-blog">BLOG</a></li>
                <li><a href="/about">ABOUT</a></li>
                <li><a href="/contact">CONTACT</a></li>
                <li><a href="{{route('logout')}}">LOGOUT</a></li>
              </ul>
            </nav>
          </div>
        </header>


        <script>
            $(function(){
  //hamburger menu click
  $('#nav_toggle').click(function(){
    $("#top-head").toggleClass('open');
    $("nav").slideToggle(500);
  });

  //menu link click
  $('nav a').click(function(){
    if(window.innerWidth <= 680){
      $("#top-head").toggleClass('open');
      $("nav").slideToggle(500);
    }
  });

  // Window resize event
  $(window).resize(function() {
    if(window.innerWidth > 680){
      $("nav").css("display", "block");
    } else {
      if(!$("#top-head").hasClass('open')){
        $("nav").css("display", "none");
      }
    }
  });


  if(window.innerWidth > 680){
    $("nav").css("display", "block");
  } else {
    $("nav").css("display", "none");
  }
});
        </script>
       </body>


  </html>

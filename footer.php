  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
          integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
      </script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
      </script>
      <style>
      /** footer **/

      .footer::before {
          content: "";
          position: absolute;
          width: 457px;
          height: 351px;
          background-image: url(../images/con_top.png);
          background-repeat: no-repeat;
          top: -334px;
          z-index: 9999;
          right: 154px;
      }

      .footer::after {
          content: "";
          position: absolute;
          background-size: 100% 100%;
          height: 300px;
          background-image: url(../images/contact_bg.png);
          background-repeat: no-repeat;
          top: -300px;
          left: 0;
          right: 0;
      }

      .footer {
          position: relative;
          background: #440e62;
          padding-top: 85px;
          text-align: center;
      }

      .footer .titlepage {
          padding-bottom: 0px;
      }

      .footer .titlepage h2 {
          color: #fff;
      }

      .main_form {
          padding: 50px 0px 50px 0px;
      }

      .main_form .contactus {
          border: inherit;
          padding: 0px 10px;
          margin-bottom: 20px;
          width: 100%;
          height: 45px;
          background: transparent;
          color: #ffffff;
          font-size: 18px;
          font-weight: normal;
          border-bottom: #ffffff solid 1px;
      }

      .main_form .contactus1 {
          border: inherit;
          padding: 0px 10px;
          margin-bottom: 20px;
          padding-top: 21px;
          width: 100%;
          height: 80px;
          background: transparent;
          color: #ffffff;
          font-size: 18px;
          font-weight: normal;
          border-bottom: #ffffff solid 1px;
      }

      .main_form .send_btn {
          font-size: 20px;
          transition: ease-in all 0.5s;
          background-color: #ee3112;
          color: #fff;
          padding: 9px 0px;
          max-width: 190px;
          font-weight: 500;
          width: 100%;
          display: block;
          margin-top: 30px;
          float: right;
          border-radius: 30px;
          text-transform: uppercase;
          z-index: 9999;
          position: relative;
      }

      .main_form .send_btn:hover {
          background-color: #e5a124;
          transition: ease-in all 0.5s;
          color: #000;
      }

      #request *::placeholder {
          color: #ffffff;
          opacity: 1;
      }

      ul.social_icon {
          float: right;
          display: flex;
      }

      ul.social_icon h3 {
          color: #fff;
          font-size: 17px;
      }

      ul.social_icon li {
          display: inline-block;
      }

      ul.social_icon li a {
          background: #fff;
          width: 37px;
          height: 37px;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 25px;
          border-radius: 30px;
          margin: 0 3px;
          color: #440e62;
      }

      ul.social_icon li a:hover {
          background-color: #f4cb1e;
          color: #fff;
      }

      .bottom_form h3 {
          font-weight: 600;
          font-size: 22px;
          text-align: left;
          color: #fff;
          padding-bottom: 15px;
      }

      ul.location_icon {
          text-align: left;
          margin-top: -93px;
      }

      ul.location_icon li {
          display: inline-block;
          font-size: 18px;
          line-height: 20px;
          color: #fff;
          padding-bottom: 25px;
          padding-right: 25px;
      }

      ul.location_icon li a {
          font-size: 30px;
          color: #fff;
          line-height: 30px;
          padding-right: 15px;
      }

      ul.location_icon li a:hover {
          color: #e5a124;
      }

      .footer h3 {
          font-weight: 600;
          text-align: left;
          padding-top: 5px;
          padding-right: 30px;
      }

      .copyright {
          margin-top: 30px;
          padding: 20px 0px;
          background-color: #f4cb1e;
      }

      .copyright p {
          color: #fff;
          font-size: 17px;
          line-height: 22px;
          text-align: center;
      }

      .copyright a {
          color: #fff;
      }

      .copyright a:hover {
          color: #212121;
      }

      /** end footer **/

      .inner_page .header {
          background-color: #32cd32;
          padding-bottom: 15px !important;
          position: inherit;
      }

      .inner_page .about {
          padding: 90px 0 0px 0;
      }

      .inner_page .footer {
          margin-top: 90px;
      }

      .inner_page .testimonial {
          padding: 60px 0px 50px 0px;
      }

      .inner_page .footer::before {
          position: inherit;
      }

      .inner_page .footer::after {
          position: inherit;
      }

      /* Footer */
      .site-footer {
          background-color: #26272b;
          padding: 45px 0 20px;
          font-size: 15px;
          line-height: 24px;
          color: #737373;
      }

      .site-footer hr {
          border-top-color: #bbb;
          opacity: 0.5;
      }

      .site-footer hr.small {
          margin: 20px 0;
      }

      .site-footer h6 {
          color: #fff;
          font-size: 16px;
          text-transform: uppercase;
          margin-top: 5px;
          letter-spacing: 2px;
      }

      .site-footer a {
          color: #737373;
      }

      .site-footer a:hover {
          color: #3366cc;
          text-decoration: none;
      }

      .footer-links {
          padding-left: 0;
          list-style: none;
      }

      .footer-links li {
          display: block;
      }

      .footer-links a {
          color: #737373;
      }

      .footer-links a:active,
      .footer-links a:focus,
      .footer-links a:hover {
          color: #3366cc;
          text-decoration: none;
      }

      .footer-links.inline li {
          display: inline-block;
      }

      .site-footer .social-icons {
          text-align: right;
      }

      .site-footer .social-icons a {
          width: 40px;
          height: 40px;
          line-height: 40px;
          margin-left: 6px;
          margin-right: 0;
          border-radius: 100%;
          background-color: #33353d;
      }

      .copyright-text {
          margin: 0;
      }

      @media (max-width: 991px) {
          .site-footer [class^="col-"] {
              margin-bottom: 30px;
          }
      }

      @media (max-width: 767px) {
          .site-footer {
              padding-bottom: 0;
          }

          .site-footer .copyright-text,
          .site-footer .social-icons {
              text-align: center;
          }
      }

      .social-icons {
          padding-left: 0;
          margin-bottom: 0;
          list-style: none;
      }

      .social-icons li {
          display: inline-block;
          margin-bottom: 4px;
      }

      .social-icons li.title {
          margin-right: 15px;
          text-transform: uppercase;
          color: #96a2b2;
          font-weight: 700;
          font-size: 13px;
      }

      .social-icons a {
          background-color: #eceeef;
          color: #818a91;
          font-size: 16px;
          display: inline-block;
          line-height: 44px;
          width: 44px;
          height: 44px;
          text-align: center;
          margin-right: 8px;
          border-radius: 100%;
          -webkit-transition: all 0.2s linear;
          -o-transition: all 0.2s linear;
          transition: all 0.2s linear;
      }

      .social-icons a:active,
      .social-icons a:focus,
      .social-icons a:hover {
          color: #fff;
          background-color: #29aafe;
      }

      .social-icons.size-sm a {
          line-height: 34px;
          height: 34px;
          width: 34px;
          font-size: 14px;
      }

      .social-icons a.facebook:hover {
          background-color: #3b5998;
      }

      .social-icons a.twitter:hover {
          background-color: #00aced;
      }

      .social-icons a.linkedin:hover {
          background-color: #007bb6;
      }

      .social-icons a.dribbble:hover {
          background-color: #ea4c89;
      }

      @media (max-width: 767px) {
          .social-icons li.title {
              display: block;
              margin-right: 0;
              font-weight: 600;
          }
      }
      </style>
  </head>

  <body>
      <br><br><br>
      <!-- Site footer -->
      <footer class="site-footer">
          <div class="container">
              <div class="row">
                  <div class="col-sm-12 col-md-6">
                      <h6>About</h6>
                      <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative to help the
                          upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or
                          snippets as the code wants to be simple. We will help programmers build up concepts in
                          different
                          programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP,
                          Android,
                          SQL and Algorithm.</p>
                  </div>

                  <div class="col-xs-6 col-md-3">
                      <h6>Categories</h6>
                      <ul class="footer-links">
                          <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
                          <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
                          <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
                          <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
                          <li><a href="http://scanfcode.com/category/android/">Android</a></li>
                          <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
                      </ul>
                  </div>

                  <div class="col-xs-6 col-md-3">
                      <h6>Quick Links</h6>
                      <ul class="footer-links">
                          <li><a href="http://scanfcode.com/about/">About Us</a></li>
                          <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
                          <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
                          <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
                          <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
                      </ul>
                  </div>
              </div>
              <hr>
          </div>
          <div class="container">
              <div class="row">
                  <div class="col-md-8 col-sm-6 col-xs-12">
                      <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by
                          <a href="#">Scanfcode</a>.
                      </p>
                  </div>

                  <div class="col-md-4 col-sm-6 col-xs-12">
                      <ul class="social-icons">
                          <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                          <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </footer>
  </body>

  </html>
<!-- Footer -->
<footer>
    <div id="footer-subscribe">
        <div class="container">
<div class="flex container">
					<div class="footer-about" style="text-align: left">
                        <h3><font color="red">Get in <span><font color="white"> Touch</font></span></font></h3>
                       <ul>
                             <li style="text-align:"><i class="fa fa-history" style="color:red;"></i> <span style="font-size: 14px;"><font color="white">&nbsp;2000.</font>
                            </span> 
                             
                             <li style="text-align: left"><i class="fa fa-home" style="color:red;"></i> <span style="font-size: 14px;"><font color="white">&nbsp; Passage Inside Stadium, Al Estad, Nasr City, Cairo</font>
                             </span>
                                 
                             <li style="text-align: left"><i class="fa fa-phone" style="color:red;"></i> <span style="font-size: 14px;"><font color="white">&nbsp;19648. </font>
                             </span>
                                 
                             <li style="text-align: left"><i class="fa fa-envelope-o" style="color:red;"></i> <span style="font-size: 14px;"><font color="white">&nbsp;essahussien@gmail.com.</font>
                            </span> 
                            </ul>
                        </div>
        
<div class="footer-subscribe" style="text-align: center"> 
<h3><font color="red">Follow <span><font color="white"> Us</font></span></font> </h3>
<ul>
<li style="text-align: center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/profile.php?id=100003108537446"><span class="fab fa-facebook-f" style="color:LightBlue;"></span></a></li>
<li style="text-align: center"><a href="https://instagram.com/essahussein123?utm_medium=copy_link"><span class="fab fa-instagram" style="color:MediumVioletRed;"></span></a></li>
<li style="text-align: center"><a href="https://www.youtube.com/channel/UCMbf16ah13IE-aj2IjWaGkw"><span class="fab fa-youtube" style="color:red;"></span></a></li>
</ul>
</div>
    
    <div class="footer-about"> 
            <h3><font color="red">Company <span><font color="white" > Info</font></span></font> </h3>
                       <ul>
                           <li style="text-align: left"><a href="indexx.php"style = "Text-decoration: none; color: white;"> <span style="font-size: 14px;">&nbsp;Home Page </span> </a>
                               
                            <li style="text-align: left"><a href="aboutus.php"style = "Text-decoration: none; color: white;"> <span style="font-size: 14px;">&nbsp;About us<br>   </span> </a>
                                
                             <li style="text-align: left"><a href="Terms and Condition.php" style = "Text-decoration: none; color: white;"> <span style="font-size: 14px;"> &nbsp;Terms & Condition </span> </a>
                           </li>
                               
                            </ul>
                        </div>

  
                    </div>
            <div class="flex container">
                    <div class="footer-payement">
                        <div class="payment-method">
                            <h3><font color="red">We <span><font color="white"> Accept:</font></span></font> </h3>
                            <img src="images/Payments/payment-method.png" alt="Payment Method" />
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Java Script -->
    <script>
        $(function () {
            let headerElem = $('header');
            let logo = $('#logo');
            let navMenu = $('#nav-menu');
            let navToggle = $('#nav-toggle');
            
            navToggle.on('click', () => {
               navMenu.css('right', '0');
           });
            $('#close-flyout').on('click', () => {
                navMenu.css('right', '-100%');
           });
           $(document).on('click', (e) => {
               let target = $(e.target);
               if (!(target.closest('#nav-toggle').length > 0 || target.closest('#nav-menu').length > 0)) {
                   navMenu.css('right', '-100%');
               }
           });

           $('#properties-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                prevArrow: '<a href="#" class="slick-arrow slick-prev">previous</a>',
                nextArrow: '<a href="#" class="slick-arrow slick-next">next</a>',
                responsive: [
                    {
                        breakpoint: 1100,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 530,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                        }
                    }
                ]
           });
           $(document).scroll(() => {
               let scrollTop = $(document).scrollTop();

               if (scrollTop > 0) {
                   navMenu.addClass('is-sticky');
                   logo.css('color', '#000');
                   headerElem.css('background', '#fff');
                   navToggle.css('border-color', '#000');
                   navToggle.find('.strip').css('background-color', '#000');
               } else {
                   navMenu.removeClass('is-sticky');
                   logo.css('color', '#fff');
                   headerElem.css('background', 'transparent');
                   navToggle.css('bordre-color', '#fff');
                   navToggle.find('.strip').css('background-color', '#fff');
               }

               headerElem.css(scrollTop >= 200 ? {'padding': '0.5rem', 'box-shadow': '0 -4px 10px 1px #999'} : {'padding': '1rem 0', 'box-shadow': 'none' });
           });

           $(document).trigger('scroll');
        });

	function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}
	
	var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

</script>
</footer>
<!-- Footer -->
<footer>
    <div id="footer-subscribe">
        <div class="container">
            <h2>Latest News!</h2>
            <div class="flex">
                <div>
                    <h4>The Center of Excellence in Translation & Localization Organizes Webinar on the Impact of COVID-19 on Interpreting</h4>
                    <p><font color="white">With the advent of 2021, the Center of Excellence in Translation and Localization of the Faculty of Al Alsun & Mass Communication, organized its first webinar titled “Interpreting: Theory and Practice during COVID-19 and Beyond” on Saturday, January 2, 2021.
The faculty discussed the impact of the pandemic on interpreting as a profession and a field of research. The list of speakers included the accomplished freelance interpreter/translator Rehab Salah, the talented freelance interpreter/translator Aya Tohamy, and Dr. Sama Dawood, Associate Professor of Translation and Interpreting, the Faculty of Al Alsun & Mass Communication, MIU. Our distinguished alumnus, Ahmed Towman, Head of Translation and Interpreting Department at AFAQ Consultancy for Leadership Development, UAE, was also among the speakers of the webinar.
The session was moderated by Dr. Hanan Sharaf, Assistant Professor of Linguistics, and Ms. Maha Ashraf Assistant Lecturer, at the Faculty of Al Alsun & Mass Communication. The talks were followed by an interactive Q & A session where participants shared their views and raised some relevant questions. More than 100 attendees participated in the webinar including professors, interpreters, and students.                     </font></p>
                    <br>
                    <h4>“Introduction to Dell EMC2 Competition” Webinar</h4>
                    <p><font color="white">Faculty of Computer Science was pleased to host a webinar titled “Introduction to Dell EMC2 Competition” on Sunday, December 6th, 2020 for MIU Computer Science senior students. The webinar was conducted via Zoom by Eng. Youssef Issa, Senior Analyst – Project/Program Management at Dell Technologies.

Dell Technologies  organizes annual graduation project competitions for senior undergraduate students from universities in Turkey, Middle East and Africa. Such competitions are intended to spark the creativity of students for their graduation projects so that they play an active role in the Transformation of IT and get the opportunity to shine  and secure high ranks in  these international competitions.

It is worth mentioning that one of MIU CSC graduation projects ranked 5th in last year competition, and another 3 projects made it to top 25 among the 227 projects submitted from 14 countries across the entire region.                                   </font></p>
                </div>
                </div>
<div class="flex container">
					<div class="footer-about">
                        <h3><font color="orange">Contact <span><font color="white"> Us</font></span></font> </h3>
                         <ul>
                             <li style="text-align: left"><i class="fa fa-history" style="color:orange;"></i> <span style="font-size: 14px;"><font color="white">&nbsp;1996.</font>
                            </span> 
                             
                             <li style="text-align: left"><i class="fa fa-home" style="color:orange;"></i> <span style="font-size: 14px;"><font color="white">&nbsp;KM 28 Cairo – Ismailia Road Ahmed Orabbi District, Cairo–Egypt.</font>
                             </span>
                                 
                             <li style="text-align: left"><i class="fa fa-phone" style="color:orange;"></i> <span style="font-size: 14px;"><font color="white">&nbsp;19648. </font>
                             </span>
                                 
                             <li style="text-align: left"><i class="fa fa-envelope-o" style="color:orange;"></i> <span style="font-size: 14px;"><font color="white">&nbsp;miu@miuegypt.edu.eg.</font>
                            </span> 
                            </ul>
    </div>
        
<div class="footer-subscribe"> 
<h3><font color="orange">Follow <span><font color="white"> Us</font></span></font> </h3>
<ul>
<li><a href="https://www.facebook.com/MIUSS1"><span class="fab fa-facebook-f" style="color:MediumBlue;"></span></a></li>
<!-- <li><a href="#"><span class="fab fa-twitter"></span></a></li> -->
<li><a href="https://www.instagram.com/miusarcasmsociety/?hl=en"><span class="fab fa-instagram" style="color:MediumVioletRed;"></span></a></li>
<li><a href="https://twitter.com/miusociety"><span class="fab fa-twitter" style="color:DeepSkyBlue;"></span></a></li>
<li><a href="https://www.youtube.com/channel/UCaPpWt0BZ2dMTEoDIXl06bQ"><span class="fab fa-youtube" style="color:red;"></span></a></li>
</ul>
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
    </script>
	
<script>
	function openNav() {
  document.getElementById("mySidepanel").style.width = "250px";
}


function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}
</script>
	
<script>
	
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
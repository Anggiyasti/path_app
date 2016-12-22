<div id="page-content" class="header-clear-large">


    <div id="page-content-scroll"><!--Enables this element to be scrolled -->
                    <?php foreach ($mapel as $mapelitem): ?>
                    <form action="<?= base_url() ?>index.php/tesonline/mulai" method="post" class="hide">
        
                    <!-- <input type="hiden" value="<?= $mapelitem['tingpelID'] ?>" class="hide" name="id"> -->

                    <button type="submit" class="kirim<?= $mapelitem['id_bab'] ?>" 

                        data-todo='{"id":"<?= $mapelitem['id_bab'] ?>","namapelajaran":"<?= $mapelitem['id_mapel'] ?>"}'

                        >kirim</button>

                    </form>
                    <?php endforeach ?>

        <div class="content">
            <img data-original="images/1.png" alt="img" class="preload-image responsive-image full-bottom" src="images/empty.png" >
            <h2 class="center-text thiner half-bottom">Meet MiniBar</h2>
            <p class="center-boxed-text center-text half-bottom">
                Touch your page, interact with your elements, as they should be,
                fully interactive, fast loading and perfectly adjusted for your fingertips.
            </p>
        </div>

        <div class="decoration decoration-margins"></div>

        <div class="content no-bottom">
            <div class="one-half-responsive">
                <div class="column-home-center one-half">
                    <i class="ion-social-css3-outline color-blue-dark"></i>
                    <h5 class="thiner">CSS3 Built</h5>
                    <p>For extreme performance and lightweight design</p>
                </div>
                <div class="column-home-center one-half last-column">
                    <i class="ion-jet color-magenta-dark"></i>
                    <h5 class="thiner">Smooth</h5>
                    <p>For incredibly smooth transitions and animations</p>
                </div>         
            </div>
            <div class="one-half-responsive last-column">
                <div class="column-home-center one-half">
                    <i class="ion-gear-a color-night-dark"></i>
                    <h5 class="thiner">Clean Code</h5>
                    <p>Clean code makes it easier to customize and load</p>
                </div>
                <div class="column-home-center one-half last-column">
                    <i class="ion-help-buoy color-orange-dark"></i>
                    <h5 class="thiner">24/7 Support</h5>
                    <p>Just in case you can't handle it, we're here to help you!</p>
                </div>
            </div>
        </div>

        <div class="decoration decoration-margins"></div>

        <div class="one-half-responsive">
            <div class="content">
                <h1 class="thin center-text">Simple</h1>
                <p class="center-boxed-text center-text">
                    Code made simple, in a way designed to be readable, understandable, and beautifuly 
                    simple to just write yourself or copy and paste elements wherever your require them.
                </p>      
                <img data-original="images/2.png" alt="img" class="preload-image responsive-image" src="images/empty.png" >  
            </div>        
        </div>

        <div class="decoration decoration-margins hide-if-responsive"></div>
            <div class="one-half-responsive last-column">
            <div class="content">
                <h1 class="thin center-text">Elegancy</h1>
                <p class="center-boxed-text center-text">
                    Simple code is worthless without an elegant design to match it's simplicity. A
                    readable code is beautiful but it becomes elegant when the design matches to a pixel
                    perfect aligned custom built grid.
                </p>      
                <img data-original="images/3.png" alt="img" class="preload-image responsive-image" src="images/empty.png" >  
            </div>        
        </div>
        <div class="clear"></div>

        <div class="decoration decoration-margins"></div>

        <div class="content">
            <div class="column-home-left one-half-responsive">
                <i class="ion-ionic color-blue-dark"></i>
                <h5 class="thiner">Ion Icons</h5>
                <p>Loaded via CDN for instant delivery, fast and pixel perfect icons for your delight.</p>
            </div>
            <div class="column-home-left one-half-responsive last-column">
                <i class="ion-aperture color-red-dark"></i>
                <h5 class="thiner">2 Skins / 2 Colors</h5>
                <p>Two skins for your page templates and 2 two skins for the navigation for variation. </p>
            </div>              
            <div class="column-home-left one-half-responsive">
                <i class="ion-happy color-green-dark"></i>
                <h5 class="thiner">20.000 Happy Customers</h5>
                <p>That's something that speaks for itself. 20.000 Happy Customers love our work.</p>
            </div>
            <div class="column-home-left one-half-responsive last-column">
                <i class="ion-ios-paw color-orange-dark"></i>
                <h5 class="thiner">Elite Author</h5>
                <p>It's not just a badge for is, it's a lifestyle for our buyers and our products.</p>
            </div>  
        </div>

        <div class="decoration decoration-margins"></div>

        <div class="content">
            <h1 class="thin center-text">PhoneGap & Cordova</h1>
            <p class="center-boxed-text center-text">
                Converting our item to an application is as easy as using it for it's official purpose.
                The clean code and elegant design make the transition from Template to App a breeze.
            </p>      
            <img data-original="images/4.png" alt="img" class="preload-image responsive-image" src="images/empty.png" >  
            <em class="small-text center-text opacity-50 full-bottom">Conversion to an Application is up to you.</em>
        </div>

        <div class="decoration decoration-margins"></div>

        <div class="content">
            <h2 class="thin center-text">Literally, a tone of Features</h2>
            <p class="center-boxed-text center-text">
                There are hundreds of features for you to explore, so drop down the menu and start exploring the 
                pages and feautres, and remember, they are built to be extremly easy to use, customize and edit.
            </p>    
            <div class="container no-bottom">
                <div class="one-half-responsive">
                    <img data-original="images/demo_img.png" class="preload-image responsive-image full-bottom" alt="img" src="images/empty.png" >
                </div>
                <div class="decoration hide-if-responsive"></div>
                <div class="one-half-responsive last-column full-bottom">
                    <div class="one-half">
                        <ul class="font-icon-list no-bottom">
                            <li><i class="ion-person"></i>User List</li> 
                            <li><i class="ion-loop"></i>Activity Feed</li> 
                            <li><i class="ion-calendar"></i>Calendar Page</li> 
                            <li><i class="ion-image"></i>Coverpage</li> 
                            <li><i class="ion-information"></i>Typography</li> 
                            <li><i class="ion-ios-bolt"></i>jQuery</li> 
                            <li><i class="ion-android-home"></i>Landing Page</li> 
                            <li><i class="ion-android-close"></i>404 Page</li> 
                            <li><i class="ion-clock"></i>Soon Page</li> 
                            <li><i class="ion-navicon"></i>Timeline Page</li> 
                            <li><i class="ion-images"></i>Coverpage</li> 
                            <li><i class="ion-android-unlock"></i>Login Page</li> 
                        </ul>
                    </div>
                    <div class="one-half last-column">
                        <ul class="font-icon-list no-bottom">
                            <li><i class="ion-social-css3-outline"></i>CSS3 Buttons</li> 
                            <li><i class="ion-ios-chatbubble"></i>Chat Bubbles</li> 
                            <li><i class="ion-ios-chatbubble"></i>OS Detection</li> 
                            <li><i class="ion-iphone"></i>OS Toggles</li> 
                            <li><i class="ion-share"></i>Share Boxes</li> 
                            <li><i class="ion-connection-bars"></i>Charts & Pies</li> 
                            <li><i class="ion-alert"></i>Updates Page</li> 
                            <li><i class="ion-ios-videocam"></i>Videos Page</li> 
                            <li><i class="ion-ios-email"></i>Contact Page</li> 
                            <li><i class="ion-edit"></i>Blog Template</li> 
                            <li><i class="ion-ios-analytics"></i>Portfolio Page</li> 
                            <li><i class="ion-ios-camera"></i>Gallery Page</li> 
                        </ul>
                    </div> 
                </div>
            </div>
        </div>

        <div class="decoration decoration-margins"></div>

        <div class="heading-block bg-1">
            <h3 class="thin">Still not convinced?</h3>
            <p>
                Here are some of the amazing reviews our customers have left us along our road to this huge milestone. 
                It's a honor and a delight to share them with you!
            </p>
            <div class="overlay dark-overlay"></div>
        </div>

        <div class="decoration decoration-margins"></div>

        <div class="quote-slider full-bottom">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="review-3">
                        <i class="review-icon ion-quote"></i>
                        <p>
                        The usefulness of Enabled templates is unmatched. I personally find the value to be many, 
                        many times the purchase price. There is no question this is one of the top tier development
                        houses on Envato. I am, as they say, a fan.
                        </p>
                        <div class="review-stars">
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                        </div>
                        <a href="#">JasonKibby | ThemeForest</a>
                    </div>
                </div>                
                <div class="swiper-slide">
                    <div class="review-3">
                        <i class="review-icon ion-quote"></i>
                        <p>
                            Very impressed with Enables templates! The framework makes customizing under 
                            the hood possible without having to worry about breaking functionality.
                            Enabled support is very responsive. I highly recommend Enabled products.
                        </p>
                        <div class="review-stars">
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                        </div>
                        <a href="#">Brad Franklin | ThemeForest</a>
                    </div>
                </div>                
                <div class="swiper-slide">
                    <div class="review-3">
                        <i class="review-icon ion-quote"></i>
                        <p>
                            The template does everything I need, looks great and the designer is even 
                            helping me with something that needs additional customising.
                            Will look at your other templates now for inclusion in any future projects.
                        </p>
                        <div class="review-stars">
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                            <i class="ion-ios-star"></i>
                        </div>
                        <a href="#">Brad Franklin | ThemeForest</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="decoration decoration-margins"></div>

        <div class="heading-strip bg-3">
            <h4 class="center-text thin">Meet our Team</h4>
            <p class="center-text">Behind the magic, our staff.</p>
            <div class="overlay dark-overlay"></div>
        </div>

        <div class="decoration decoration-margins"></div>

        <div class="staff-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="column-center-image">
                        <img class="col-img-1" src="images/pictures/1t.jpg" alt="img">
                        <img class="col-img-2" src="images/pictures/1t.jpg" alt="img">
                        <img class="col-img-3" src="images/pictures/1t.jpg" alt="img">
                        <h3>John Doe</h3>
                        <h4>Software Specialist</h4>
                        <p class="half-bottom">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Nulla id commodo leo. Donec et efficitur mi. Interdum et 
                            malesuada fames ac ante ipsum primis in faucibus.
                        </p>
                        <div class="three-column-icons full-bottom">
                            <a href="#" class="icon icon-round icon-ghost icon-s facebook-color facebook-bg"><i class="ion-social-facebook"></i></a>
                            <a href="#" class="icon icon-round icon-ghost icon-s google-color google-bg"><i class="ion-social-googleplus"></i></a>
                            <a href="#" class="icon icon-round icon-ghost icon-s twitter-color twitter-bg"><i class="ion-social-twitter"></i></a>
                        </div>
                    </div>
                </div>                
                <div class="swiper-slide">
                    <div class="column-center-image">
                        <img class="col-img-1" src="images/pictures/1t.jpg" alt="img">
                        <img class="col-img-2" src="images/pictures/2t.jpg" alt="img">
                        <img class="col-img-3" src="images/pictures/1t.jpg" alt="img">
                        <h3>Alexander Dark</h3>
                        <h4>Human Resources</h4>
                        <p class="half-bottom">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Nulla id commodo leo. Donec et efficitur mi. Interdum et 
                            malesuada fames ac ante ipsum primis in faucibus.
                        </p>
                        <div class="two-column-icons full-bottom">
                            <a href="#" class="icon icon-round icon-ghost phone-color icon-s phone-bg"><i class="ion-ios-telephone"></i></a>
                            <a href="#" class="icon icon-round icon-ghost mail-color icon-s mail-bg"><i class="ion-ios-email"></i></a>
                        </div>
                    </div>
                </div>                
                <div class="swiper-slide">
                    <div class="column-center-image">
                        <img class="col-img-1" src="images/pictures/1t.jpg" alt="img">
                        <img class="col-img-2" src="images/pictures/3t.jpg" alt="img">
                        <img class="col-img-3" src="images/pictures/1t.jpg" alt="img">
                        <h3>Victor Hidden</h3>
                        <h4>Support Manager</h4>
                        <p class="half-bottom">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Nulla id commodo leo. Donec et efficitur mi. Interdum et 
                            malesuada fames ac ante ipsum primis in faucibus.
                        </p>
                        <div class="three-column-icons full-bottom">
                            <a href="#" class="icon icon-round icon-ghost icon-s phone-color icon-s phone-bg"><i class="ion-ios-telephone"></i></a>
                            <a href="#" class="icon icon-round icon-ghost icon-s mail-color mail-bg"><i class="ion-ios-email"></i></a>
                            <a href="#" class="icon icon-round icon-ghost icon-s phone-color phone-bg"><i class="ion-ios-chatbubble"></i></a>
                        </div>
                    </div>
                </div>                
                <div class="swiper-slide">
                    <div class="column-center-image">
                        <img class="col-img-1" src="images/pictures/1t.jpg" alt="img">
                        <img class="col-img-2" src="images/pictures/4t.jpg" alt="img">
                        <img class="col-img-3" src="images/pictures/1t.jpg" alt="img">
                        <h3>Jack Marker</h3>
                        <h4>Lead Developer</h4>
                        <p class="half-bottom">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Nulla id commodo leo. Donec et efficitur mi. Interdum et 
                            malesuada fames ac ante ipsum primis in faucibus.
                        </p>
                        <div class="three-column-icons full-bottom">
                            <a href="#" class="icon icon-round icon-ghost linkedin-color icon-s linkedin-bg"><i class="ion-social-linkedin"></i></a>
                            <a href="#" class="icon icon-round icon-ghost dribbble-color icon-s dribbble-bg"><i class="ion-social-dribbble-outline"></i></a>
                            <a href="#" class="icon icon-round icon-ghost phone-color icon-s phone-bg"><i class="ion-ios-telephone"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="decoration decoration-margins"></div>

        <div class="content-fullscreen badge-store">
            <h4>Featured Products</h4>
            <em>In an Awesome Coverflow Slider</em>
            <div class="coverflow-thumbnails full-top half-bottom">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background-image:url(images/pictures/1t.jpg)"></div>
                    <div class="swiper-slide" style="background-image:url(images/pictures/2t.jpg)"></div>
                    <div class="swiper-slide" style="background-image:url(images/pictures/3t.jpg)"></div>
                    <div class="swiper-slide" style="background-image:url(images/pictures/4t.jpg)"></div>
                    <div class="swiper-slide" style="background-image:url(images/pictures/5t.jpg)"></div>
                </div>
            </div>
            <p class="full-bottom">
                It’s official, new operating systems and mobile devices now 
                all support full CSS3 Support. So most of the effects that 
                needed jQuery we can now accomplish using CSS3 Transitions. 
                Faster, smoother, better, and much lighter CPU’s.
            </p>
            <a href="#" class="button button-green button-center button-xs">Read More</a>
        </div>

        <div class="decoration decoration-margins"></div>

        <div class="content">
            <h4 class="center-text half-bottom">There's <span class="color-red-dark">so much more</span> to see!</h4>
            <p class="center-text center-boxed-text">
                Open the navigation and check all the pages we have to offer, we're 
                packing almost 100 pages filled with incredibly awesome, stable, 
                perfromance enhanced, instant loading pages just for you!
            </p>
            <a href="#" class="button button-blue button-center button-s">Let's see more!</a>
        </div>

        <div class="footer footer-dark">
            <a href="index.html" class="footer-logo scale-hover"></a>
            <p>
                Simplicity and complexity packed into a beautiful, 
                feature filled, powerful, gorgeous mobile template.
            </p>
            <div class="footer-socials">
                <a href="#" class="icon icon-round icon-ghost icon-xs facebook-bg"><i class="ion-social-facebook"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs twitter-bg"><i class="ion-social-twitter"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs google-bg"><i class="ion-social-googleplus"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs phone-bg"><i class="ion-ios-telephone"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs show-share-bottom border-magenta-dark"><i class="ion-android-share"></i></a>
                <a href="#" class="icon icon-round icon-ghost icon-xs back-to-top border-blue-light"><i class="ion-arrow-up-b"></i></a>
            </div>
            <div class="decoration"></div>
            <p class="copyright-text">Copyright <span id="copyright-year"></span>. All Rights Reserved.</p>
        </div>
    </div>   
</div>
    
<div class="share-bottom share-dark">
    <h3>Share Page</h3>
    <div class="share-socials-bottom">
        <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.themeforest.net/">
            <i class="ion-social-facebook-outline icon-ghost facebook-bg"></i>
            Facebook
        </a>
        <a href="https://twitter.com/home?status=Check%20out%20ThemeForest%20http://www.themeforest.net">
            <i class="ion-social-twitter-outline twitter-bg"></i>
            Twitter
        </a>
        <a href="https://plus.google.com/share?url=http://www.themeforest.net">
            <i class="ion-social-googleplus-outline icon-ghost google-bg"></i>
            Google
        </a>
        <a href="https://pinterest.com/pin/create/button/?url=http://www.themeforest.net/&media=https://0.s3.envato.com/files/63790821/profile-image.jpg&description=Themes%20and%20Templates">
            <i class="ion-social-pinterest-outline icon-ghost pinterest-bg"></i>
            Pinterest
        </a>
        <a href="sms:">
            <i class="ion-ios-chatboxes-outline icon-ghost sms-bg"></i>
            Text
        </a>
        <a href="mailto:?&subject=Check this page out!&body=http://www.themeforest.net">
            <i class="ion-ios-email-outline icon-ghost mail-bg"></i>
            Email
        </a>
        <div class="clear"></div>
    </div>
</div>
<a href="#" class="back-to-top-badge"><i class="ion-android-arrow-dropup"></i>Back to Top</a>

</div>
</body>
<script type="text/javascript">



    $('#babSelect').change(function () {

        load_sub($('#babSelect').val());

    });



    function submit(id) {

        //passing data to modals.

        var tingPelID = $('.kirim' + id).data('todo').id;

        //untuk ditampilkan di modal

        var namaPelajaran = $('.kirim' + id).data('todo').namapelajaran;

        $('#myModal').modal('show');

        $('.modal-title').text('Mulai Latihan untuk pelajaran ' + namaPelajaran);

        load_bab(tingPelID);

    }



    //fungsi untuk ngeload bab berdasarkan tingkat-pelajaran id

    function load_bab(tingPel) {

        // console.log('masduk')

        $('#babSelect').find('option').remove();

        $('#babSelect').append('<option value=1>Bab Pelajaran</option>');

        var babID;

        $.ajax({

            type: "POST",

            url: "<?php echo base_url() ?>index.php/matapelajaran/get_bab_by_tingpel_id/" + tingPel,

            success: function (data) {



                $.each(data, function (i, data) {

                    $('#babSelect').append("<option value='" + data.id + "'>" + data.judulBab + "</option>");

                    babid = data.id;



                });

            }



        });

    }



    function load_sub(babID) {

        $.ajax({

            type: "POST",

            data: babID.bab_id,

            url: "<?php echo base_url() ?>index.php/videoback/getSubbab/" + babID,

            success: function (data) {

                $('#subSelect').html('<option value=1>-- Pilih Sub Bab Pelajaran  --</option>');

                // console.log(data);

                $.each(data, function (i, data) {

                    $('#subSelect').append("<option value='" + data.id + "'>" + data.judulSubBab + "</option>");

                });

            }



        });

    }



    function mulai(test) {

        var sub_bab_id = $('#subSelect').val();

        var kesulitan = $("select[name=kesulitan]").val();

        var jumlahsoal = $("select[name=jumlahsoal]").val();

        var subabid = $("select[name=subab]").val();



        var data = {

            kesulitan: kesulitan,

            jumlahsoal: jumlahsoal,

            subab: subabid

        };



        if (data.kesulitan == 0 || data.jumlahsoal == 0 || data.subab == 0) {



            $('#info').show();

        }else{

            $('.mulai-btn').text('saving...'); //change button text

            $('.mulai-btn').attr('disabled', true); //set button disable 

            url = "<?php echo base_url() ?>index.php/latihan/tambah_latihan_ajax";

            $.ajax({

                url: url,

                type: "POST",

                dataType: 'text',

                data: data,

                success: function (data, respone)

                {

                    $('#myModal').modal('hide');

                $('.mulai-btn').text('save'); //change button text

                $('.mulai-btn').attr('disabled', false); //set button enable 

                $('#formlatihan')[0].reset(); // reset form on modals

                if (test == 'mulai') {

                    window.location.href = base_url + "index.php/tesonline/mulaitest";

                } else {

                    window.location.href = base_url + "index.php/tesonline/daftarlatihan";

                }

            },

            error: function (respone, jqXHR, textStatus, errorThrown)

            {

                alert('Error adding / update data');

            }

        });

        }

    }



    function hideme(){

        $('#info').hide();

    }

    // $('.close-button').click(function(){

    //     $('#info').hide();

    // });



    $('.mulai-btn').click(function () {

        mulai('mulai');

        // window.location.href = base_url + "index.php/tesonline/mulaitest";

    });



    $('.latihan-nnti-btn').click(function () {

        mulai('nanti');

        // window.location.href = base_url + "index.php/tesonline/daftarlatihan";

    });







</script>
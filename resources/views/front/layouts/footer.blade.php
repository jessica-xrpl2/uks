<!-- footer -->
<footer>
        <div class="copyright">
            <div class="container">
                <p></p>
            </div>
        </div>
</footer>
<!-- end footer -->

</div>
</div>
<div class="overlay"></div>
<!-- Javascript files-->
<script src="{{asset('spicyo/js/jquery.min.js')}}"></script>
<script src="{{asset('spicyo/js/popper.min.js')}}"></script>
<script src="{{asset('spicyo/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('spicyo/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('spicyo/js/custom.js')}}"></script>
<script src="{{asset('spicyo/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<script src="{{asset('spicyo/js/jquery-3.0.0.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function() {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>

<style>
    #owl-demo .item {
        margin: 3px;
    }

    #owl-demo .item img {
        display: block;
        width: 100%;
        height: auto;
    }
</style>


<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            margin: 10,
            nav: true,
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 5
                }
            }
        })
    })
</script>

</body>

</html>
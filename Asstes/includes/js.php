<script src="js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="cart_components/jquery/dist/jquery.min.js"></script>
<script src="cart_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript">
    // $(document).ready(function (){
    //     $('#search').click(function (){
    //         $('.menu-item').toggleClass('hide-item')
    //         $('.search').toggleClass('show-search-box')
    //         $('.close').toggleClass('cancel')
    //         $('#search').hide()
    //     })
    //     $('.close').click(function (){
    //         $('.menu-item').removeClass('hide-item')
    //         $('.search').removeClass('show-search-box')
    //         $('.close').removeClass('cancel')
    //         $('#search').show()
    //     })
    // })
    function account() {
        document.getElementById("show-link").classList.toggle("show");
    }
    window.onclick = function (event){
        if (!event.target.matches('.user')){
            var dropdowns = document.getElementsByClassName("content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmation").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }

    $('li').on('click', function () {
        $(this).addClass('current').siblings().removeClass('current');
    });

    $("#link1").on('click', function() {
        $("#div1").show();
        $("#div2,#div3,#div4").hide();
    });
    $("#link2").on('click', function() {
        $("#div2").show();
        $("#div1,#div3,#div4").hide();
    });
    $("#link3").on('click', function() {
        $("#div3").show();
        $("#div1,#div2,#div4").hide();
    });
    $("#link4").on('click', function() {
        $("#div3").show();
        $("#div1,#div2,#div4").hide();
    });
    $("#link5").on('click', function() {
        $("#div2").show();
        $("#div1,#div3,#div4").hide();
    });
    $("#link6").on('click', function() {
        $("#div4").show();
        $("#div1,#div2,#div3").hide();
    });

    $(document).ready(function(){
        $("#click").click(function(){
            $("#show-pass").toggleClass("show-pass");
        });
    });

    $(document).ready(function(){
        $(".faq_plus").click(function(){
            $(".faq_minus").style.display = "block";
        });
    });

    $("#li1").on('click', function() {
        $("#div1").show();
        $("#div2,#div3,#div4,#div5").hide();
    });
    $("#li2").on('click', function() {
        $("#div2").show();
        $("#div1,#div3,#div4,#div5").hide();
    });
    $("#li3").on('click', function() {
        $("#div3").show();
        $("#div1,#div2,#div4,#div5").hide();
    });
    $("#li4").on('click', function() {
        $("#div4").show();
        $("#div1,#div2,#div3,#div5").hide();
    });
    $("#li5").on('click', function() {
        $("#div5").show();
        $("#div1,#div2,#div3,#div4").hide();
    });

    var coll = document.getElementsByClassName("accordion-head");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }

    function menuBar() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

    function openSearch(){
        document.getElementById("search").style.width = "100%";
        document.getElementById("info").style.display = "none";
        document.getElementById("search_icon").style.display = "block";
    }

    function closeSearch(){
        document.getElementById("search").style.width = "0%";
        document.getElementById("info").style.display = "block";
        document.getElementById("search_icon").style.display = "none";
    }

</script>

<!--Cart Items Functionality-->

<script>
    $(function (){
        getCart();

        $('#productForm').submit(function (e){
            e.preventDefault();
            var product = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: 'item_add.php',
                data: product,
                dataType: 'json',
                success: function (response){
                    $('#callout').show();
                    $('.message').html(response.message);
                    if (response.error){
                        $('#callout').removeClass('callout-success').addClass('callout-danger');
                    }else {
                        $('#callout').removeClass('callout-danger').addClass('callout-success');
                        getCart();
                    }
                }
            });
        });

        $(document).on('click', '.closed', function (){
            $('#callout').hide();
        });

    });

    function getCart(){
        $.ajax({
            type: 'POST',
            url: 'item_fetch.php',
            dataType: 'json',
            success: function (response){
                $('#cart_count').html(response.count);
            }
        });
    }

</script>




</body>
</html>
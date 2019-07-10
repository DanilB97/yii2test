<div class="test" style="width: 50px; height: 50px; background-color: black;"></div>

<script>
    $(document).ready(function () {
        $('.test').click(function () {
            $('.test').animate({opacity: "0.4", top: "+=160", height: "20", width: "20"}, "slow")
                .animate({opacity: "1", left: "0", height: "100", width: "100"}, "slow")
                .animate({top: "0"}, "fast")
        })
    })

</script>
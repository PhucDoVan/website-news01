$(function() {
    if($('.js-password').length) {
        $(".js-togglePassword").click(function () {
            // Change Icon
            $(this).toggleClass("-visible");

            // 入力フォームの取得
            let input = $('.js-password');
            // Change Type password
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }
});

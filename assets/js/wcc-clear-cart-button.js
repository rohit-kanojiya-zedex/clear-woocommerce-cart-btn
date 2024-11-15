jQuery(document).ready(function($) {
    $(document).on('click', '#wcc-clear-cart-btn', function() {
        $('.wcc_btn_loader').show();
        $.post(wccClearItemsAjax.ajaxurl,{action: 'wccClearCart'},
            function(response) {
                if (response.success) {
                    $('#wcc-clear-cart-btn').hide();
                     window.location.reload();
                    $('.wcc_btn_loader').hide();
                } else {
                    alert(response.data.message);
                }
        });
    });
});

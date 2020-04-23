Stripe.setPublishableKey('pk_test_QJsKlIjd1e2pjP0IGsgGElmT00fRWCebQI');
var $form = $('#checkout-form');

$form.submit(function (event) {
    $('charge-error').addClass('hidden');
    $form.find('button').prop('disabled', true);

    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expire-year').val(),
        name: $('#card-name').val(),
    },  stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status, response) {
    if(response.error){
        $('#charge_error').removeClass('hidden');
        $('#charge_error').text(response.error.message);
        $form.find('button').prop('disabled', false);
    } else {
        var token = response.id;
        console.log(token);
        $form.append($('<input type="hidden" name="stripeToken">').val(token));
        $form.get(0).submit();
    }
}


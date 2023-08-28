
<?php
echo '<h3 style="text-align:center; padding:30px 0 20px">Manual Request</h3>';
echo do_shortcode('[contact-form-7 id="b716287 req-705" title="Manual Request"]');



?>

<script>



var currentURL = window.location.href;

        // Define the URL pattern
        var targetURLPattern = 'https://www.gtltcars.com/verify-auction-sheet/?chassis';

        // Check if the current URL matches the target URL pattern
        if (currentURL.startsWith(targetURLPattern)) {
            var elementToHide = document.getElementById('stripe_pay');
            var elementToHide1 = document.getElementById('api-content');
            var elementToHide2 = document.getElementById('mamual-req-content');
            var footerreq = document.getElementById('footer');
            if (elementToHide) {
                elementToHide.style.display = 'none';
            }
            if (elementToHide1) {
                elementToHide1.style.display = 'none';
            }

            if (elementToHide2) {
                elementToHide2.style.display = 'inline-block';
            }

            if (footerreq) {
                footerreq.style.display = 'none';
            }
        };
	
	
        document.addEventListener('wpcf7mailsent', function(event) {
  var radioValue = document.querySelector('input[name="radio-362"]:checked').value;
  var paymentLink='';

  if (radioValue === 'USS:3350 Taka') {
      paymentLink = 'https://buy.stripe.com/test_cN2cO54JAbFOe7C147';
  } else if (radioValue === 'One Price/Delar Stock:5250 Taka') {
      paymentLink = 'https://buy.stripe.com/test_cN2cO54JAbFOe7C147';
  }

  if (paymentLink) {
      window.location.href = paymentLink;
  }
}, false);
	
	


</script>

</div>

<?php get_footer();?>
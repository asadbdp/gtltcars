<?php
/**
 * Template Name: stripe success
 */
session_start();
get_header();


// Retrieve the stored resUrl from the session
$resUrl = isset($_SESSION['resUrl']) ? $_SESSION['resUrl'] : '';


?>
<div class="container">
    <section style="margin-top: 20px;">
        <h3>
            Your payment is successful. You will automatically redirect in 5 seconds.
        </h3>
        <h2 class="text-danger">Don't Reload</h2>
        <p>
            <a id="redirect_path">click here</a>
        </p>
        
    </section>
</div>



<script>
    var cachedUrl = localStorage.getItem("res_url");
    // Redirect functionvar 
    var redirect_path = document.getElementById("redirect_path");

    redirect_path.setAttribute("href", cachedUrl);
    function redirectToResUrl() {

        if (cachedUrl) {
            // Redirect to resUrl
            localStorage.removeItem("res_url");
            window.location.href = cachedUrl;
        }
    }

    // Call the redirect function after a 5-second delay
    setTimeout(redirectToResUrl, 5000); // 5000 milliseconds = 5 seconds
</script>

<?php
get_footer();
?>

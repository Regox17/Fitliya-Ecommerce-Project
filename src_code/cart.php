<?php
include "header.php";
?>


<section class="section">
<div class="container-fluid">	
    <div id="cart_checkout">
        
    </div>
</div>
</section>	
<?php

include "footer.php";
?>
<script>

function incrementValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if (value < 10) {
        value++;
        document.getElementById('number').value = value;
        updateSubtotal(<?php echo $product_price; ?> + value); // Assuming $product_price is a PHP variable
    }
}

function decrementValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) { // Check if value is greater than 1
        value--;
        document.getElementById('number').value = value;
    }
}

</script>
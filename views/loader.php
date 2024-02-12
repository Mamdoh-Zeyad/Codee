<?php
    require_once('../includes/partials/header.php');
?>
<div class="loader-container">
    <img src="../assets/img/codee-logo - Copy.png" alt="Logo" class="loader-logo">
</div>
<script>
    document.querySelector('.loader-container').addEventListener('animationend', function() {
        this.remove();
    });
</script>
<!--Request Footer-->
<?php
    require_once('../includes/partials/footer.php');
?>
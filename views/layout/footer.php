</div>
<!-- alert -->
<?php if(isset($_SESSION['alert'])) { ?>
<div class="grid items-center justify-center gap-6 m-4 p-4 max-w-580-px max-h-860-px z-50 fixed right-0 top-0 rounded-md cursor-pointer <?php if ($_SESSION['alert']['type'] === ALERT_SUCCESS) {
    echo 'bg-emerald-400';
} else {
    echo 'bg-red-500';
} ?>" id="alert">
    <?php if ($_SESSION['alert']['type'] === ALERT_ERROR) { ?>
        <i class="fa-solid fa-circle-exclamation text-5xl text-red-500 text-center"></i>
    <?php } else if ($_SESSION['alert']['type'] === ALERT_SUCCESS) { ?>
        <i class="fa-solid fa-circle-check text-5xl text-emerald-500 text-center"></i>
    <?php } ?>
    <div class="grid items-center text-center mx-auto p-3">
        <?php if ($_SESSION['alert']['type'] === ALERT_SUCCESS) { ?>
            <h2 class="font-semibold text-xl">موفق</h2>
        <?php } else if($_SESSION['alert']['type'] === ALERT_ERROR) { ?>
            <h2 class="font-semibold text-xl">خطا</h2>
        <?php } ?>
        <p class="text-lg">
            <?php echo $_SESSION['alert']['message'] ?>
        </p>
    </div>
</div>
<?php } $_SESSION['alert'] = null ?>

<!-- alert functionality -->
<script>
    const alert = document.querySelector("#alert");
    const alertId = setTimeout(() => {
        removeAlert(alert)
    }, 5000);

    const removeAlert = (e) => {
        clearTimeout(alertId);
        e.remove();
    };

    alert.addEventListener("click", () => removeAlert(alert));
</script>

<script src="<?php echo URL ?>public/js/popper.js"></script>
<script>
    /* Make dynamic date appear */
    (function () {
        if (document.getElementById("get-current-year")) {
            document.getElementById("get-current-year").innerHTML =
                new Date().getFullYear();
        }
    })();
    /* Function for opning navbar on mobile */
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }
    /* Function for dropdowns */
    function openDropdown(event, dropdownID) {
        let element = event.target;
        while (element.nodeName !== "A") {
            element = element.parentNode;
        }
        Popper.createPopper(element, document.getElementById(dropdownID), {
            placement: "bottom-start"
        });
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
    }
</script>


<!-- ALERT LAYOUT -->
<?php if( isset($data['type']) ){
    ?>
<div class="grid items-center justify-center gap-6 m-4 p-4 max-w-580-px max-h-860-px z-50 fixed right-0 top-0 rounded-md cursor-pointer <?php if ($data['type'] === ALERT_SUCCESS) {
    echo 'bg-emerald-400';
} else {
    echo 'bg-red-500';
} ?>" id="alert">
    <?php if ($data['type'] === ALERT_ERROR) { ?>
        <i class="fa-solid fa-circle-exclamation text-5xl text-red-500"></i>
    <?php } else if ($data['type'] === ALERT_SUCCESS) { ?>
            <i class="fa-solid fa-circle-check text-5xl text-emerald-500"></i>
    <?php } ?>
    <div class="grid items-center text-center mx-auto p-3">
        <h2 class="font-semibold text-xl">
            <?php echo $data['title'] ?>
        </h2>
        <p class="text-lg">
            <?php echo $data['message'] ?>
        </p>
    </div>
</div>


<script>
    const alert = document.querySelector("#alert");
    const alertId = setTimeout(() => {
        removeAlert(alert)
    }, 5000);

    const removeAlert = (e) => {
        clearTimeout(alertId);
        e.remove();
    };

    alert.addEventListener("click", () => removeAlert(alert));
</script>

<?php } ?>
<!-- END of ALERT LAYOUT -->

<!-- START of timer plugin -->
<link rel="stylesheet" href="<?= URL ?>public/plugin/timer/css/jquery.countdown.css">

<script src="<?= URL ?>public/plugin/timer/js/jquery.plugin.min.js"></script>
<script src="<?= URL ?>public/plugin/timer/js/jquery.countdown.js"></script>

<!-- END of timer plugin -->

<!-- COPYRIGHT -->

<!-- <footer class="copyright">&copy; All Right reserved for RezaDehghani and AmirHoseeingZareian Under MIT Licence
</footer> -->

</body>

</html>
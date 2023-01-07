<div class="flex items-center justify-center gap-6 m-4 p-8 max-w-580-px max-h-860-px z-50 fixed right-0 top-0 bg-lightBlue-200 rounded-md"
    id="alert">
    <?php if ($data['alert']['type'] === 'ERROR') { ?>
        <i class="fa-solid fa-circle-exclamation text-5xl text-red-500"></i>
        <?php } else if ($data['alert']['type'] === 'SUCCESS') { ?>
        <i class="fa-solid fa-circle-check text-5xl text-emerald-500"></i>
        <?php } ?>
    <div class="grid items-center text-center">
        <h2 class="font-semibold text-xl">
            <?php echo $data['alert']['title'] ?>
        </h2>
        <p class="text-lg">
            <?php echo $data['alert']['message'] ?>
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
<div class="flex justify-end m-4">
    <a href="<?php echo URL.'dashboard/index'; ?>" class="bg-indigo-500 px-4 py-2 rounded-lg text-white">بازگشت به صفحه اصلی</a>
</div>

<div class="ease-linear transition-all duration-150 grid items-center justify-center p-4">
    <p class="text-base font-bold">توکن شما: </p>
    <div
        class="bg-emerald-500 text-white text-base px-3 py-2 rounded shadow hover:shadow-lg my-4 flex items-center justify-center">
        <span>
            <?php echo $data['token']; ?>
        </span>
        <div class="border border-blueGray-100 rounded mr-3 cursor-pointer p-2 flex items-center justify-center gap-6"
            id="clipboard_icon">
            کپی
            <i class="fa-solid fa-copy"></i>
        </div>
    </div>
    <p class="text-sm text-center text-orange-500">این توکن را در اختیار دانشجویان خود قرار دهید تا بتوانند به شما
        متصل شوند</p>
</div>

<table class="items-center w-full bg-transparent border-collapse mt-4">
    <thead>
        <tr class="text-center">
            <th
                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                نام کاربر</th>
            <th
                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                ایمیل</th>
            <th
                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                وضعیت</th>
            <th
                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                عملیات</th>
        </tr>
    </thead>
    <tbody class="">
        <?php foreach ($data['students_info'] as $student) { ?>
            <tr>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                    <?php echo $student['name']; ?></td>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                    <?php echo $student['email']; ?>
                </td>
                <?php if ($student['status'] === 0) { ?>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-gray-500">
                        غیرفعال</td>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4">
                        <form action="<?php echo URL . 'dashboard/enable_student/' . $student['id']; ?>" method="POST">
                            <button type="submit"
                                class="bg-lightBlue-500 text-white text-sm px-2 py-1 rounded cursor-pointer">فعال
                                سازی</button>
                        </form>
                    </td>
                <?php } else { ?>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-emerald-500">
                        فعال</td>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 cursor-pointer">
                        <form action="" method="POST">
                            <button type="submit"
                                class="bg-red-500 text-white text-sm px-2 py-1 rounded cursor-pointer">حذف</button>
                        </form>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>



<script>
    const clipboard_icon = document.querySelector("#clipboard_icon");

    clipboard_icon.addEventListener("click", (e) => {
        navigator.clipboard.writeText(e.target.previousElementSibling.innerText);
    })
</script>
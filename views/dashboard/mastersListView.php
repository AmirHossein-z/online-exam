<form method="POST" action="<?php echo URL . 'dashboard/add_master/' . $data['id']; ?>"
    class="flex justify-end items-center p-5 gap-6">
    <div class="flex items-center">
        <label class="block text-blueGray-600 text-base font-bold ml-2" htmlFor="token">توکن: </label>
        <input type="text" name="token" id="token"
            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150 w-full"
            placeholder="توکن را اینجا وارد کنید" autocomplete="on" />
    </div>
    <button
        class="bg-emerald-500 text-white active:bg-blueGray-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150"
        type="submit">
        اضافه کردن استاد جدید
    </button>
</form>

<table class="items-center w-full bg-transparent border-collapse">
    <thead>
        <tr class="text-center">
            <th
                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                نام استاد</th>
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
    <tbody>
        <?php foreach ($data['masters_info'] as $master) { ?>
            <tr>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                    <?php echo $master['name'] ?></td>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                    <?php echo $master['email'] ?>
                </td>
                <?php if ($master['status'] === 0) { ?>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-gray-500">
                        هنوز فعال نشده
                        است</td>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 cursor-pointer">
                        <form action="" method="POST">
                            <button type="submit" class="bg-red-500 text-white text-sm px-2 py-1 rounded">حذف</button>
                        </form>
                    </td>
                <?php } else { ?>
                    <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-emerald-500">
                        فعال</td>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4">
                        <div class="flex items-center justify-center">
                            <form action="" method="POST">
                                <button type="submit"
                                    class="bg-lightBlue-500 text-white text-sm px-2 py-1 rounded cursor-pointer ml-3">لیست آزمون
                                    ها</button>
                            </form>
                            <form action="" method="POST">
                                <button type="submit"
                                    class="bg-red-500 text-white text-sm px-2 py-1 rounded cursor-pointer">حذف</button>
                            </form>
                        </div>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
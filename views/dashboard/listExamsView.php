<div>
    <h1 class="block text-blueGray-800 text-2xl text-center my-4 transition-all duration-300 cursor-pointer">لیست آزمون
        ها</h1>
</div>
<table class="items-center w-full bg-transparent border-collapse">
    <thead>
        <tr class="text-center">
            <th
                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                عنوان</th>
            <th
                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                توضیحات</th>
            <th
                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                مدت زمان آزمون</th>
            <th
                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                نمره کل آزمون</th>
                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                    نمره شما</th>
            <th
                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                استاد</th>
            <th
                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                وضعیت</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['exams_info'] as $exam) { ?>
            <tr>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                    <?php echo $exam['title'] ?></td>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                    <?php echo $exam['description'] ?>
                </td>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                    <?php echo $exam['duration'] ?> دقیقه
                </td>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                    <?php echo $exam['final_grade'] ?>
                </td>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                    <?php
                    if ($exam['show_grade'] === 1)
                        echo $data['student_grade'] . ' از ' . $exam['final_grade'];
                    else
                        echo 'مخفی';    
                    ?>
                    
                </td>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                    <?php echo $exam['master_name'] ?>
                </td>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 flex items-center justify-center">
                    <a href="<?php echo URL . 'dashboard/participate/' . $exam['id']; ?>"
                        class="bg-lightBlue-500 text-white text-sm px-2 py-1 rounded ml-3 cursor-pointer">
                        شرکت در آزمون
                    </a>
                    <span class="bg-blueGray-600 text-sm px-2 py-1 rounded ml-3 text-blueGray-100">
                        تمام شده
                    </span>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
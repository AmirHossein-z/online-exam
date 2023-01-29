<?php
// var_dump($data);
// exit;
?>
<div class="flex-auto px-4 lg:px-10 py-10 pt-0 w-full bg-blueGray-800">
    <form action="<?php
    if (isset($data[0]['exam_id']))
        echo URL . 'dashboard/exam_update';
    else
    echo URL . 'dashboard/exam/store' ?>" method="POST"
        class="max-w-xl grid mx-auto bg-blueGray-200 p-5">
        <div class="relative w-full my-4">
            <input type="hidden" name="exam_id" value="<?php if(isset($data['exam_id'])) $exam_id = ++$data[3]['exam_id']; echo $exam_id ?>">
            <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="title">
                عنوان آزمون:
            </label>
            <input name="title" id="title" required
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                placeholder="عنوان آزمون را وارد کنید" value="<?php if(isset($data[0]['title'])) echo $data[0]['title']; ?>">
        </div>
        <div class="relative w-full my-4">
            <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="description">
                توضیحات آزمون:
            </label>
            <textarea name="description" id="description" cols="30" rows="5" required
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                placeholder="توضیحات آزمون را وارد کنید"><?php if(isset($data[0]['description'])) echo $data[0]['description']; ?></textarea>
        </div>
        <div>
            <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="duration">
                مدت زمان آزمون (دقیقه)
            </label>
            <input type="number" name="duration" id="duration" min="1" value="<?php if(isset($data[0]['duration'])) echo $data[0]['duration']; ?>"
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
        </div>
        <div class="relative w-full my-4">
            <div>
                <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="final_grade">نمره کل آزمون:
                </label>
                <input type="text" name="final_grade" id="final_grade" required value="<?php if(isset($data[0]['final_grade'])) echo $data[0]['final_grade']; ?>"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
            </div>
        </div>
        <div>
            <label class="inline-flex items-center cursor-pointer"><input <?php if(isset($data[0]['show_grade'])) echo 'checked' ?>"
            type="checkbox" id="toggle_checkbox"
                    name="show_grade"
                    class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                    value="<?php if(isset($data[0]['show_grade'])) echo $data[0]['show_grade'] ?>" /><span
                    class="ml-2 text-sm font-semibold text-blueGray-600">نمایش نمره به دانشجویان در پایان
                    آزمون</span></label>
        </div>

        <link rel="stylesheet" href="<?php echo URL ?>public/plugin/pickdate/themes/classic.css">
                <!-- Add the stylings *after* the pickadate theme files -->
<link rel="stylesheet" href="<?php echo URL ?>public/plugin/pickdate/themes/rtl.css">

<div class="relative w-full my-4">
            <div>
                <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="final_grade"> ساعت آزمون
                </label>

            </div>
            <input required type="time" name="time_submit" value="<?php if(isset($data[0]['date'])) echo substr($data[0]['date'], 11, null); ?>" />

        </div>

        <div class="relative w-full my-4">
            <div>
                <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="final_grade">تاریخ آزمون
                </label>

            </div>
            <input required type="date" name="date_submit" value="<?php if(isset($data[0]['date'])) echo substr($data[0]['date'], 0, 10); ?>" />
        </div>



        <span class="text-red-500 text-sm font-bold text-center py-2 rounded outline-none mb-1 w-full ease-linear transition-all duration-150">لطفا پس از افزودن آزمون سوالات را به آزمون اضافه نمایید.</span>

        <button
                class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                type="submit">
                افزودن آزمون
            </button>
        </div>
    </form>
</div>
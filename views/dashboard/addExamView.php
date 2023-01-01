<div class="flex-auto px-4 lg:px-10 py-10 pt-0 w-full bg-blueGray-800">
    <form action="<?php echo URL . 'dashboard/exam/store' ?>" method="post"
        class="max-w-xl grid mx-auto bg-blueGray-200 p-5">
        <div class="relative w-full my-4">
            <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="title">
                عنوان آزمون:
            </label>
            <input name="title" id="title" required
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                placeholder="عنوان آزمون را وارد کنید"></textarea>
        </div>
        <div class="relative w-full my-4">
            <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="description">
                توضیحات آزمون:
            </label>
            <textarea name="description" id="description" cols="30" rows="5" required
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                placeholder="توضیحات آزمون را وارد کنید"></textarea>
        </div>
        <div>
            <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="duration">
                مدت زمان آزمون (دقیقه)
            </label>
            <input type="number" name="duration" id="duration" min="1"
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
        </div>
        <div class="relative w-full my-4">
            <div>
                <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="final_grade">نمره کل آزمون:
                </label>
                <input type="text" name="final_grade" id="final_grade" required
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
            </div>
        </div>
        <div>
            <label class="inline-flex items-center cursor-pointer"><input type="checkbox" id="toggle_checkbox"
                    name="show_grade"
                    class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" /><span
                    class="ml-2 text-sm font-semibold text-blueGray-600">نمایش نمره به دانشجویان در پایان
                    آزمون</span></label>
        </div>
        <div>
            <select name="questions[]" multiple>
                <?php
                $questions = $data;
                foreach ($questions as $question) {
                    ?>
                    <option value="<?= $question['question_id']; ?>">
                        <?= $question['q_info'] ?>
                    </option>
                    <?php } ?>
            </select>
        </div>
        <div class="text-center mt-2">
            <button
                class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                type="submit">
                افزودن آزمون
            </button>
        </div>
    </form>
</div>
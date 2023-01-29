<?php $exam_id = explode('/', $_GET['url']);
?>
<div class="flex-auto px-4 lg:px-10 py-10 pt-0 w-full bg-blueGray-800">
    <form action="<?= URL . 'dashboard/exam_addQuestion/' . $exam_id[2] ?>" method="POST" class="max-w-xl grid mx-auto bg-blueGray-200 p-5">

    <div class="relative w-full my-4">
            <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="title">
                انتخاب سوالات :
            </label>
    <select name="questions[]" multiple>
                <?php
                foreach ($data as $question) {
                    ?>
                    <option value="<?= $question['question_id']; ?>">
                        <?= $question['q_info'] ?>
                    </option>
                    <?php } ?>
            </select>
    </div>

            <button class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                type="submit">
                افزودن سوال
            </button>
                </form>
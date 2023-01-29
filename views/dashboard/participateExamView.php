<?php if (count($data['questions_info']) > 0) { ?>
    <h2
        class="block text-blueGray-600 text-base text-center text-center my-4 transition-all duration-300 cursor-pointer p-4 max-w-4xl mx-auto">
        مدت زمان باقیمانده: <span class="">
            <?php echo $data['exam_duration'] ?>
        </span>
        <br>
        تعداد کل سوالات: <span class="">
            <?php echo count($data['questions_info']); ?>
        </span>
    </h2>
    <form class="max-w-4xl mx-auto" method="POST" action="<?php echo URL . 'dashboard/test_action' ?>">
    
    <input type="hidden" name="exam_id" value="<?= $data['exam_id']; ?>">    
    <div class="grid grid-cols-2 gap-6 p-2">
            <?php foreach ($data['questions_info'] as $question) { ?>
                <div class="grid items-center border border-blueGray-200 rounded p-4 shadow-md">
                    <div class="flex justify-between items-center my-2">
                        <h1 class="block text-blueGray-600 text-sm text-center transition-all duration-300 cursor-pointer">
                            سوال:
                            <span>
                                <?php echo $question['info']; ?>
                            </span>
                        </h1>
                        <p class="block text-orange-500 text-sm font-bold transition-all duration-300 cursor-pointer">
                            <span>
                                <?php echo $question['grade']; ?> نمره
                            </span>
                        </p>
                    </div>
                    <?php if ($question['type'] === 1) { ?>
                        <div class="grid items-center gap-6 my-2">
                            <?php foreach ($data['options_info'] as $option) { ?>
                                <?php if ($option['question_id'] === $question['id']) { ?>
                                    <div class="flex">
                                        <label class="inline-flex items-center cursor-pointer"><input type="radio" name="option_multi_answer[<?php echo intval($question['id']); ?>]" value="<?php echo intval($option['id']) ?>"
                                                class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150 border border-gray-300" /><span
                                                class="ml-2 text-sm font-semibold text-blueGray-600"><?php echo $option['info'] ?></span></label>
                                        <!-- <p class="block text-gray-900 text-sm transition-all duration-300 cursor-pointer">
                                        </p> -->
                                    </div>
                                    <?php } ?>
                                <?php } ?>
                        </div>
                        <?php } else if ($question['type'] === 0) { ?>
                        <div class="flex flex-col">
                            <?php foreach ($data['options_info'] as $option) { ?>
                                <?php if ($option['question_id'] === $question['id']) { ?>
                                    <h1 class="block text-blueGray-600 text-sm transition-all duration-300 cursor-pointer mb-2">پاسخ:
                                    </h1>
                                    <textarea name="option_descriptive_answer[<?php echo intval($question['id']); ?>]" cols="30" rows="4"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"></textarea>
                                    <div class="relative my-4">
                                        <label for="option_descriptive_answer_file" class="block text-blueGray-600 text-xs font-bold mb-2">آپلود پاسخ: </label>
                                        <input type="file" name="option_descriptive_answer_file[<?php echo intval($question['id']); ?>]" accept=".zip" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    </div>
                                    <!-- <input type="hidden" value="<?php echo $question['id']; ?>" name="option_descriptive_question_id"> -->
                                    <?php } ?>
                                <?php } ?>
                        </div>
                        <?php } ?>
                </div>
                <?php } ?>
        </div>
        <div class="text-center mt-2 max-w-xl mx-auto">
            <button
                class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                type="submit">اتمام آزمون </button>
        </div>
    </form>
<?php } else { ?>
<h2
    class="block text-blueGray-600 text-base text-center text-center my-4 transition-all duration-300 cursor-pointer p-4 max-w-4xl mx-auto">
    سوالی در این آزمون وجود ندارد
</h2>
<?php } ?>
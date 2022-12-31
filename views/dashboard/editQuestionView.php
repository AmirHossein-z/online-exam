<div class="flex-auto px-4 lg:px-10 py-10 pt-0 w-full bg-blueGray-800">
    <form action="<?php echo URL . 'dashboard/edit_one_question/' . $data['question_id']; ?>" method="post"
        class="max-w-xl grid mx-auto bg-blueGray-200 p-5">
        <div class="relative w-full my-4">
            <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="question_info">
                سوال:
            </label>
            <textarea name="question_info" cols="30" rows="5" required
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                placeholder="متن سوال را وارد کنید"><?php echo $data['question_info'] ?></textarea>
        </div>
        <div class="relative w-full my-4">
            <div>
                <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="grade">نمره سوال: </label>
                <input type="text" name="grade" required value="<?php echo $data['grade'] ?>" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm
                    shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
            </div>
        </div>
        <?php if ($data['type'] === 0) { ?>
            <div class="relative w-full my-4">
                <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="option_descriptive">
                    پاسخ سوال تشریحی
                </label>
                <textarea name="option_descriptive" cols="30" rows="10"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="پاسخ سوال را وارد کنید"><?php echo $data['options_list'][0]['info'] ?></textarea>
                <input type="hidden" value="<?php echo $data['correct_option_id']; ?>" name="option_id_descriptive">
            </div>
            <?php } else if ($data['type'] === 1) { ?>
            <?php foreach ($data['options_list'] as $option) { ?>
                <div class="relative w-full my-2">
                    <label class="block text-blueGray-600 text-xs font-bold mb-2">
                        گزینه:
                    </label>
                    <textarea name="option_multi[<?php echo $option['option_id']; ?>]" cols="30" rows="5"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        placeholder="پاسخ سوال را وارد کنید"><?php echo $option['info'] ?></textarea>
                    <?php if ($data['correct_option_id'] === $option['option_id']) { ?>
                        <label class="inline-flex items-center cursor-pointer mt-3"><input type="radio" name="check_correct_option"
                                value="<?php echo $option['option_id'] ?>"
                                class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                                checked /><span class="ml-2 text-sm font-semibold text-blueGray-600">این گزینه درست
                                است</span></label>
                        <?php } else { ?>
                        <label class="inline-flex items-center cursor-pointer mt-3"><input type="radio" name="check_correct_option"
                                value="<?php echo $option['option_id'] ?>"
                                class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" /><span
                                class="ml-2 text-sm font-semibold text-blueGray-600">این گزینه درست است</span></label>
                        <?php } ?>
                </div>
                <?php } ?>
            <?php } ?>
        <input type="hidden" name="type" value="<?php echo $data['type']; ?>">
        <div class="text-center mt-2">
            <button
                class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                type="submit">
                ویرایش سوال
            </button>
        </div>
    </form>
</div>
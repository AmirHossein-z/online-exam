<div>
    <h1 class="block text-blueGray-800 text-2xl text-center my-4 transition-all duration-300 cursor-pointer">لیست سوالات
        شما</h1>
</div>
<?php if (count($data['questions_info']) > 0) { ?>
    <h2
        class="block text-right text-blueGray-600 text-base text-center my-4 transition-all duration-300 cursor-pointer p-4">
        تعداد کل سوالات: <span>
            <?php echo count($data['questions_info']); ?>
        </span>
    </h2>

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
                                    <p class="block text-gray-900 text-sm transition-all duration-300 cursor-pointer">
                                        <?php echo $option['info']; ?>
                                    </p>
                                    <?php if ($option['is_correct'] === 1) { ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="w-5 h-5 text-emerald-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                        <?php } ?>
                                </div>
                                <?php } ?>
                            <?php } ?>

                    </div>
                    <?php } else if ($question['type'] === 0) { ?>
                    <div class="flex">
                        <?php foreach ($data['options_info'] as $option) { ?>
                            <?php if ($option['question_id'] === $question['id']) { ?>
                                <p class="block text-gray-900 text-sm transition-all duration-300 cursor-pointer">
                                    <?php echo $option['info']; ?>
                                </p>
                                <?php } ?>
                            <?php } ?>
                    </div>
                    <?php } ?>
                <div class="flex items-center p-4 justify-end gap-6">
                    <a class="bg-lightBlue-500 text-white active:bg-blueGray-800 text-sm font-bold p-2 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150"
                        href="<?php echo URL . 'dashboard/edit_question/' . $question['id'] ?>">
                        ویرایش</a>
                    <a class="bg-red-500 text-white active:bg-red-700 text-sm font-bold p-2 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150"
                        id="delete_question_btn" onclick="deleteQuestion()"
                        href="<?php echo URL . 'dashboard/delete_question/' . $question['id'] ?>">حذف</a>
                </div>
            </div>
            <?php } ?>
    </div>
<?php } else { ?>
    <div class="grid justify-center items-center">
        <h3
            class="block text-right text-blueGray-600 text-base text-center my-4 transition-all duration-300 cursor-pointer p-4">
            شما در حال حاضر هیچ سوالی ندارید</h3>
        <a href="<?php echo URL . 'dashboard/add_question' ?>" class=" bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold px-6 py-3 rounded shadow
                            hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150
                            text-center">افزودن
            سوال جدید</a>
    </div>
<?php } ?>
<script>
    const deleteQuestion = () => {
        if (confirm('آیا از حذف سوال اطمینان دارید؟ ')) {
            return true;
        }
        return false
    }
</script>
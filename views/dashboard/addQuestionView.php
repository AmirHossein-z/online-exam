<div class="flex-auto px-4 lg:px-10 py-10 pt-0 w-full bg-blueGray-800">
    <form action="<?php echo URL . 'dashboard/add_one_question' ?>" method="post"
        class="max-w-xl grid mx-auto bg-blueGray-200 p-5">
        <div class="relative w-full my-4">
            <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="question_info">
                سوال:
            </label>
            <textarea name="question_info" id="question_info" cols="30" rows="5" required
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                placeholder="متن سوال را وارد کنید"></textarea>
        </div>
        <div class="relative w-full my-4">
            <div>
                <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="grade">نمره سوال: </label>
                <input type="text" name="grade" id="grade" required
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
            </div>
        </div>
        <div>
            <label class="inline-flex items-center cursor-pointer"><input type="checkbox" id="toggle_checkbox"
                    name="is_multi_choice_option"
                    class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" /><span
                    class="ml-2 text-sm font-semibold text-blueGray-600">گزینه تستی می خواهم</span></label>
        </div>
        <div class="relative w-full my-4 hidden">
            <div>
                <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="number_questions">
                    تعداد گزینه ها
                </label>
                <input type="number" name="number_questions" id="number_questions" min="2" max="6"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" />
            </div>
            <div class="text-center mt-6">
                <button
                    class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button" id="add_option_btn">افزودن گزینه</button>
            </div>
        </div>
        <div class="relative w-full my-4" id="option_descriptive">
            <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="option_descriptive">
                پاسخ سوال تشریحی(اختیاری)
            </label>
            <textarea name="option_descriptive" id="option_info_descriptive" cols="30" rows="10"
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                placeholder="پاسخ سوال را وارد کنید"></textarea>
        </div>
        <div class="relative w-full my-4 hidden" id="option_multi_choice">
        </div>

        <div class="text-center mt-2">
            <button
                class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                type="submit">
                افزودن سوال
            </button>
        </div>
    </form>
</div>
<script>
    const option_descriptive = document.querySelector("#option_descriptive");
    const option_multi_choice = document.querySelector("#option_multi_choice");
    const toggle_checkbox = document.querySelector("#toggle_checkbox");
    const add_option_btn = document.querySelector("#add_option_btn");
    const number_questions = document.querySelector("#number_questions");
    const MAX_OPTION_MULTI_CHOICE = 6;
    const MIN_OPTION_MULTI_CHOICE = 2;
    let option_list_values = {};

    const toggleOptionType = (status) => {
        if (status) {
            option_descriptive.innerHTML = "";
            option_multi_choice.classList.remove("hidden");
            number_questions.parentNode.parentNode.classList.remove("hidden");
        } else {
            option_descriptive.innerHTML = `
                <label class="block text-blueGray-600 text-xs font-bold mb-2" htmlFor="option_descriptive">
                    پاسخ سوال تشریحی(اختیاری)
                </label>
                <textarea name="option_descriptive" id="option_info_descriptive" cols="30" rows="10"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="پاسخ سوال را وارد کنید"></textarea> 
                `;

            option_multi_choice.innerHTML = "";
            number_questions.parentNode.parentNode.classList.add("hidden");
        }
    }

    const add_option = (e) => {
        const number = parseInt(number_questions.value);
        if (number >= MIN_OPTION_MULTI_CHOICE && number <= MAX_OPTION_MULTI_CHOICE) {
            option_multi_choice.innerHTML = "";
            for (let i = 0; i < number; i++) {
                option_multi_choice.innerHTML += `
                    <div class="relative w-full my-4">
                        <label class="block text-blueGray-600 text-xs font-bold mb-2">
                            گزینه:
                        </label>
                        <textarea name="option_multi[${i}]" cols="30" rows="5" 
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="پاسخ سوال را وارد کنید"></textarea>
                        <label class="inline-flex items-center cursor-pointer mt-3"><input type="radio" 
                                name="check_correct_option" value="${i}"
                                class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" /><span
                                class="ml-2 text-sm font-semibold text-blueGray-600">این گزینه درست است</span></label>
                    </div>
                `;
            }
        } else {
            alert("حداکثر می توانید" + MAX_OPTION_MULTI_CHOICE + "گزینه اضافه کنید");
        }
    }

    toggle_checkbox.addEventListener("change", (e) =>
        toggleOptionType(e.target.checked)
    );

    add_option_btn.addEventListener("click", add_option);


</script>
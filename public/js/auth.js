const signup_student = document.querySelector("#signup_student");
const signup_teacher = document.querySelector("#signup_teacher");
const signup_form_student = document.querySelector("#signup_form_student");
const signup_form_teacher = document.querySelector("#signup_form_teacher");

const toggleSignupForm = (
    element_show,
    element_hidden,
    flag,
    teacher_form,
    student_form
) => {
    element_show.classList.add("bg-blueGray-800");
    element_show.classList.add("text-blueGray-200");
    element_show.classList.remove("text-blueGray-800");

    element_hidden.classList.remove("bg-blueGray-800", "text-blueGray-200");
    element_hidden.classList.add("text-blueGray-800");

    if (flag) {
        student_form.classList.remove("hidden");
        teacher_form.classList.add("hidden");
    } else {
        teacher_form.classList.remove("hidden");
        student_form.classList.add("hidden");
        // signup_form_teacher.classList.remove("hidden");
        // signup_form_student.classList.add("hidden");
    }
};

signup_student.addEventListener("click", () =>
    toggleSignupForm(
        signup_student,
        signup_teacher,
        true,
        signup_form_teacher,
        signup_form_student
    )
);
signup_teacher.addEventListener("click", () =>
    toggleSignupForm(
        signup_teacher,
        signup_student,
        false,
        signup_form_teacher,
        signup_form_student
    )
);

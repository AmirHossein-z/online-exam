const signup_student = document.querySelector("#signup_student");
const signup_teacher = document.querySelector("#signup_teacher");
const signup_form_student = document.querySelector("#signup_form_student");
const signup_form_teacher = document.querySelector("#signup_form_teacher");

signup_student.addEventListener("click", (e) => {
    e.target.classList.add("bg-blueGray-800");
    e.target.classList.add("text-blueGray-200");
    e.target.classList.remove("text-blueGray-800");

    signup_teacher.classList.remove("bg-blueGray-800", "text-blueGray-200");
    signup_teacher.classList.add("text-blueGray-800");

    signup_form_student.classList.remove("hidden");
    signup_form_teacher.classList.add("hidden");
});

signup_teacher.addEventListener("click", (e) => {
    e.target.classList.add("bg-blueGray-800");
    e.target.classList.add("text-blueGray-200");
    e.target.classList.remove("text-blueGray-800");

    signup_student.classList.remove("bg-blueGray-800", "text-blueGray-200");
    signup_student.classList.add("text-blueGray-800");

    signup_form_student.classList.add("hidden");
    signup_form_teacher.classList.remove("hidden");
});

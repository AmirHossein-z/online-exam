<div>
    <h1 class="block text-blueGray-800 text-2xl text-center my-4 transition-all duration-300 cursor-pointer">لیست آزمون های شما</h1>
</div>
    <!-- Table of exam properties -->
        <table class="items-center w-full bg-transparent border-collapse">
          <thead class="text-center">
            <tr>
              <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                #
              </th>
              <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                عنوان
              </th>
              <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                استاد
              </th>
              <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                توضیحات
              </th>
              <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                مدت زمان آزمون
              </th>
              <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                نمره نهایی
              </th>
              <!-- <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                نمایش نمره به دانشجویان
              </th> -->
              <?php
              if ($_SESSION['type'] === MASTER) { ?>

              <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                افزودن سوال
              </th>
              <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                ویرایش آزمون
              </th>
              <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                حذف
              </th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
              <!-- print every row of table -->
            <?php
            $i = 1;
            foreach ($data as $d) {
              ?>
              ‌‌‌
            <tr class="bg-white">
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800"><?= $i++; ?></td>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                <?= $d['title']; ?>

              </td>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                <?= $d['name'] ?>
              </td>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                <?= $d['description']; ?>
              </td>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                <?= $d['duration']; ?>
              </td>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
              <?= $d['final_grade']; ?>
              </td>

              <?php
              if ($_SESSION['type'] === MASTER) { ?>

              <td>
              <a class="bg-lightBlue-500 text-white text-sm px-2 py-1 rounded ml-3 cursor-pointer" href="<?= URL . 'dashboard/exam_createQuestion/' . $d['exam_id'] ?>" target="_blank"> افزودن سوال</a>
              </td>
              
  
              <td>
              <a class="bg-lightBlue-500 text-white text-sm px-2 py-1 rounded ml-3 cursor-pointer" href="<?= URL . 'dashboard/exam_edit/' . $d['exam_id']; ?>" target="_blank">جزئیات آزمون</a>
              </td>
              
              <td>
              <form action="<?= URL . 'dashboard/exam_delete/' . $d['exam_id'] ?>"
                    method="post">
                    <input type="hidden" name="exam_id" value="<?= $d['exam_id'] ?>">
                <button type="submit">
                  <a class="bg-blueGray-600 text-sm px-2 py-1 rounded ml-3 text-blueGray-100">حذف</a>
                </button>
              </form>
              </td>


            <?php } ?>
              
            </tr>
            <?php } ?>

            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
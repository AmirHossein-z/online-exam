
<div>
    <h1 class="block text-blueGray-800 text-2xl text-center my-4 transition-all duration-300 cursor-pointer">لیست شرکت کننده ها</h1>
</div>
        <table class="items-center w-full bg-transparent border-collapse">
          <thead class="text-center">
            <tr>
              <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                #
              </th>
              <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                شرکت کننده
              </th>
              <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                عنوان امتحان
              </th>
              <th scope="col" class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                نمره
              </th>
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
                <?= $d['student_name']; ?>

              </td>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                <?= $d['exam_title']; ?>

              </td>
              <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm text-center whitespace-nowrap p-4 text-blueGray-800">
                <?= $d['grade'] ?>
              </td>

            </tr>
            <?php } ?>

            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
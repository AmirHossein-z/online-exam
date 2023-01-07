<div>
    <h1 class="block text-blueGray-800 text-2xl text-center my-4 transition-all duration-300 cursor-pointer">لیست آزمون های شما</h1>
</div>
<?php if (count($data) > 0) { ?>
    <h2
        class="block text-right text-blueGray-600 text-base text-center my-4 transition-all duration-300 cursor-pointer p-4">
        تعداد کل آزمون ها: <span>
            <?php echo count($data); ?>
        </span>
    </h2>
    <!-- Table of exam properties -->
            <div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-x-auto">
        <table class="min-w-full">
          <thead class="border-b">
            <tr>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                #
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                عنوان
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                توضیحات
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                مدت زمان آزمون
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                نمره نهایی
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                نمایش نمره به دانشجویان
              </th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr class="border-b"> -->
              <!-- print every row of table -->
            <?php foreach($data as $d) {?>

            <tr class="bg-white border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $d['exam_id']; ?></td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <?= $d['title']; ?>

              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <?= $d['description']; ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <?= $d['duration']; ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?= $d['final_grade']; ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?= $d['show_grade']; ?>
              </td>
            </tr>
            <?php } ?>

            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

    <?php } ?>
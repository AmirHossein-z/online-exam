<p>تعداد کل سوالات: <span><?php echo count($data['questions_info']); ?></span></p>
<?php foreach ($data['questions_info'] as $question) { ?>
<div>
    <h1>سوال: <span><?php echo $question['info']; ?></span></h1>
    <p>نمره سوال: <span><?php echo $question['grade']; ?></span></p>
    <?php if ($question['type'] === 1) { ?>
    <div class="flex">
        <?php foreach ($data['options_info'] as $option) { ?>
        <?php if ($option['question_id'] === $question['id']) { ?>
        <p><?php echo $option['info']; ?></p><span><?php echo $option['is_correct']; ?></span>
        <?php } ?>
        <?php } ?>
    </div>
    <?php } else if ($question['type'] === 0) { ?>
    <div class="flex">
        <?php foreach ($data['options_info'] as $option) { ?>
        <?php if ($option['question_id'] === $question['id']) { ?>
        <p><?php echo $option['info']; ?></p><span><?php echo $option['is_correct']; ?></span>
        <?php } ?>
        <?php } ?>
    </div>
    <?php } ?>
</div>
<?php } ?>
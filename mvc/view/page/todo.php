<Br><div class="tac">
    <span class="gstuser" > ** شما میتوانید در این قسمت کارهای روزمره خود را درج کنید و آنرا انجام دهید ** </span>
    <br>
</div>

<div class="svg-wrapper" style="margin-right: 1030px; position: absolute; top: 0;"><br>
    <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
        <rect id="shape" height="40" width="150"/>
        <div id="text">
            <a href="/dev/workspace/web/todo/home"><span class="spot">بازگشت به صفحه قبل</span></a>
        </div>
    </svg>
</div>
<hr>

<!-- table todo -->

<div id="content"><br><br>
    <? if ($isGuest) { ?>
        <div class="tac lf important-color">
            <span><?=_header_guest_message?></span>
        </div>
    <? } else { ?>
        <ul class="todo-entry">
            <li class="back-color"><?=_table_remove?></li>
            <li class="back-color"><?=_table_done?></li>
            <li class="back-color"><?=_title_table?></li>
            <li class="back-color"><?=_description_table?></li>
            <li class="back-color"><?=_eventtime_table?></li>
        </ul>

        <? if ($records == null){ $records = array(); } ?>
        <? foreach ($records as $record){
            if ($record['isDone']){
                $doneClass = "done";
            } else {
                $doneClass = "pending";
            }
            ?>

            <ul class="todo-entry <?=$doneClass?>">
                <li><span onclick="noteRemove(this, <?=$record['note_id']?>)" class="btn-2">-</span></li>
                <li><span onclick="noteToggle(this, <?=$record['note_id']?>)" class="btn-2">*</span></li>
                <li><?=$record['title']?></li>
                <li><?=$record['description']?></li>
                <li><?=jdate($record['eventTime'], 'd M Y')?></li>
            </ul>
        <? } ?>
        <br>
        <br>
        <br>
        <div class="tal">
            <a class="btn-blue tal" href="/dev/workspace/web/todo/note/catalog/1"><?=_page_note?></a>
            &nbsp&nbsp<span class="btn-2">➖</span>&nbsp&nbsp
            <a href="/dev/workspace/web/todo/note/submit" class="btn-blue"><?=_btn_note?></a>&nbsp
        </div>
    <? } ?>
</div>
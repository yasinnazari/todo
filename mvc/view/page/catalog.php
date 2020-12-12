<br><img class="profile-image" style="margin-bottom: 0;" src="<?=baseUrl()?>image/empty-profile-64.png">
<span class="gstuser" style="margin-right: 10px; margin-top: 0px;"><?=$_SESSION['firstname']?> <?=_header_welcome?></span>
<br><br><hr>

<div class="tac">
    <span class="gstuser"></span>
</div>

<div class="svg-wrapper" style="margin-right: 1030px; position: absolute; top: 0;"><br>
    <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
        <rect id="shape" height="40" width="150"/>
        <div id="text">
            <a href="/dev/workspace/web/todo/home"><span class="spot">بازگشت به صفحه قبل</span></a>
        </div>
    </svg>
</div>

<div id="notes">
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

        <?= pageination('/dev/workspace/web/todo/note/catalog', 2, 'pageination-btn', $pageIndex); ?>
        <br>
        <br>

        <span class="pageination-btn" onclick="getPage(1)"><?=_next?></span>
        <span> ... </span>
        <? for ($i=$pageIndex-2; $i<=$pageIndex+2; $i++) { ?>
            <? if ($i <= 0 ) { continue; } ?>
            <span class="pageination-btn" onclick="getPage(<?=$i?>)"><?=$i?></span>
        <? } ?>

        <br>
        <br><br>
        <div class="tal">
            <a class="btn-blue tal" href="/dev/workspace/web/todo/page/todoTable"><?=_all_notes?></a>
            &nbsp&nbsp<span class="btn-2">➖</span>&nbsp&nbsp
            <a href="/dev/workspace/web/todo/note/submit" class="btn-blue"><?=_btn_note?></a>&nbsp
        </div>
    <? } ?>

</div>

<script>
    function getPage(pageIndex){
        $.ajax('/dev/workspace/web/todo/note/catalog/' + pageIndex, {
            type: 'post',
            dataType: 'json',
            success :function(data){
                $("#notes").html(data.html);
            }
        });
    }

    function noteRemove(sender, noteId){
        sender = $(sender);
        var parent = sender.parentsUntil('.todo-entry').parent();

        $.ajax('/dev/workspace/web/todo/note/remove/' + noteId, {
            type: 'post',
            dataType: 'json',
            success: function(data) {
                parent.remove();
            }
        });
    }

    function noteToggle(sender, noteId) {
        sender = $(sender);
        var parent = sender.parentsUntil('.todo-entry').parent();

        $.ajax('/dev/workspace/web/todo/note/toggle/' + noteId, {
            type: 'post',
            dataType: 'json',
            success: function(data) {
                if (parent.hasClass('done')){
                    parent.removeClass('done');
                    parent.addClass('pending');
                } else {
                    parent.removeClass('pending');
                    parent.addClass('done');
                }
            }
        });
    }

</script>


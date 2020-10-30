<div id="header-top-right">
    <? $isGuest = !isset($_SESSION['email']); ?>
    <? if ($isGuest) { ?>
        <img class="profile-image" src="<?=baseUrl()?>image/empty-profile-64.png">
        <span style="margin-right: 10px;"><?=_header_guest?> <?=_header_welcome?></span>
        <a href="/dev/workspace/web/shop/user/login" style="margin-right: 15px;" class="btn"><?=_btn_login?></a>
    <? } else { ?>
            <img class="profile-image" src="<?=baseUrl()?>image/empty-profile-64.png">
            <span style="margin-right: 10px;"><?=$_SESSION['email']?> <?=_header_welcome?></span>
            <a href="/dev/workspace/web/shop/user/login" style="margin-right: 15px;" class="btn"><?=_btn_exit?></a>
    <? } ?>
</div>

<div id="notes">
<br><br>
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

        <? if ($records == null){ $records = []; } ?>
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

        <?=  pegination('/dev/workspace/web/shop/note/catalog', 2, 'pegination-btn', $pageIndex);  ?>
        <br>
        <br>
        <hr>
        <br>

        <span class="pegination-btn" onclick="getPage(1)"><?=_next?></span>
        <span> ... </span>
        <? for ($i=$pageIndex-2; $i<=$pageIndex+2; $i++) { ?>
            <? if ($i <= 0 ) { continue; } ?>
            <span class="pegination-btn" onclick="getPage(<?=$i?>)"><?=$i?></span>
        <? } ?>

        <br>
        <br><br>
        <div class="tal">
            <a class="btn-blue tal" href="/dev/workspace/web/shop/page/home"><?=_all_notes?></a>
            &nbsp&nbsp<span class="btn-2">➖</span>&nbsp&nbsp
            <a href="/dev/workspace/web/shop/note/submit" class="btn-blue"><?=_btn_note?></a>&nbsp
        </div>
    <? } ?>

</div>

<script>
    function getPage(pageIndex){
        $.ajax('/dev/workspace/web/shop/note/ajaxCatalog/' + pageIndex, {
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

        $.ajax('/dev/workspace/web/shop/note/remove/' + noteId, {
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

        $.ajax('/dev/workspace/web/shop/note/toggle/' + noteId, {
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


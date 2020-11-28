<div id="header-top-right">
    <? if ($isGuest) { ?>
        <img class="profile-image" src="<?=baseUrl()?>image/empty-profile-64.png">

        <span style="margin-right: 10px;"><?=_header_guest?><?=_header_welcome?></span>
        <a href="/dev/workspace/web/notes-v3/user/login" style="margin-right: 15px;" class="btn"><?=_btn_login?></a>
        <span class="con" style="margin-right: 10px;"><?=get_access_name()?></span>

        <label class="con" style="margin-right: 345px" for="cars"><?=_select_access?></label>
        <select style="margin-right: 14px;" name="cars" id="cars">
            <option value="yes"><?=_yes?></option>
            <option value="no"><?=_no?></option>
        </select>&nbsp&nbsp

        <? } else { ?>
            <img class="profile-image" src="<?=baseUrl()?>image/empty-profile-64.png">
            <span style="margin-right: 10px;"><?=$_SESSION['email']?> <?=_header_welcome?></span>
            <a href="/dev/workspace/web/notes-v3/user/logout" style="margin-right: 15px;" class="btn"><?=_btn_exit?></a>
        <span class="con" style="margin-right: 10px;"><?=get_access_name()?></span>
    <? } ?>
</div>

<? if (!isVip()) { ?><br>
    <div class="tac">
        <span><?=_not_vip?></span>
        &nbsp&nbsp<span class="pageination-btn">اطلاعات بیشتر</span>
    </div
<? } ?>

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
            <a class="btn-blue tal" href="/dev/workspace/web/notes-v3/note/catalog/1"><?=_page_note?></a>
            &nbsp&nbsp<span class="btn-2">➖</span>&nbsp&nbsp
            <a href="/dev/workspace/web/notes-v3/note/submit" class="btn-blue"><?=_btn_note?></a>&nbsp
        </div>
    <? } ?>
</div>

<script>

    function noteRemove(sender, noteId) {
        sender = $(sender);
        var parent = sender.parentsUntil('.todo-entry').parent();

        $.ajax('/dev/workspace/web/notes-v3/note/remove/' + noteId, {
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

        $.ajax('/dev/workspace/web/notes-v3/note/toggle/' + noteId, {
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


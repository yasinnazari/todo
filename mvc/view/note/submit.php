<div>
    <div class="tac"><br>
        <img src="<?=baseUrl()?>image/notes.png"><br>
        <br>
        <br>

        <form action="/dev/workspace/web/notes-v3/note/submit" method="post">
            <br>
            <input type="text" placeholder="<?=_ph_title?>" name="title" style="width: 350px;">
            <br>
            <br>
            <textarea type="text" placeholder="<?=_ph_description?>" style="width: 350px; height: 215px; resize: none;" name="description"></textarea>
            <br>
            <br>
            <br>
            <br>
                    <button type="submit" class="btn-blue"><?=_btn_insert?></button><br>
            <br>
            <br><br>
            <a href="/dev/workspace/web/notes-v3/page/home" class="btn"><?=_btn_exit?></a>
            <br><br>
        <form>

    </div>
</div>


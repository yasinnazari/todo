<? if ($isGuest) { ?>
    <img class="profile-image" style="margin-bottom: 5px;" src="<?=baseUrl()?>image/empty-profile-64.png">
    <span class="gstuser" style="margin-right: 9px; margin-top: 10px;"><?=_header_guest?> <?=_header_welcome?> </span>

    <div class="svg-wrapper" style="margin-right: 50px; margin-top: 5px;"><br>
        <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
            <rect id="shape" height="40" width="150"/>
            <div id="text">
                <br><a style="margin-right: 18px;" href="/dev/workspace/web/todo/login"><span class="spot">ورود</span></a>
            </div>
        </svg>
    </div>

    <div class="svg-wrapper" style="margin-right: 50px; margin-top: 5px;"><br>
        <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
            <rect id="shape" height="40" width="150"/>
            <div id="text">
                <br><a style="margin-right: 18px;" href="/dev/workspace/web/todo/register"><span class="spot">ثبت نام</span></a>
            </div>
        </svg>
    </div>

    <hr><br>
    <br><Br>
    <br><br>
    <div class="tac lf important-color">
        <span><?=_header_guest_message?></span>
    </div>

<? } else { ?>
    <br><img class="profile-image" style="margin-bottom: 0;" src="<?=baseUrl()?>image/empty-profile-64.png">
    <span class="gstuser" style="margin-right: 10px; margin-top: 0px;"><?=$_SESSION['firstname']?> <?=_header_welcome?></span>
    <br><br><hr>

    <div class="svg-wrapper" style="margin-right: 865px; position: absolute; top: 0;"><br>
        <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
            <rect id="shape" height="40" width="150"/>
            <div id="text">
                <a href="/dev/workspace/web/todo/login"><span class="spot">خروج از این صفحه</span></a>
            </div>
        </svg>
    </div>

    <div class="svg-wrapper" style="margin-right: 1030px; position: absolute; top: 0;"><br>
        <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
            <rect id="shape" height="40" width="150"/>
            <div id="text">
                <a href="/dev/workspace/web/todo/link"><span class="spot">دریافت لینک معرف</span></a>
            </div>
        </svg>
    </div>

    <div class="svg-wrapper" style="margin-right: 700px; position: absolute; top: 0;"><br>
        <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
            <rect id="shape" height="40" width="150"/>
            <div id="text">
                <a href="/dev/workspace/web/todo/page/userDescription"><span class="spot">مشاهده اطلاعات خود</span></a>
            </div>
        </svg>
    </div>

    <div class="container">
        <a href="/dev/workspace/web/todo/page/todoTable" class="btn3">
            <svg width="277" height="62">
                <defs>
                    <linearGradient id="grad1">
                        <stop offset="0%" stop-color="#FF8282"/>
                        <stop offset="100%" stop-color="#E178ED"/>
                    </linearGradient>
                </defs>
                <rect x="5" y="5" rx="25" fill="none" stroke="url(#grad1)" width="266" height="50"></rect>
            </svg>
            <span>مشاهده صفحه اصلی</span>
        </a>
    </div>

<? } ?>


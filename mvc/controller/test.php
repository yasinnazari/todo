<?
class TestController {

    public function test1() {
        $db = Db::getInstance();
        for ($i=0; $i<0; $i++) {
            $title = "Some Title " . $i;
            $description = "Some Description " . $i;
            $isDone = 0;
            $db->insert("INSERT INTO note (user_id, title, description, isDone) VALUES (1, '$title', '$description', '$isDone')");
        }
    }

    public function regex() {
        $source = "<div>this is sample url: ftp://translate.google.com/ and enother url = http://microsoft/answers/?topic=140 and nothing else ftptest hello ftp end https://google.com and http://uncox.com/question/1222/یک-سوال-عجیب ftps://test.com/test and another http://microsoft/test/ </div>";
        echo $source;

        hr();
        $changedSource = preg_replace("/((?:ht|f)tp(?:|s):\/\/[a-zA-Z0-9]+\.[a-zA-Z0-9]+.*?)\s/", '<a href="$1">Link</a> ', $source);
        echo $changedSource;
    }


    //1970-01-01 00:00:00
    public function convertDate($date, $format = "Y d M"){
        echo jdate($date, $format);
    }

}


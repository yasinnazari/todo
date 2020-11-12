<?

class PageController {

    public function home() {
        $data['pageIndex'] = 1;
        $data['pageCount'] = 20;


        View::render("/mvc/view/page/home.php", $data);
    }
}


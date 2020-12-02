<?
class PaymentController {

    public function cart()
    {
        View::render('/var/www/html/dev/workspace/web/todo/mvc/view/payment/cart.php');
    }

    public function request()
    {
        require_once('/var/www/html/dev/workspace/web/todo/lib/nusoap/nusoap.php');

        $merchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXX';
        $amount = 1000;
        $description = "انجام یک تراکنش تستی";
        $email = 'project@notes.com';
        $mobile = '09054244609';
        $callbackURL = 'http://localhost/dev/workspace/web/todo/payment/verify';

        $client = new nusoap_client('http://ir.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call('PayRequest', array(
                array (
                    'merchantID'    => $merchantID,
                    'amount'        => $amount,
                    'description'   => $description,
                    'email'         => $email,
                    'mobile'        => $mobile,
                    'callbackURL'   => $callbackURL,
                )
            )
        );

        if ($result['status'] == 100){
            Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result['authority']);
        } else {
            echo 'فرآیند پرداخت با خطا مواجه شده . کد خطا : '.$result['Status'];
        }
    }

    public function verify()
    {
        require_once('/var/www/html/dev/workspace/web/todo/lib/nusoap/nusoap.php');

        $merchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXX';
        $amount = 1000;
        $authority = $_GET['authority'];

        if ($_GET['Status'] == 'OK'){
            $client = new nusoap_client('http://ir.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl');
            $client->soap_defencoding = 'UTF-8';
            $result = $client->call('PaymentVerification', array(
                array (
                    'merchantID'    => $merchantID,
                    'amount'    => $amount,
                    'authority'    => $authority,
                )
            )
        );

        if ($result['Status'] == 100){
            echo "فرآیند پرداخت موفق آمیز بود . سند رهگیری : ". $result['RefID'];
        } else {
            echo 'فرآیند پرداخت با خطا مواجه شد .ک کد خطا :'. $result['Status'];
        }

        } else {
            echo "فرآیند پرداخت توسط کاربر سایت لغو شد";
        }
    }
}


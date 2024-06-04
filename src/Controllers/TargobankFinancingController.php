<?php
namespace TargobankFinancing\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Templates\Twig;

class TargobankFinancingController extends Controller
{
    public function showForm(Twig $twig, Request $request)
    {
        $sessionID = session_id();
        $amount = $request->input('amount', 0);
        if ($amount < 299) {
            return 'Financing is available for amounts starting from 299.00 euros.';
        }
        $dealerID = '804625'; 
        $documentno = 'order_' . rand(1000, 9999);
        $dealerText = urlencode('https://www.villastore24.de/targobank-return');
        $hash = $this->generateHash($amount, $dealerID, $dealerText, $documentno);

        return $twig->render('TargobankFinancing::form', [
            'sessionID' => $sessionID,
            'amount' => $amount,
            'dealerID' => $dealerID,
            'dealerText' => $dealerText,
            'documentno' => $documentno,
            'hash' => $hash
        ]);
    }

    private function generateHash($amount, $dealerID, $dealerText, $documentno)
    {
        $data = "amount=$amount&dealerID=$dealerID&dealerText=$dealerText&documentno=$documentno";
        $key = getenv('TARGOBANK_SECRET_KEY'); // Access the secret key from environment variables
        return hash_hmac('sha256', $data, $key);
    }
}
?>

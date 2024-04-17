<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    private $orders;

    public function __construct()
    {
        $this->orders = new Orders();
    }

    public function index()
    {
        $orders = $this->orders->getAllOrders();
        $UI = 'orders';
        return view('admin.order', compact('orders', 'UI'));
    }


    public function store(Request $request)
    {
        $dataInsert = [
            'user_id' => $request->user_id,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'total_price' => $request->total_price,
            'status' => 'new'
        ];
        
        if ($dataInsert['payment_method'] == 'COD') {
            $this->orders->addOrder($dataInsert);
            return redirect()->route('homepage')->with('success', 'Order created successfully.');
        }
        if ($dataInsert['payment_method'] == 'MOMO') {

            function execPostRequest($url, $data)
            {
                $ch = curl_init($url);
                var_dump($ch);
                if ($ch === false) {
                    die('Curl initialization failed');
                }
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data)
                    )
                );
                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                $result = curl_exec($ch);
                if ($result === false) {
                    die('Curl execution failed: ' . curl_error($ch));
                }
                curl_close($ch);
                return $result;
            }
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $request->total_price;
            $orderId = time() . "";
            $redirectUrl = "http://127.0.0.1:8000/momo/callback";
            $ipnUrl = "http://127.0.0.1:8000/";
            $extraData = "";
            $partnerCode = $partnerCode;
            $accessKey = $accessKey;
            $serectkey = $secretKey;
            $orderId = $orderId;
            $orderInfo = $orderInfo;
            $amount = $amount;
            $ipnUrl = $ipnUrl;
            $redirectUrl = $redirectUrl;
            $extraData = $extraData;
            $requestId = time() . "";
            $requestType = "payWithATM";
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);
            if (isset($jsonResult['payUrl'])) {
                $request->session()->put('dataInsert', $dataInsert);
                return redirect($jsonResult['payUrl']);
            } else {
                echo "Error: Missing payUrl in the response.";
            }
        }
    }

    public function handleCallback(Request $request)
    {
        if ($request->input('errorCode') == 0) {
            $this->orders->addOrder(session('dataInsert'));
            $request->session()->forget('dataInsert');

            return redirect()->route('homepage')->with('msg', 'You have successfully paid!');
        } else {
            return redirect()->route('homepage')->with('msg', 'You have failed to pay!');
        }
    }

    public function update(Request $request, string $id)
    {
        $order = $this->orders::findOrFail($id);
        $data = $request->all();
        $order->update($data);
        return redirect()->route('orders.index');
    }

    public function destroy($id)
    {
        $this->orders->deleteOrder($id);
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}

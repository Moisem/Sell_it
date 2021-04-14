<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use Illuminate\Support\Facades\Auth;
use App\Membresia;
use App\Suscripcion;
use App\Http\Controllers\MembresiaController;
use App\User;

class PaypalController extends Controller
{
    private $apiContext;
    
    public function __construct()
    {
        $this->middleware('auth');
        $payPalConfig= Config::get('paypal');


        $this->apiContext = new ApiContext(   
            new OAuthTokenCredential(
            $payPalConfig['client_id'],
            $payPalConfig['secret']
    )
);
    }
  
    public function pagar($membresia){
        $user=Auth::user();
        $precio=Membresia::first()->precio;
        $sus=User::with('suscripcion')->findOrFail(Auth()->user()->id);
        if ($user->suscripcion_id==0) {
            //usuario que va a pagar
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            //Se considera el monto
            $amount = new Amount();
            $amount->setTotal($precio);
            $amount->setCurrency('MXN');

            //se agrega el monto a la transaccion
            $transaction = new Transaction();
            $transaction->setAmount($amount);

            $callBackUrl=url("/Comprar/Estatus");
            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl($callBackUrl)
            ->setCancelUrl($callBackUrl);

            $payment = new Payment();
            $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

            try {
                $payment->create($this->apiContext);
                //echo $payment;
                return redirect()->away($payment->getApprovalLink());
            } catch (PayPalConnectionException $ex) {
                echo $ex->getData();
            }
        }else{
            return redirect()->route('home')->with(['message'=>'Lo sentimos, no puede contratar otro plan porque ya cuenta con uno']);
        }
    }
    
    public function paypalStatus(Request $request){
        $paymentId=$request->input('paymentId');
        $payerId=$request->input('PayerID');
        $token=$request->input('token');

        if(!$paymentId || !$payerId || !$token){
            return redirect()->route('home')->with(['message'=>'Lo sentimos, tu pago no ha sido aprobado']);
        }

        $payment= Payment::get($paymentId, $this->apiContext);
        $execution=new PaymentExecution();
        $execution->setPayerId($payerId);

        $result=$payment->execute($execution, $this->apiContext);

        if($result->getState()==='approved'){
            $user=Auth::user();
            $user=Auth::user();
            $fecha=Carbon::now();
            $fin=Carbon::now()->addMonths(1);
            $comprar=Membresia::findOrFail(1);
            $fechainicio=$fecha->format('y-m-d');
            $fechafin=$fin->format('y-m-d');
            $total=$comprar->precio;
            $estado="activa";
            $membresiaid=1;
            $suscipcion=Suscripcion::create([
            'fechainicio'=>$fechainicio,
            'fechafin'=>$fechafin,
            'total'=>$total,
            'estado'=>$estado,
            'membresia_id'=>$membresiaid
        ]);
            $user->suscripcion_id=$suscipcion->id;
            $user->update();
            return redirect()->route('home')->with(['message'=>'Tu suscripcion ha sido aprobada']);
        }

        return redirect()->route('home')->with(['message'=>'Lo sentimos, tu pago no ha sido aprobado']);
    }
}

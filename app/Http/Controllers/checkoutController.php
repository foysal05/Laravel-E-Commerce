<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use Session;

class checkoutController extends Controller
{
    public function index()
    {
        return view('front-end.checkout.checkout-content');
    }
    public function signUp(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            'email_address' => 'required|email|unique:customers',
            'phone' => 'required|digits:11',
            'password' => 'min:6',
            'confirm_password' => 'required_with:password|same:password|min:6',
            //'address' => 'required|regex:/^[\pL\s\-]+$/u'
            'address' => 'required',

        ]);

        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->phone = $request->phone;
        $customer->password = bcrypt($request->password);
        $customer->address = $request->address;
        $customer->save();

        $customerId = $customer->id;
        Session::put('customerId', $customerId);
        Session::put('customerName', $customer->first_name . ' ' . $customer->last_name);
        $data = $customer->toArray();

        Mail::send('front-end.mails.confirmation_mail', $data, function ($message) use ($data) {

            $message->to($data['email_address']);
            $message->subject('Laravel E-Commerce Confirmation Mail');

        });

        //return redirect('checkout/shipping')->with('message','Registration Complete Successfully. Check Your Email');
        return redirect('checkout/shipping');

    }
    public function customerSignin(Request $request)
    {
        $this->validate($request, [
            'email_address' => 'required|email',
            'password' => 'required',
        ]);

        $customer = Customer::where('email_address', $request->email_address)->first();
        //return $customer->last_name;

        if (Hash::check($request->password, $customer->password)) {

            Session::put('customerId', $customer->id);
            Session::put('customerName', $customer->first_name . ' ' . $customer->last_name);
            return redirect('checkout/shipping');

        } else {
            return redirect('cart/checkout')->with('loginError', 'Incorrect Email or Password');

        }

    }
    public function ShippingForm()
    {
        $customer = Customer::find(Session::get('customerId'));

        //return $customer;
        return view('front-end.checkout.shipping', ['customer' => $customer]);
    }
    public function saveShipping(Request $request)
    {
        $shipping = new Shipping();

        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId', $shipping->id);
        return redirect('checkout/payment');

    }
    public function paymentForm()
    {
        // $customer = Customer::find(Session::get('customerId'));

        return view('front-end.checkout.payment');

    }
    public function newOrder(Request $request)
    {

        $paymentType = $request->payment_type;

        if ($paymentType == 'Cash') {

            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->total_order = 15000;
            //$order->total_order = Session::get('orderTotal');

            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity = $cartProduct->qty;
                $orderDetail->save();

            }
            Cart::destroy();
            return redirect('order/complete');

        } else if ($paymentType == 'PayPal') {

        } else {

        }

    }
    public function completeOrder()
    {
        return "Done";

    }
    public function newLogin()
    {
        $this->validate($request, [
            'email_address' => 'required|email',
            'password' => 'required',
        ]);

        $customer = Customer::where('email_address', $request->email_address)->first();
//return $customer->last_name;

        if (Hash::check($request->password, $customer->password)) {

            // Session::put('customerId', $customer->id);
            // Session::put('customerName', $customer->first_name . ' ' . $customer->last_name);
            // return redirect('checkout/shipping');
            return "Logedin";

        } else {
            return redirect('cart/checkout')->with('loginError', 'Incorrect Email or Password');

        }

    }
    public function newLoginPage()
    {
        return view('front-end.login.login');
    }
    public function newCustomerLogin(Request $request)
    {

        //return $request->email_address;
        $customer = Customer::where('email_address', $request->email_address)->first();
        if (Hash::check($request->password, $customer->password)) {

            Session::put('customerId', $customer->id);
            Session::put('customerName', $customer->first_name . ' ' . $customer->last_name);
          //  return redirect('checkout/shipping');
            return Session::get('url');

        } else {
            return redirect('customer/login')->with('loginError', 'Incorrect Email or Password');

        }

    }
    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect ('/');

    }
}

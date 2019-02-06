<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Order;

class PagesController extends Controller
{
    public function about() {

    	$data = array(
    		 'name' => 'Shahzaib', 'mobile' => '03001234567' 
    	);

        return view('about', $data);

    }

    public function services() {

    	// $ser = array(
    	// 	'1' => 'Web Development',
    	// 	'2' => 'Graphics Designing',
    	// 	'3' => 'Mobile Development',
    	//  );
    	// $ser = array(
    	// 	[1] => array('name' => 'Web', 'price' => '7823' ),
    	// 	[2] => array('name' => 'Mobile', 'price' => '1273' ),
    	// 	[3] => array('name' => 'Native', 'price' => '1563' ),
    	//  );

    	$ser = array(
    		'Web Development' => 'Rs 50,000',
    		'Graphics Designing' => 'Rs 40,000',
    		'Mobile Development' => 'Rs 60,000'
    	 );

    	$emp = array(
    		'Mr. Lee' => '03458678576',
    		'Mr. Chang' => '03212938475',
    		'Mr. Anderson' => '03008182838'
    	 );

        // return view('services', compact('ser') );
        return view('services', [ 'services' => $ser, 'employees' => $emp ] );
        
    }

    public function orders() {
    	$orders = Order::all();
    	return view('orders', [ 'orders' => $orders ]);

    }

    public function customer($id) {
    	$customer = Customer::find($id);

    	return view('customer', [ 'customer' => $customer]);
    }

}

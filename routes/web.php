<?php

use Httpful\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use JildertMiedema\LaravelPlupload\Facades\Plupload;
use Illuminate\Support\Facades\Input;

Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::resource('administradores', 'AdminsController');

//Route::prefix('admin')->namespace('Admin')->group(function() {
//
//    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
//    Route::post('login', 'Auth\LoginController@login');
//    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
//
//    Route::get('/', 'DashboardController@index')->name('dashboard');
//
//    Route::resource('administradores', 'AdminsController');
//	Route::resource('categorias', 'CategoriesController');
//	Route::resource('clientes', 'CustomersController');
//	Route::resource('empresas', 'CompaniesController');
//	Route::resource('produtos', 'ProductsController');
//    Route::resource('cupons', 'CouponsController');
//	Route::resource('pedidos', 'OrdersController');
//	Route::resource('pedidos_empresa', 'WholesaleOrdersController');
//
//    Route::get('pedido/{id}/checkout', 'OrdersController@processOrder');
//
//    Route::post('pedidos/print-tag', 'OrdersController@massActions')->name('pedidos.actions');
//    Route::get('pedido/delete/{id}', 'OrdersController@delete')->name('pedidos.delete');
//
//	Route::get('pedidos_empresa/delete/{id}', 'WholesaleOrdersController@delete')->name('pedidos_empresa.delete');
//    Route::get('pedidos_empresa/reject/{id}', 'WholesaleOrdersController@reject')->name('pedidos_empresa.reject');
//
//	Route::get('empresa/{id}/activate', 'CompaniesController@activeCompany')->name('empresas.activate');
//
//    Route::post('/pedidos_empresa/confirm', 'WholesaleOrdersController@confirm')->name('pedidos_empresa.order_confirm');
//
//	Route::post('/utils/media/upload', function() {
//        return Plupload::receive('file', function ($file) {
//            $file->move(storage_path() . '/app/public/products/', $file->getClientOriginalName());
//
//            return [
//                'filename' => $file->getClientOriginalName(),
//            	'url' => Storage::url('products/' . $file->getClientOriginalName()),
//				'path' => storage_path() . '/app/public/products/', $file->getClientOriginalName()
//			];
//        });
//    });
//
//	Route::get('/intecom/teste-conexao', 'Intecom\SoapController@testeConexao');
//    Route::get('/intecom/expedicao/{id}', 'Intecom\SoapController@expedicao');
//
//    Route::prefix('relatorios')->group(function() {
//
//    	Route::get('/vendas', 'ReportsController@vendas')->name('reports.venda');
//
//	});
//
//});
//
//Route::prefix('minha-conta')->namespace('Account')->group(function() {
//
//    Route::get('/', 'AccountController@index')->name('customer.home');
//
//    Route::get('/meus-dados', 'AccountController@edit')->name('customer.edit');
//    Route::put('/meus-dados', 'AccountController@update')->name('customer.update');
//
//    Route::get('/enderecos', 'AccountController@address')->name('customer.address');
//	Route::get('/enderecos/novo', 'AccountController@addressForm')->name('customer.address.new');
//    Route::post('/meus-dados/address', 'AccountController@addAddress');
//    Route::post('/enderecos/save', 'AccountController@addressSave')->name('customer.address.save');
//    Route::get('/enderecos/{id}/edit', 'AccountController@addressForm')->name('customer.address.edit');
//    Route::post('/enderecos/{id}/update', 'AccountController@addressSave')->name('customer.address.update');
//    Route::get('/enderecos/{id}/delete', 'AccountController@removeAddress')->name('customer.address.delete');
//
//    Route::get('/pedidos', 'OrdersController@index')->name('customer.orders');
//    Route::get('/pedido/{id}', 'OrdersController@detail')->name('customer.order_detail');
//    Route::get('/pedido/{id}/checkout', 'OrdersController@processOrder');
//
//});
//
//Route::prefix('empresas')->namespace('Business')->group(function() {
//
//	Route::get('/', 'AccountController@index')->name('business.home');
//
//	Route::get('login', 'Auth\LoginController@showLoginForm')->name('business.login');
//	Route::post('login', 'Auth\LoginController@login');
//	Route::post('logout', 'Auth\LoginController@logout')->name('business.logout');
//	Route::get('cadastro', 'Auth\RegisterController@showRegistrationForm')->name('business.register.form');
//	Route::post('cadastro', 'Auth\RegisterController@register')->name('business.register');
//
//    Route::get('/meus-dados', 'AccountController@index')->name('business.edit');
//
//    Route::get('/enderecos', 'AccountController@addressIndex')->name('business.address');
//    Route::get('/enderecos/novo', 'AccountController@addressForm')->name('business.address.new');
//    Route::post('/meus-dados/address', 'AccountController@addAddress');
//    Route::post('/enderecos/save', 'AccountController@addressSave')->name('business.address.save');
//    Route::get('/enderecos/{id}/edit', 'AccountController@addressForm')->name('business.address.edit');
//    Route::post('/enderecos/{id}/update', 'AccountController@addressSave')->name('business.address.update');
//    Route::get('/enderecos/{id}/delete', 'AccountController@removeAddress')->name('business.address.delete');
//
//    Route::get('/pedidos', 'OrdersController@index')->name('business.orders');
//    Route::get('/pedidos/novo', 'OrdersController@create')->name('business.order_new');
//    Route::post('/pedidos/confirm', 'OrdersController@confirm')->name('business.order_confirm');
//    Route::post('/pedidos/save', 'OrdersController@store')->name('business.order_store');
//    Route::get('/pedido/{id}', 'OrdersController@detail')->name('business.order_detail');
//    Route::get('/pedidos/novo/sucesso', function() {
//        return view('business.orders.success');
//    })->name('business.order_success');
//
//    Route::get('/company/{id}/addresses', 'AccountController@addresses');
//
//    Route::get('/empresas', 'CompaniesController@index')->name('business.companies');
//    Route::get('/empresas/nova', 'CompaniesController@create')->name('business.companies.new');
//    Route::post('/empresas/save', 'CompaniesController@store')->name('business.companies.save');
//    Route::get('/empresa/{id}', 'CompaniesController@edit')->name('business.companies.edit');
//    Route::put('/empresa/{id}', 'CompaniesController@update')->name('business.companies.update');
//    Route::delete('/empresa/{id}', 'CompaniesController@destroy')->name('business.companies.delete');
//
//});
//
//// Route::get('/empresas/enderecos', function() {
//
////     $this->pageOpts['company_id'] = Input::get('company_id');
//
////     if ( $this->pageOpts['company_id'] ) {
//
////         $company = \Site\Entities\Company::with('addresses.cidade')->find($this->pageOpts['company_id']);
////         $this->pageOpts['rows'] = $company->addresses;
//
////     }
//
//
////     return response()->json($company->addresses);
//
//// });
//
//Route::get('/import', function(\Site\Services\CustomerService $service) {
//
//	$addresses = \Site\Entities\Address::whereNotNull('locality')->get();
//
//	foreach ($addresses as $add) {
//
//		if ( !is_numeric($add->locality) ) {
//
//			$cidade = \Site\Entities\City::where('name', $add->locality)
//						->where('state', $add->region)
//						->first();
//
//			if ( $cidade ) {
//
//				echo $add->locality.' - '.$add->region.' -> '.$cidade->id.' -> '.$cidade->name.' - '.$cidade->state;
//				echo '<br />';
//				// $add->locality = $cidade->id;
//				// $add->save();
//
//			}
//
//		}
//
//	}
//
//
//
//    // $filePath = storage_path('app/public/imports/clientes_konjac.csv');
//
//    // $file = fopen($filePath, 'r');
//    // $entries = [];
//
//    // $headers = [];
//
//    // $row = 1;
//
//    // while ( ($data = fgetcsv($file, 1024, ';')) !== false) {
//
//    //     if ( $row === 1 ) {
//    //         $headers = $data;
//    //         $row++;
//    //     } else {
//    //         array_push($entries, array_combine($headers, $data));
//    //     }
//
//    // }
//
//    // foreach ($entries as $entry) {
//
//    //     $ultima_compra = '';
//
//    //     if ( $entry['ultima_compra'] !== '' && $entry['ultima_compra'] !== 'NULL' ) {
//    //         $ultima_compra = \Carbon\Carbon::createFromFormat('d/m/Y', $entry['ultima_compra']);
//    //     }
//
//    //     $data = \Carbon\Carbon::createFromFormat('d/m/Y', $entry['data']);
//
//    //     $customerData = [
//    //         'type' => 'pf',
//    //         'email' => $entry['email'],
//    //         'national_id' => $entry['cpf_cnpj'],
//    //         'first_name' => $entry['nome'],
//    //         'phone' => $entry['telefone'],
//    //         'total_consumido' => $entry['total_consumido'],
//    //         'total_compras' => $entry['numero_compras'],
//    //         'importado' => true,
//    //         'ultima_compra' => $ultima_compra?$ultima_compra->format('Y-m-d'):null,
//    //         'created_at' => $data->format('Y-m-d H:i:s'),
//    //         'cadastro_nuvem' => $entry['cadastrado']==='SIM'?true:false
//    //     ];
//
//    //     $customer = \Site\Entities\Customer::create($customerData);
//
//    //     $cidade = \Site\Entities\City::where('name', $entry['cidade'])->get();
//
//    //     $customer->addresses()->create([
//    //         'street_address' => $entry['endereco'],
//    //         'street_address_complement' => $entry['complemento'],
//    //         'number' => $entry['numero'],
//    //         'locality' => $entry['cidade'],
//    //         'region' => count($cidade)>0?$cidade[0]->state:'',
//    //         'district' => $entry['bairro'],
//    //         'postal_code' => $entry['cep']
//    //     ]);
//
//    // }
//
//});
//
//Route::get('/import_cnpj', function(\Site\Services\CompanyService $service) {
//
//    $filePath = storage_path('app/public/imports/clientes_cnpj.csv');
//
//    $file = fopen($filePath, 'r');
//    $entries = [];
//
//    $headers = [];
//
//    $row = 1;
//
//    while ( ($data = fgetcsv($file, 1024, ';')) !== false) {
//
//        array_pop($data);
//
//        if ( $row === 1 ) {
//            $headers = $data;
//            $row++;
//        } else {
//            array_push($entries, array_combine($headers, $data));
//        }
//
//    }
//
//    foreach ($entries as $entry) {
//
////        $endereco = $entry['endereco'];
////
////        $matches = [];
////
////        $regex = preg_match('/([0-9]{8})/', $endereco, $matches );
////
////        dd( [$endereco, $matches] );
//
//        $companyData = [
//            'int_code' => $entry['codigo'],
//            'company_name' => $entry['razao_social'],
//            'business_name' => $entry['razao_social'],
//            'business_phone' => $entry['telefone'],
//            'national_id' => $entry['cnpj'],
//            'state_registration' => $entry['inscricao_estadual'],
//            'email' => $entry['e-mail'],
//        ];
//
//       	$company = \Site\Entities\Company::create($companyData);
//
//    }
//
//});
//
//Route::get('/reintegrate', function() {
//
//    $customers = \Site\Entities\Customer::where('importado', '1')->where('email','alxmedeiros@gmail.com')->where('cadastro_nuvem', '0')->get();
//
//    dd( count($customers) );
//
//    foreach( $customers as $customer ) {
//
//    	$user = \Site\Entities\User::where('email', $customer->email)->get();
//    	// $user = \Site\Entities\User::where('email', 'alxmedeiros@gmail.com')->first();
//
//    	if ( !$user ) {
//
//    		$token = app('auth.password.broker')->createToken($user);
//
//    		$params = [
//	    		'token' => $token,
//				'user' => $user
//			];
//
//			$res = Mail::send('emails.account.reintegrate', $params, function ($message) use ($params) {
//				$message->to($params['user']->email);
//				$message->subject('Konjac Massa MF :: Novo site');
//			});
//
//			$customer->cadastro_nuvem = 1;
//			$customer->save();
//
//    	}
//
//    	// $user = \Site\Entities\User::create([
//     //        'name'=>$customer->first_name.' '.$customer->last_name,
//     //        'email'=>$customer->email,
//     //        'customer_id'=>$customer->id,
//     //        'email_token'=>base64_encode($customer->email)
//     //    ]);
//    }
//
//    // dd( count($customers) );
//
//});
//
//Route::get('/sendemail/{id}', function ($id) {
//
//    $customer = \Site\Entities\Customer::find($id);
//
//    $params = ['user' => $customer];
//
//    Mail::send('emails.order.new_order', $params, function ($message) use ($params) {
//        $message->to($params['user']->email);
//        $message->subject('Konjac Massa MF :: Teste');
//    });
//
//	// $order = \Site\Entities\WholesaleOrder::find($id);
//
//	// // $fileContents = base64_encode( file_get_contents($order->nfe_xml) );
//	// $file = file_get_contents( Config::get('app.url').$order->nfe_xml );
//
//	// dd($file);
//
//    // $company = \Site\Entities\Company::find($id);
//
//    // event(new \Site\Events\BusinessRegistered($company));
//
////	$user = \Site\Entities\User::find(4);
////
////	event(new Registered($user));
////
//    // return response()->json(['message' => $company]);
//
//});
//
//Route::get('/teste/{id}', function ($id) {
//
//    $company = \Site\Entities\Company::find($id);
//
//    event(new \Site\Events\BusinessRegistered($company));
//
//});
//
//Route::get('/ajuste/{id}/coupon/{coupon?}', function($id, $coupon = null) {
//
//	$order = \Site\Entities\Order::find($id);
//
//	$cart = new \Site\Entities\Order\Cart();
//
//	foreach($order->items as $item) {
//		$produto = \Site\Entities\Product::find($item->product_id);
//
//		$item = new \Site\Entities\Order\Item(utf8_encode($item->name), $produto->price, $item->qty, 'Asset', substr(strip_tags(utf8_encode($produto->description)), 0, 250) , $item->sku, $item->weight*1000);
//		$cart->add($item);
//
//	}
//
//    if ( isset($coupon) ) {
//
//        $coupon = \Site\Entities\Coupon::where('coupon_code', $coupon)
//            ->latest()
//            ->first();
//
//        if ( $coupon ) {
//            if( !$coupon->isValid()) {
//                $coupon = '';
//            } else {
//                if ( $coupon->amount_type === 'amount' ) {
//                    $cart->setValueDiscount($coupon->amount);
//                } else {
//                    $cart->setPercentualDiscount($coupon->amount/100);
//                }
//            }
//        }
//
//    }
//
//	$cartOrder = new \Site\Entities\Order\CartOrder(config('cielo.merchant_id'));
//
//	$shippingOrder = $order->metodoEntrega;
//
//	$services = [
//		[
//			'Name' => $shippingOrder->carrier.' '.$shippingOrder->service_description,
//			'Price' => $order->shipping_amount*100,
//			'Deadline' => $order->delivery_time,
//		]
//	];
//
//	$shippingAddress = \Site\Entities\Address::find($order->shipping_address);
//
//	$shipping = new \Site\Entities\Order\Shipping(
//		'FixedAmount',
//		'58038100',
//		$shippingAddress->postal_code,
//		null,
//		$services
//	);
//
//	$cieloCustomer = new \Site\Entities\Order\Customer(
//		preg_replace_array('/\D+/', [''], $order->customer->national_id),
//		$order->customer->first_name,
//		$order->customer->email,
//		preg_replace_array('/\D+/', [''], $order->customer->phone)
//	);
//
//	$cartOrder->setShipping($shipping);
//	$cartOrder->setCart($cart);
//	$cartOrder->setCustomer($cieloCustomer);
//
//	echo $cartOrder->request($order);
//
//});
//
//Route::get('/cep_check/{id}/{cep}', function($id, $cep) {
//
//	try {
//
//		$response = Request::get('https://viacep.com.br/ws/'.$cep.'/json/')
//			->addHeaders(array(
//				'ContentType' => 'application/json'
//			))
//			->send();
//
//		if ( $response->code === 200 || $response->code === 201 ) {
//			if( isset($response->body->erro) ) {
//				throw new \Exception('CEP Inválido',404);
//			}
//		} else {
//			throw new \Exception($response->body->Message, $response->code);
//		}
//
//		$order = \Site\Entities\Order::find($id);
//
//		$shippingItemArr = [];
//
//		foreach ($order->items as $item) {
//			$shipItem = [
//				'Weight' => $item->weight,
//				'Length' => $item->length,
//				'Height' => $item->height,
//				'Width' => $item->width,
//				'Quantity' => $item->qty,
//				'SKU' => $item->sku
//			];
//
//			$shippingItemArr[] = $shipItem;
//		}
//
//		$_payload = [
//			'SellerCEP' => '58038102',
//			'RecipientCEP' => preg_replace('/\D+/', '', $cep),
//			'ShipmentInvoiceValue' => $order->total,
//			'RecipientCountry' => 'BR',
//			'ShippingItemArray' => $shippingItemArr
//		];
//
//		$frenetSDK = \Site\Utils\Frenet::init('8220EA37R3D49R43EBR9641R17C4767DAB02');
//
//		$shippingQuote = $frenetSDK->getShippingQuote( $_payload );
//
//		$resultQuote = [];
//
//		foreach($shippingQuote->ShippingSevicesArray as $serviceQuote) {
//
//			if ( isset($serviceQuote->ShippingPrice) ) {
//
//				$shippingMethod = \Site\Entities\ShippingMethod::where('service_code', $serviceQuote->ServiceCode)
//					->where('carrier', $serviceQuote->Carrier)
//					->first();
//
//				if ( $shippingMethod !== null && ($serviceQuote->Msg == 'OK' || $serviceQuote->Msg == '') ) {
//
//					$resultQuote[] = [
//						'id' => $shippingMethod->id,
//						'carrier' => $shippingMethod->carrier,
//						'description' => $shippingMethod->service_description,
//						'code' => $shippingMethod->service_code,
//						'delivery_time' => $serviceQuote->DeliveryTime,
//						'price' => $serviceQuote->ShippingPrice
//					];
//
//				}
//
//			}
//
//		}
//
//		$correios = array_where($resultQuote, function($value, $key) {
//			return $value['carrier'] == 'Correios';
//		});
//
//		if ( !count($correios) ) {
//			$shippingMethod = \Site\Entities\ShippingMethod::where('service_code', '04510')
//				->where('carrier', 'Correios')
//				->first();
//
//			$resultQuote[] = [
//				'id' => $shippingMethod->id,
//				'carrier' => $shippingMethod->carrier,
//				'description' => $shippingMethod->service_description,
//				'code' => $shippingMethod->service_code,
//				'delivery_time' => '12',
//				'price' => '37.00'
//			];
//		}
//
//		if ( count($resultQuote) ) {
//			return response()->json($resultQuote);
//		} else {
//			return response('O cep escolhido não pode ser atendido.', 400);
//		}
//
//	} catch (Exception $ex) {
//		dd($ex);
//	}
//
//});
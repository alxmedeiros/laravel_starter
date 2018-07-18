<?php

namespace Site\Http\Controllers\Utils;

use Gloudemans\Shoppingcart\Cart;
use http\Exception;
use Httpful\Request;
use Site\Entities\ShippingMethod;
use Site\Http\Controllers\CommonController;

class FrenetController extends CommonController {

    private $frenetSDK;

    public function __construct() {

        parent::__construct();

        $this->frenetSDK = \Site\Utils\Frenet::init('8220EA37R3D49R43EBR9641R17C4767DAB02');

    }

    private function checkPostalCode($postal_code) {
        $response = \Httpful\Request::get('https://viacep.com.br/ws/'.$postal_code.'/json/')
                    ->addHeaders(array(
                        'ContentType' => 'application/json'
                    ))->send();

        if ( $response->code === 200 || $response->code === 201 ) {
        	if( isset($response->body->erro) ) {
                throw new \Exception('CEP Inválido', 400);
            }
        } else {
            throw new \Exception(isset($response->body->Message)?$response->body->Message:'Não encontrado', 400);
        }
    }

    public function shippingQuote($cep) {

        try {

        	$this->checkPostalCode($cep);

			// $response = Request::get('https://viacep.com.br/ws/'.$cep.'/json/')
			// 	->addHeaders(array(
			// 		'ContentType' => 'application/json'
			// 	))
			// 	->send();

			// if ( $response->code === 200 || $response->code === 201 ) {
			// 	if( isset($response->body->erro) ) {
			// 		throw new \Exception('CEP Inválido',404);
			// 	}
			// } else {
			// 	throw new \Exception(isset($response->body->Message)?$response->body->Message:'Não encontrado', $response->code);
			// }

        	$cartContent = $this->cart->content();

        	$shippingItemArr = [];

        	$totalItens = 0;

        	foreach ($cartContent as $item) {
        		$shipItem = [
					'Weight' => $item->model->weight,
					'Length' => $item->model->length,
					'Height' => $item->model->height,
					'Width' => $item->model->width,
					'Quantity' => $item->qty,
					'SKU' => $item->model->sku
				];

				$totalItens += $item->qty;

        		$shippingItemArr[] = $shipItem;
			}

			$resultQuote = [];

			if ( $totalItens >= 5 ) {
            //if ( $totalItens >= 25 ) {

				$resultQuote[] = [
                    'id' => 5,
                    'carrier' => 'Konjac',
                    'description' => 'Frete Grátis',
                    'code' => 'FREE_SHIPPING',
                    'delivery_time' => '14',
                    'price' => '0.00'
                ];

                return response()->json($resultQuote);

			}

            $_payload = [
                'SellerCEP' => '58038102',
                'RecipientCEP' => preg_replace('/\D+/', '', $cep),
                'ShipmentInvoiceValue' => $this->cart->total(null, '.', ''),
                'RecipientCountry' => 'BR',
                'ShippingItemArray' => $shippingItemArr
            ];

            $shippingQuote = $this->frenetSDK->getShippingQuote( $_payload );

            foreach($shippingQuote->ShippingSevicesArray as $serviceQuote) {

                if ( isset($serviceQuote->ShippingPrice) ) {

                    $shippingMethod = ShippingMethod::where('service_code', $serviceQuote->ServiceCode)
                                            ->where('carrier', $serviceQuote->Carrier)
                                            ->first();

					if ( $shippingMethod !== null && ($serviceQuote->Msg == 'OK' || $serviceQuote->Msg == '') ) {

                        $resultQuote[] = [
                            'id' => $shippingMethod->id,
                            'carrier' => $shippingMethod->carrier,
                            'description' => $shippingMethod->service_description,
                            'code' => $shippingMethod->service_code,
                            'delivery_time' => $serviceQuote->DeliveryTime,
                            'price' => $serviceQuote->ShippingPrice
                        ];

                    }

                }

			}

			$correios = array_where($resultQuote, function($value, $key) {
				return $value['carrier'] == 'Correios';
			});

			if ( !count($correios) ) {
				$shippingMethod = \Site\Entities\ShippingMethod::where('service_code', '04510')
					->where('carrier', 'Correios')
					->first();

				$resultQuote[] = [
					'id' => $shippingMethod->id,
					'carrier' => $shippingMethod->carrier,
					'description' => $shippingMethod->service_description,
					'code' => $shippingMethod->service_code,
					'delivery_time' => '12',
					'price' => '37.00'
				];
			}

			if ( count($resultQuote) ) {
				return response()->json($resultQuote);
			} else {
				return response('O cep escolhido não pode ser atendido.', 400);
			}

        } catch (\Exception $ex) {
        	return response($ex->getMessage(), 400);
        }

    }

}

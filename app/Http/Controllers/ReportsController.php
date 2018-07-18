<?php
namespace Site\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Site\Entities\Category;
use Site\Entities\OrderStatus;
use Site\Entities\Product;
use Site\Services\ProductService;

use Site\Services\Order;
use Site\Services\OrderItem;

class ReportsController extends CrudController {

	public function __construct(ProductService $service)
	{

		parent::__construct();
		
		$this->service = $service;

//		$this->pageDefaults = [
//			'class' => Product::class,
//			'list' => [
//				'title' => 'Produtos',
//                'action' => 'admin.products.page-action',
//				'view' => 'admin.products.list',
//				'policy' => 'view_product'
//			],
//			'create' => [
//				'title' => 'Novo produto',
//				'view' => 'admin.products.form',
//				'route' => 'produtos.create',
//				'policy' => 'create_product'
//			],
//			'save' => [
//				'message' => 'Produto criado com sucesso',
//				'route' => 'produtos.index',
//				'policy' => 'create_product'
//			],
//			'edit' => [
//				'title' => 'Editar produto',
//                'action' => '',
//				'view' => 'admin.products.form',
//				'policy' => 'update_product'
//			],
//			'update' => [
//				'message' => 'Produto editado com sucesso',
//				'policy' => 'update_product',
//				'route' => 'produtos.index'
//			],
//			'destroy' => [
//				'message' => 'Produto removido com sucesso',
//				'route' => 'produtos.index',
//				'policy' => 'delete_product'
//			]
//		];

        $this->pageOpts = [
            'pageStyles' => [
                '/themes/remark/assets/vendor/datatables.net-bs4/dataTables.bootstrap4.css',
                '/themes/remark/assets/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css',
                '/themes/remark/assets/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css',
                '/themes/remark/assets/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css',
                '/themes/remark/assets/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css',
                '/themes/remark/assets/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css',
                '/themes/remark/assets/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css',
                '/themes/remark/assets/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css',
                '/themes/remark/assets/examples/css/tables/datatable.css',
				'/themes/remark/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.css'
            ],
            'pagePlugins' => [
                '/themes/remark/assets/vendor/datatables.net/jquery.dataTables.js',
                '/themes/remark/assets/vendor/datatables.net-bs4/dataTables.bootstrap4.js',
                '/themes/remark/assets/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js',
                '/themes/remark/assets/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js',
                '/themes/remark/assets/vendor/datatables.net-rowgroup/dataTables.rowGroup.js',
                '/themes/remark/assets/vendor/datatables.net-scroller/dataTables.scroller.js',
                '/themes/remark/assets/vendor/datatables.net-select-bs4/dataTables.select.js',
                '/themes/remark/assets/vendor/datatables.net-responsive/dataTables.responsive.js',
                '/themes/remark/assets/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js',
                '/themes/remark/assets/vendor/datatables.net-buttons/dataTables.buttons.js',
                '/themes/remark/assets/vendor/datatables.net-buttons/buttons.html5.js',
                '/themes/remark/assets/vendor/datatables.net-buttons/buttons.flash.js',
                '/themes/remark/assets/vendor/datatables.net-buttons/buttons.print.js',
                '/themes/remark/assets/vendor/datatables.net-buttons/buttons.colVis.js',
                '/themes/remark/assets/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js',
				'/themes/remark/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.js'
            ],
            'pageScripts' => [
                '/themes/remark/assets/js/Plugin/datatables.js',
				'/themes/remark/assets/js/Plugin/bootstrap-datepicker.js'
            ],
        ];

	}

	public function vendas(Request $request) {

		$inputs = $request->all();

		if ( $inputs ) {
//			dd( $inputs );

			$groupDate = 'DATE';

			switch ( $inputs['group_by'] ) {
				case 'month': $groupDate = 'MONTH'; break;
				case 'year': $groupDate = 'YEAR'; break;
				default: $groupDate = 'DATE';
			}

			if ( isset($inputs['start']) ) {
				$inputs['start'] = Carbon::createFromFormat('d/m/Y', $inputs['start']);
			}

			if ( isset($inputs['end']) ) {
				$inputs['end'] = Carbon::createFromFormat('d/m/Y', $inputs['end']);
			}

			if ( $inputs['type'] === 'pf' ) {

				// $query = '
				// SELECT DATE(orders.created_at) AS date, COUNT(orders.id) as orders, SUM(orders.total) as total_amount, 
				// 	SUM(orders.shipping_price) as total_shipping, SUM(orders.discount_amount) as total_discount, 
				// 	(SELECT SUM(order_items.qty) FROM order_items WHERE order_id IN (orders.id) GROUP BY orders.id) as itens_ordered 
				// FROM orders';

				$report = DB::table('orders')
								->select(
									DB::raw($groupDate.'(orders.'.$inputs['filter_by'].') AS date, COUNT(orders.id) as orders, SUM(orders.total) as total_amount, SUM(orders.shipping_price) as total_shipping, SUM(orders.discount_amount) as total_discount'),
									DB::raw('(SELECT SUM(order_items.qty) FROM order_items WHERE order_id IN (orders.id) GROUP BY order_id) as itens_ordered')
								)
								->groupBy('date');
				// $where = [];

				if ( isset($inputs['start']) && isset($inputs['end']) ) {
					// array_push($where, 'DATE(orders.'.$inputs['filter_by'].') BETWEEN "'.$inputs['start']->format('Y-m-d').'" AND "'.$inputs['end']->format('Y-m-d').'"');
					$report->whereRaw('DATE(orders.'.$inputs['filter_by'].') BETWEEN ? AND ?', [$inputs['start']->format('Y-m-d'), $inputs['end']->format('Y-m-d')]);
				} elseif ( isset($inputs['start']) && !isset($inputs['end']) ) {
					// array_push($where, 'DATE(orders.'.$inputs['filter_by'].') >= '.$inputs['start']->format('Y-m-d'));
					$report->whereRaw('DATE(orders.'.$inputs['filter_by'].') >= ?', [$inputs['start']->format('Y-m-d')]);
				} elseif ( !isset($inputs['start']) && isset($inputs['end']) ) {
					// array_push($where, 'DATE(orders.'.$inputs['filter_by'].') <= '.$inputs['end']->format('Y-m-d'));
					$report->whereRaw('DATE(orders.' . $inputs['filter_by'].') <= ?', [$inputs['end']->format('Y-m-d')]);
				}

				if ( isset($inputs['status']) && count($inputs['status']) > 0 ) {
					$report->whereIn('orders.status', $inputs['status']);
					// array_push($where, 'orders.status = "'.$inputs['status'].'"');
				}

				// dd( $report->toSql() );

				// if ( count($where) ) {
				// 	$query .= ' WHERE '.implode(' AND ', $where);
				// }

				// $query .= ' GROUP BY date';

				// echo $query;

				// $report = DB::select($query);

				$report = $report->get();

				$this->pageOpts['results'] = $report;

			} else {

			}

		}

		$this->pageOpts['status'] = OrderStatus::all();

		return view('admin.reports.vendas', $this->pageOpts);

	}

}
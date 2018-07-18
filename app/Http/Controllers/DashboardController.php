<?php
/**
 * Created by IntelliJ IDEA.
 * User: alexandre
 * Date: 14/09/17
 * Time: 16:09
 */

namespace Site\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends CrudController {

	public function index(Request $request) {

		$pageOpts = [
			'pageStyles' => [
				'/themes/remark/assets/vendor/chartist/chartist.css',
				'/themes/remark/assets/vendor/aspieprogress/asPieProgress.min.css',
				'/themes/remark/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css',
				'/themes/remark/assets/examples/css/dashboard/ecommerce.min.css',
			],
			'pagePlugins' => [
				'/themes/remark/assets/vendor/chartist/chartist.min.js',
				'/themes/remark/assets/vendor/aspieprogress/jquery-asPieProgress.min.js',
				'/themes/remark/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js',
			],
			'pageScripts' => [
				'/themes/remark/assets/js/Plugin/aspieprogress.js',
				'/themes/remark/assets/examples/js/dashboard/ecommerce.js',
			]
		];

		return view('admin.dashboard', $pageOpts);

	}

	public function teste() {


	}

}
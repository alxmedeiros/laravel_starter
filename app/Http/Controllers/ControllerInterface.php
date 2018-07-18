<?php
/**
 * Created by IntelliJ IDEA.
 * User: foccus
 * Date: 29/08/17
 * Time: 16:46
 */

namespace Site\Http\Controllers;

use Illuminate\Http\Request;

interface ControllerInterface {

	public function populateFormSelects();

	public function beforeStore(Request $request);
	public function afterStore(Request $request, $result);

    public function beforeUpdate(Request $request, $id);
    public function afterUpdate(Request $request, $id);

    public function beforeSave(Request $request);
    public function afterSave(Request $request);

}
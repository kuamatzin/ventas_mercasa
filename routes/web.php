<?php

Route::get('/', function () {
    return redirect('/home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('projects', 'ProjectController');
Route::get('sales/avaliable/{project_id}', 'SaleController@avaliableApartments');
Route::put('sales/register_new_pregrade/{sale}', 'SaleController@registerNewPregrade');
Route::put('sales/deletePregrade/{sale}', 'SaleController@deletePregrade');
Route::put('sales/updatePregrade/{sale}', 'SaleController@updatePregrade');
Route::put('sales/uploadReceipt/{sale}', 'SaleController@uploadReceipt');
Route::resource('sales', 'SaleController');
Route::resource('apartments', 'ApartmentController');

Route::get('carta_compromiso/{sale}', 'ContratoController@cartaCompromiso');
Route::get('contrato_compra_venta/{sale}', 'ContratoController@contratoCompraVenta');
Route::get('contrato_compra_venta_sin_enganche/{sale}', 'ContratoController@contratoCompraVenta');
Route::get('poliza_garantia/{sale}', 'ContratoController@polizaGarantia');

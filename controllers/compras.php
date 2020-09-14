<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// Build our Editor instance and process the data coming from _POST
$db->sql( 'set names utf8' );

Editor::inst( $db, 'compras' )
	->fields(
		Field::inst( 'Clasificacion' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'la clasificacion es requerida' )	
			) ),
		Field::inst( 'idProveedor' )
			->validator( Validate::numeric() )
			->setFormatter( Format::notEmpty(null) ),
		Field::inst( 'Proveedor' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'el proveedor es requerido' )	
			) ),
		Field::inst( 'Fecha' )
			->validator( Validate::dateFormat( 'y-m-d' ) )
			->getFormatter( Format::dateSqlToFormat( 'y-m-d' ) )
			->setFormatter( Format::dateFormatToSql('y-m-d' ) ),
		Field::inst( 'No_documento' )
			->validator( Validate::numeric() )
			->setFormatter( Format::notEmpty(null) ),
		Field::inst( 'Documento_fiscal' )
			->validator( Validate::notEmpty( ValidateOptions::inst() ) ),
		Field::inst( 'Sub_Total' )
			->validator( Validate::numeric() )
			->setFormatter( Format::notEmpty(null) ),
		Field::inst( 'Importe_excento' )
			->validator( Validate::numeric() )
			->setFormatter( Format::notEmpty(null) ),
		Field::inst( '15_Porciento' )
			->validator( Validate::numeric() )
			->setFormatter( Format::notEmpty(null) ),
		Field::inst( 'Total' )
			->validator( Validate::numeric() )
			->setFormatter( Format::notEmpty(null) ),
		Field::inst( 'Concepto' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'el concepto es requerido' )	
		) ),
		Field::inst( 'Saldo' )
			->validator( Validate::numeric() )
			->setFormatter( Format::notEmpty(null) ),
		Field::inst( 'IdFormadePago' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'la Forma de pago es requerida' )	
		) ),
		Field::inst( 'Referencia' )
			->validator( Validate::ifEmpty( ValidateOptions::inst()
		) )
	)
	->process( $_POST )
	->json();

<?php


/**
 * This class defines the structure of the 'curriculum' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 10/15/15 00:21:45
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CurriculumTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CurriculumTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('curriculum');
		$this->setPhpName('Curriculum');
		$this->setClassname('Curriculum');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('CUR_ID', 'CurId', 'INTEGER', true, 11, null);
		$this->addColumn('CUR_CARTA_PRESENTACION', 'CurCartaPresentacion', 'VARCHAR', false, 1024, null);
		$this->addColumn('CUR_NOMBRE_ARCHIVO', 'CurNombreArchivo', 'VARCHAR', false, 100, null);
		$this->addColumn('CUR_RUTA', 'CurRuta', 'VARCHAR', false, 100, null);
		$this->addColumn('CUR_NOMBRE', 'CurNombre', 'VARCHAR', false, 100, null);
		$this->addColumn('CUR_RUT', 'CurRut', 'VARCHAR', false, 15, null);
		$this->addColumn('CUR_TELEFONO', 'CurTelefono', 'VARCHAR', false, 15, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // CurriculumTableMap
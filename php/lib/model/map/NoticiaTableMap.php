<?php


/**
 * This class defines the structure of the 'noticia' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 10/26/15 21:56:52
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class NoticiaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.NoticiaTableMap';

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
		$this->setName('noticia');
		$this->setPhpName('Noticia');
		$this->setClassname('Noticia');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('NOT_ID', 'NotId', 'INTEGER', true, 11, null);
		$this->addColumn('NOT_TITULO', 'NotTitulo', 'LONGVARCHAR', false, null, null);
		$this->addColumn('NOT_URL', 'NotUrl', 'LONGVARCHAR', false, null, null);
		$this->addColumn('NOT_IMAGEN', 'NotImagen', 'VARCHAR', false, 255, null);
		$this->addColumn('NOT_DESCRIPCION', 'NotDescripcion', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
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
			'symfony_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
		);
	} // getBehaviors()

} // NoticiaTableMap

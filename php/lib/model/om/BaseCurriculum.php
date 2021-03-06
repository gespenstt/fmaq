<?php

/**
 * Base class that represents a row from the 'curriculum' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 12/09/15 19:25:01
 *
 * @package    lib.model.om
 */
abstract class BaseCurriculum extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CurriculumPeer
	 */
	protected static $peer;

	/**
	 * The value for the cur_id field.
	 * @var        int
	 */
	protected $cur_id;

	/**
	 * The value for the cur_carta_presentacion field.
	 * @var        string
	 */
	protected $cur_carta_presentacion;

	/**
	 * The value for the cur_nombre_archivo field.
	 * @var        string
	 */
	protected $cur_nombre_archivo;

	/**
	 * The value for the cur_ruta field.
	 * @var        string
	 */
	protected $cur_ruta;

	/**
	 * The value for the cur_nombre field.
	 * @var        string
	 */
	protected $cur_nombre;

	/**
	 * The value for the cur_rut field.
	 * @var        string
	 */
	protected $cur_rut;

	/**
	 * The value for the cur_telefono field.
	 * @var        string
	 */
	protected $cur_telefono;

	/**
	 * The value for the cur_destacado field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $cur_destacado;

	/**
	 * The value for the cur_email field.
	 * @var        string
	 */
	protected $cur_email;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	// symfony behavior
	
	const PEER = 'CurriculumPeer';

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->cur_destacado = 0;
	}

	/**
	 * Initializes internal state of BaseCurriculum object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [cur_id] column value.
	 * 
	 * @return     int
	 */
	public function getCurId()
	{
		return $this->cur_id;
	}

	/**
	 * Get the [cur_carta_presentacion] column value.
	 * 
	 * @return     string
	 */
	public function getCurCartaPresentacion()
	{
		return $this->cur_carta_presentacion;
	}

	/**
	 * Get the [cur_nombre_archivo] column value.
	 * 
	 * @return     string
	 */
	public function getCurNombreArchivo()
	{
		return $this->cur_nombre_archivo;
	}

	/**
	 * Get the [cur_ruta] column value.
	 * 
	 * @return     string
	 */
	public function getCurRuta()
	{
		return $this->cur_ruta;
	}

	/**
	 * Get the [cur_nombre] column value.
	 * 
	 * @return     string
	 */
	public function getCurNombre()
	{
		return $this->cur_nombre;
	}

	/**
	 * Get the [cur_rut] column value.
	 * 
	 * @return     string
	 */
	public function getCurRut()
	{
		return $this->cur_rut;
	}

	/**
	 * Get the [cur_telefono] column value.
	 * 
	 * @return     string
	 */
	public function getCurTelefono()
	{
		return $this->cur_telefono;
	}

	/**
	 * Get the [cur_destacado] column value.
	 * 
	 * @return     int
	 */
	public function getCurDestacado()
	{
		return $this->cur_destacado;
	}

	/**
	 * Get the [cur_email] column value.
	 * 
	 * @return     string
	 */
	public function getCurEmail()
	{
		return $this->cur_email;
	}

	/**
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Set the value of [cur_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Curriculum The current object (for fluent API support)
	 */
	public function setCurId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cur_id !== $v) {
			$this->cur_id = $v;
			$this->modifiedColumns[] = CurriculumPeer::CUR_ID;
		}

		return $this;
	} // setCurId()

	/**
	 * Set the value of [cur_carta_presentacion] column.
	 * 
	 * @param      string $v new value
	 * @return     Curriculum The current object (for fluent API support)
	 */
	public function setCurCartaPresentacion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cur_carta_presentacion !== $v) {
			$this->cur_carta_presentacion = $v;
			$this->modifiedColumns[] = CurriculumPeer::CUR_CARTA_PRESENTACION;
		}

		return $this;
	} // setCurCartaPresentacion()

	/**
	 * Set the value of [cur_nombre_archivo] column.
	 * 
	 * @param      string $v new value
	 * @return     Curriculum The current object (for fluent API support)
	 */
	public function setCurNombreArchivo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cur_nombre_archivo !== $v) {
			$this->cur_nombre_archivo = $v;
			$this->modifiedColumns[] = CurriculumPeer::CUR_NOMBRE_ARCHIVO;
		}

		return $this;
	} // setCurNombreArchivo()

	/**
	 * Set the value of [cur_ruta] column.
	 * 
	 * @param      string $v new value
	 * @return     Curriculum The current object (for fluent API support)
	 */
	public function setCurRuta($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cur_ruta !== $v) {
			$this->cur_ruta = $v;
			$this->modifiedColumns[] = CurriculumPeer::CUR_RUTA;
		}

		return $this;
	} // setCurRuta()

	/**
	 * Set the value of [cur_nombre] column.
	 * 
	 * @param      string $v new value
	 * @return     Curriculum The current object (for fluent API support)
	 */
	public function setCurNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cur_nombre !== $v) {
			$this->cur_nombre = $v;
			$this->modifiedColumns[] = CurriculumPeer::CUR_NOMBRE;
		}

		return $this;
	} // setCurNombre()

	/**
	 * Set the value of [cur_rut] column.
	 * 
	 * @param      string $v new value
	 * @return     Curriculum The current object (for fluent API support)
	 */
	public function setCurRut($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cur_rut !== $v) {
			$this->cur_rut = $v;
			$this->modifiedColumns[] = CurriculumPeer::CUR_RUT;
		}

		return $this;
	} // setCurRut()

	/**
	 * Set the value of [cur_telefono] column.
	 * 
	 * @param      string $v new value
	 * @return     Curriculum The current object (for fluent API support)
	 */
	public function setCurTelefono($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cur_telefono !== $v) {
			$this->cur_telefono = $v;
			$this->modifiedColumns[] = CurriculumPeer::CUR_TELEFONO;
		}

		return $this;
	} // setCurTelefono()

	/**
	 * Set the value of [cur_destacado] column.
	 * 
	 * @param      int $v new value
	 * @return     Curriculum The current object (for fluent API support)
	 */
	public function setCurDestacado($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cur_destacado !== $v || $this->isNew()) {
			$this->cur_destacado = $v;
			$this->modifiedColumns[] = CurriculumPeer::CUR_DESTACADO;
		}

		return $this;
	} // setCurDestacado()

	/**
	 * Set the value of [cur_email] column.
	 * 
	 * @param      string $v new value
	 * @return     Curriculum The current object (for fluent API support)
	 */
	public function setCurEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cur_email !== $v) {
			$this->cur_email = $v;
			$this->modifiedColumns[] = CurriculumPeer::CUR_EMAIL;
		}

		return $this;
	} // setCurEmail()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Curriculum The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->created_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->created_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CurriculumPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->cur_destacado !== 0) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->cur_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->cur_carta_presentacion = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->cur_nombre_archivo = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->cur_ruta = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->cur_nombre = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->cur_rut = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->cur_telefono = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->cur_destacado = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->cur_email = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->created_at = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 10; // 10 = CurriculumPeer::NUM_COLUMNS - CurriculumPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Curriculum object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CurriculumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CurriculumPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CurriculumPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseCurriculum:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			
			    return;
			  }
			}

			if ($ret) {
				CurriculumPeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseCurriculum:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$this->setDeleted(true);
				$con->commit();
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CurriculumPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseCurriculum:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			    $con->commit();
			
			    return $affectedRows;
			  }
			}

			// symfony_timestampable behavior
			
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// symfony_timestampable behavior
				if (!$this->isColumnModified(CurriculumPeer::CREATED_AT))
				{
				  $this->setCreatedAt(time());
				}

			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseCurriculum:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				CurriculumPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = CurriculumPeer::CUR_ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CurriculumPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setCurId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += CurriculumPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = CurriculumPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CurriculumPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCurId();
				break;
			case 1:
				return $this->getCurCartaPresentacion();
				break;
			case 2:
				return $this->getCurNombreArchivo();
				break;
			case 3:
				return $this->getCurRuta();
				break;
			case 4:
				return $this->getCurNombre();
				break;
			case 5:
				return $this->getCurRut();
				break;
			case 6:
				return $this->getCurTelefono();
				break;
			case 7:
				return $this->getCurDestacado();
				break;
			case 8:
				return $this->getCurEmail();
				break;
			case 9:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = CurriculumPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCurId(),
			$keys[1] => $this->getCurCartaPresentacion(),
			$keys[2] => $this->getCurNombreArchivo(),
			$keys[3] => $this->getCurRuta(),
			$keys[4] => $this->getCurNombre(),
			$keys[5] => $this->getCurRut(),
			$keys[6] => $this->getCurTelefono(),
			$keys[7] => $this->getCurDestacado(),
			$keys[8] => $this->getCurEmail(),
			$keys[9] => $this->getCreatedAt(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CurriculumPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCurId($value);
				break;
			case 1:
				$this->setCurCartaPresentacion($value);
				break;
			case 2:
				$this->setCurNombreArchivo($value);
				break;
			case 3:
				$this->setCurRuta($value);
				break;
			case 4:
				$this->setCurNombre($value);
				break;
			case 5:
				$this->setCurRut($value);
				break;
			case 6:
				$this->setCurTelefono($value);
				break;
			case 7:
				$this->setCurDestacado($value);
				break;
			case 8:
				$this->setCurEmail($value);
				break;
			case 9:
				$this->setCreatedAt($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CurriculumPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCurId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCurCartaPresentacion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCurNombreArchivo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCurRuta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCurNombre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCurRut($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCurTelefono($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCurDestacado($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCurEmail($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CurriculumPeer::DATABASE_NAME);

		if ($this->isColumnModified(CurriculumPeer::CUR_ID)) $criteria->add(CurriculumPeer::CUR_ID, $this->cur_id);
		if ($this->isColumnModified(CurriculumPeer::CUR_CARTA_PRESENTACION)) $criteria->add(CurriculumPeer::CUR_CARTA_PRESENTACION, $this->cur_carta_presentacion);
		if ($this->isColumnModified(CurriculumPeer::CUR_NOMBRE_ARCHIVO)) $criteria->add(CurriculumPeer::CUR_NOMBRE_ARCHIVO, $this->cur_nombre_archivo);
		if ($this->isColumnModified(CurriculumPeer::CUR_RUTA)) $criteria->add(CurriculumPeer::CUR_RUTA, $this->cur_ruta);
		if ($this->isColumnModified(CurriculumPeer::CUR_NOMBRE)) $criteria->add(CurriculumPeer::CUR_NOMBRE, $this->cur_nombre);
		if ($this->isColumnModified(CurriculumPeer::CUR_RUT)) $criteria->add(CurriculumPeer::CUR_RUT, $this->cur_rut);
		if ($this->isColumnModified(CurriculumPeer::CUR_TELEFONO)) $criteria->add(CurriculumPeer::CUR_TELEFONO, $this->cur_telefono);
		if ($this->isColumnModified(CurriculumPeer::CUR_DESTACADO)) $criteria->add(CurriculumPeer::CUR_DESTACADO, $this->cur_destacado);
		if ($this->isColumnModified(CurriculumPeer::CUR_EMAIL)) $criteria->add(CurriculumPeer::CUR_EMAIL, $this->cur_email);
		if ($this->isColumnModified(CurriculumPeer::CREATED_AT)) $criteria->add(CurriculumPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CurriculumPeer::DATABASE_NAME);

		$criteria->add(CurriculumPeer::CUR_ID, $this->cur_id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getCurId();
	}

	/**
	 * Generic method to set the primary key (cur_id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setCurId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Curriculum (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCurCartaPresentacion($this->cur_carta_presentacion);

		$copyObj->setCurNombreArchivo($this->cur_nombre_archivo);

		$copyObj->setCurRuta($this->cur_ruta);

		$copyObj->setCurNombre($this->cur_nombre);

		$copyObj->setCurRut($this->cur_rut);

		$copyObj->setCurTelefono($this->cur_telefono);

		$copyObj->setCurDestacado($this->cur_destacado);

		$copyObj->setCurEmail($this->cur_email);

		$copyObj->setCreatedAt($this->created_at);


		$copyObj->setNew(true);

		$copyObj->setCurId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Curriculum Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     CurriculumPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CurriculumPeer();
		}
		return self::$peer;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseCurriculum:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseCurriculum::%s', $method));
	  }
	
	  array_unshift($arguments, $this);
	
	  return call_user_func_array($callable, $arguments);
	}

} // BaseCurriculum

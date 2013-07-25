<?php
namespace Chat;

require_once __DIR__.'/MessageJsonConverter.php';
require_once __DIR__.'/MessageArrayConverter.php';
require_once __DIR__.'/User.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property int $ID autogenerated by server (read-only)
 * @property \NGS\Timestamp $created a timestamp with time zone
 * @property string $content a string
 * @property int $fromID used by reference $from (read-only)
 * @property string $fromURI reference to an object of class "Chat\User" (read-only)
 * @property \Chat\User $from an object of class "Chat\User"
 * @property int $toID used by reference $to (read-only)
 * @property string $toURI reference to an object of class "Chat\User" (read-only)
 * @property \Chat\User $to an object of class "Chat\User", can be null
 *
 * @package Chat
 * @version 0.9.9 beta
 */
class Message extends \NGS\Patterns\AggregateRoot implements \IteratorAggregate
{
    protected $URI;
    protected $ID;
    protected $created;
    protected $content;
    protected $fromID;
    protected $fromURI;
    protected $from;
    protected $toID;
    protected $toURI;
    protected $to;

    /**
     * Constructs object using a key-property array or instance of class "Chat\Message"
     *
     * @param array|void $data key-property array or instance of class "Chat\Message" or pass void to provide all fields with defaults
     */
    public function __construct($data = array(), $construction_type = '')
    {
        if(is_array($data) && $construction_type !== 'build_internal') {
            foreach($data as $key => $val) {
                if(in_array($key, self::$_read_only_properties, true))
                    throw new \LogicException($key.' is a read only property and can\'t be set through the constructor.');
            }
        }
        if (is_array($data)) {
            $this->fromArray($data);
        } else {
            throw new \InvalidArgumentException('Constructor parameter must be an array! Type was: '.\NGS\Utils::getType($data));
        }
    }

    /**
     * Supply default values for uninitialized properties
     *
     * @param array $data key-property array which will be filled in-place
     */
    private static function provideDefaults(array &$data)
    {
        if(!array_key_exists('URI', $data))
            $data['URI'] = null; //a string representing a unique object identifier
        if(!array_key_exists('ID', $data))
            $data['ID'] = 0; // an integer number
        if(!array_key_exists('created', $data))
            $data['created'] = new \NGS\Timestamp(); // a timestamp with time zone
        if(!array_key_exists('content', $data))
            $data['content'] = ''; // a string
        if(!array_key_exists('fromID', $data))
            $data['fromID'] = 0; // an integer number
    }

    /**
     * Constructs object from a key-property array
     *
     * @param array $data key-property array
     */
    private function fromArray(array $data)
    {
        $this->provideDefaults($data);

        if(isset($data['URI']))
            $this->URI = \NGS\Converter\PrimitiveConverter::toString($data['URI']);
        unset($data['URI']);
        if (array_key_exists('ID', $data))
            $this->setID($data['ID']);
        unset($data['ID']);
        if (array_key_exists('created', $data))
            $this->setCreated($data['created']);
        unset($data['created']);
        if (array_key_exists('content', $data))
            $this->setContent($data['content']);
        unset($data['content']);
        if (array_key_exists('fromID', $data))
            $this->setFromID($data['fromID']);
        unset($data['fromID']);
        if (array_key_exists('from', $data))
            $this->setFrom($data['from']);
        unset($data['from']);
        if(array_key_exists('fromURI', $data))
            $this->fromURI = \NGS\Converter\PrimitiveConverter::toString($data['fromURI']);
        unset($data['fromURI']);
        if (array_key_exists('toID', $data))
            $this->setToID($data['toID']);
        unset($data['toID']);
        if (array_key_exists('to', $data))
            $this->setTo($data['to']);
        unset($data['to']);
        if(array_key_exists('toURI', $data))
            $this->toURI = $data['toURI'] === null ? null : \NGS\Converter\PrimitiveConverter::toString($data['toURI']);
        unset($data['toURI']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Chat\Message" constructor: '.implode(', ', array_keys($data)));
    }

// ============================================================================

    /**
     * Helper getter function, body for magic method $this->__get('URI')
     * URI is a string representation of the primary key.
     *
     * @return string unique resource identifier representing this object
     */
    public function getURI()
    {
        return $this->URI;
    }

    /**
     * @return an integer number
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return a timestamp with time zone
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return a string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return an integer number
     */
    public function getFromID()
    {
        return $this->fromID;
    }

    /**
     * @return a reference to an object of class "Chat\User"
     */
    public function getFromURI()
    {
        return $this->fromURI;
    }

    /**
     * @return an object of class "Chat\User"
     */
    public function getFrom()
    {
        if ($this->fromURI !== null && $this->from === null)
            $this->from = \NGS\Patterns\Repository::instance()->find('Chat\\User', $this->fromURI);
        return $this->from;
    }

    /**
     * @return an integer number, can be null
     */
    public function getToID()
    {
        return $this->toID;
    }

    /**
     * @return a reference to an object of class "Chat\User"
     */
    public function getToURI()
    {
        return $this->toURI;
    }

    /**
     * @return an object of class "Chat\User", can be null
     */
    public function getTo()
    {
        if ($this->toURI !== null && $this->to === null)
            $this->to = \NGS\Patterns\Repository::instance()->find('Chat\\User', $this->toURI);
        return $this->to;
    }

    /**
     * Property getter which throws Exceptions on invalid access
     *
     * @param string $name Property name
     *
     * @return mixed
     */
    public function __get($name)
    {
        if ($name === 'URI')
            return $this->getURI(); // a string representing a unique object identifier
        if ($name === 'ID')
            return $this->getID(); // an integer number
        if ($name === 'created')
            return $this->getCreated(); // a timestamp with time zone
        if ($name === 'content')
            return $this->getContent(); // a string
        if ($name === 'fromID')
            return $this->getFromID(); // an integer number
        if ($name === 'fromURI')
            return $this->getFromURI(); // a reference to an object of class "Chat\User"
        if ($name === 'from')
            return $this->getFrom(); // an object of class "Chat\User"
        if ($name === 'toID')
            return $this->getToID(); // an integer number, can be null
        if ($name === 'toURI')
            return $this->getToURI(); // a reference to an object of class "Chat\User"
        if ($name === 'to')
            return $this->getTo(); // an object of class "Chat\User", can be null

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Chat\Message" does not exist and could not be retrieved!');
    }

// ============================================================================

    /**
     * Property existence checker
     *
     * @param string $name Property name to check for existence
     *
     * @return bool will return true if and only if the propery exist and is not null
     */
    public function __isset($name)
    {
        if ($name === 'URI')
            return $this->URI !== null;
        if ($name === 'created')
            return true; // a timestamp with time zone (always set)
        if ($name === 'content')
            return true; // a string (always set)
        if ($name === 'from')
            return true; // an object of class "Chat\User" (always set)
        if ($name === 'to')
            return $this->getTo() !== null; // an object of class "Chat\User", can be null

        return false;
    }

    private static $_read_only_properties = array('URI', 'ID', 'fromID', 'fromURI', 'toID', 'toURI');

    /**
     * @param int $value an integer number
     *
     * @return int
     */
    private function setID($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "ID" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toInteger($value);
        $this->ID = $value;
        return $value;
    }

    /**
     * @param \NGS\Timestamp $value a timestamp with time zone
     *
     * @return \NGS\Timestamp
     */
    public function setCreated($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "created" cannot be set to null because it is non-nullable!');
        $value = new \NGS\Timestamp($value);
        $this->created = $value;
        return $value;
    }

    /**
     * @param string $value a string
     *
     * @return string
     */
    public function setContent($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "content" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->content = $value;
        return $value;
    }

    /**
     * @param int $value an integer number
     *
     * @return int
     */
    private function setFromID($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "fromID" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toInteger($value);
        $this->fromID = $value;
        return $value;
    }

    /**
     * @param \Chat\User $value an object of class "Chat\User"
     *
     * @return \Chat\User
     */
    public function setFrom($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "from" cannot be set to null because it is non-nullable!');
        $value = \Chat\UserArrayConverter::fromArray($value);
        if ($value->URI === null)
            throw new \InvalidArgumentException('Value of property "from" cannot have URI set to null because it\'s a reference! Reference values must have non-null URIs!');
        $this->from = $value;
        $this->fromURI = $value->URI;
        $this->fromID = $value->ID;
        return $value;
    }

    /**
     * @param int $value an integer number, can be null
     *
     * @return int
     */
    private function setToID($value)
    {
        $value = $value !== null ? \NGS\Converter\PrimitiveConverter::toInteger($value) : null;
        $this->toID = $value;
        return $value;
    }

    /**
     * @param \Chat\User $value an object of class "Chat\User", can be null
     *
     * @return \Chat\User
     */
    public function setTo($value)
    {
        $value = $value !== null ? \Chat\UserArrayConverter::fromArray($value) : null;
        if ($value !== null && $value->URI === null)
            throw new \InvalidArgumentException('Value of property "to" cannot have URI set to null because it\'s a reference! Reference values must have non-null URIs!');
        $this->to = $value;
        $this->toURI = $value === null ? null : $value->URI;
        if ($value === null && $this->toID !== null) {
            $this->toID = null;
        } elseif ($value !== null) {
            $this->toID = $value->ID;
        }
        return $value;
    }

    /**
     * Property setter which checks for invalid access to entity properties and enforces proper type checks
     *
     * @param string $name Property name
     * @param mixed $value Property value
     */
    public function __set($name, $value)
    {
        if(in_array($name, self::$_read_only_properties, true))
            throw new \LogicException('Property "'.$name.'" in "Chat\Message" cannot be set, because it is read-only!');
        if ($name === 'created')
            return $this->setCreated($value); // a timestamp with time zone
        if ($name === 'content')
            return $this->setContent($value); // a string
        if ($name === 'from')
            return $this->setFrom($value); // an object of class "Chat\User"
        if ($name === 'to')
            return $this->setTo($value); // an object of class "Chat\User", can be null
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Chat\Message" does not exist and could not be set!');
    }

    /**
     * Will unset a property if it exists, but throw an exception if it is not nullable
     *
     * @param string $name Property name to unset (set to null)
     */
    public function __unset($name)
    {
        if(in_array($name, self::$_read_only_properties, true))
            throw new \LogicException('Property "'.$name.'" cannot be unset, because it is read-only!');
        if ($name === 'created')
            throw new \LogicException('The property "created" cannot be unset because it is non-nullable!'); // a timestamp with time zone (cannot be unset)
        if ($name === 'content')
            throw new \LogicException('The property "content" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
        if ($name === 'from')
            throw new \LogicException('The property "from" cannot be unset because it is non-nullable!'); // an object of class "Chat\User" (cannot be unset)
        if ($name === 'to')
            $this->setTo(null);; // an object of class "Chat\User", can be null
    }

    /**
     * Create or update Chat\Message instance (server call)
     *
     * @return modified instance object
     */
    public function persist()
    {

        if ($this->fromURI === null && $this->fromID !== null) {
            throw new \LogicException('Cannot persist instance of "Chat\Message" because reference "from" was not assigned');
        }
        $newObject = parent::persist();
        $this->updateWithAnother($newObject);

        return $this;
    }

    private function updateWithAnother(\Chat\Message $result)
    {
        $this->URI = $result->URI;

        $this->created = $result->created;
        $this->content = $result->content;
        $this->fromID = $result->fromID;
        $this->from = $result->from;
        $this->fromURI = $result->fromURI;
        $this->toID = $result->toID;
        $this->to = $result->to;
        $this->toURI = $result->toURI;
        $this->ID = $result->ID;
    }

    public function toJson()
    {
        return \Chat\MessageJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Chat\MessageJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Chat\Message'.$this->toJson();
    }

    public function __clone()
    {
        return \Chat\MessageArrayConverter::fromArray(\Chat\MessageArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Chat\MessageArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Chat\MessageArrayConverter::toArray($this));
    }
}
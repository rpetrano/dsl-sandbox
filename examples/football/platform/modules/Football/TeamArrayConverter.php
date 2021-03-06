<?php
namespace Football;

require_once __DIR__.'/Team.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Football\Team into a simple array and backwards.
 *
 * @package Football
 * @version 0.9.9 beta
 */
abstract class TeamArrayConverter
{/**
     * @param array|\Football\Team An object or an array of objects of type "Football\Team"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Football\Team)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Football\Team" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['name'] = $item->name;
        return $ret;
    }

    private static function toArrayList(array $items, $allowNullValues=false)
    {
        $ret = array();

        foreach($items as $key => $val) {
            if ($allowNullValues && $val===null) {
                $ret[] = null;
            }
            else {
                if (!$val instanceof \Football\Team)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Football\Team"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Football\Team)
            return $item;
        if (is_array($item))
            return new \Football\Team($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Football\Team" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Football\Team)
                    $val = new \Football\Team($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Football\Team"!', 42, $e);
        }

        return $items;
    }
}
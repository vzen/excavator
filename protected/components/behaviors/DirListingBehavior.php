<?php
/**
 * DirListingBehavior class file.
 *
 * @author Victor Zen <socrates.kisser@gmail.com>
 * @link http://victorzen.wordpress.com
 * @copyright Copyright &copy; 2013 Victor Zen
 * @license http://creativecommons.org/licenses/by-sa/3.0/
 */

/**
 * DirListingBehavior lists contents of a directory via an array.
 *
 * @author Victor Zen <socrates.kisser@gmail.com>
 * @version
 * @package
 * @since 1.0
 */

class DirListingBehavior extends CBehavior
{

	/**
	 * Declares events and the corresponding event handler methods.
	 * The events are defined by the {@link owner} component, while the handler
	 * methods by the behavior class. The handlers will be attached to the corresponding
	 * events when the behavior is attached to the {@link owner} component; and they
	 * will be detached from the events when the behavior is detached from the component.
	 * @return array events (array keys) and the corresponding event handler methods (array values).
	 */
	public function events()
	{
		return array();
	}

    /**
     * Logs a message.
     *
     * @param string $message Message to be logged
     * @param string $level Level of the message (e.g. 'trace', 'warning',
     * 'error', 'info', see CLogger constants definitions)
     */
    public static function log($message, $level='error')
    {
        Yii::log($message, $level, __CLASS__);
    }

    /**
     * Dumps a variable or the object itself in terms of a string.
     *
     * @param mixed variable to be dumped
     */

    protected function dump($var='dump-the-object',$highlight=true)
    {
        if ($var === 'dump-the-object') {
            return CVarDumper::dumpAsString($this,$depth=15,$highlight);
        } else {
            return CVarDumper::dumpAsString($var,$depth=15,$highlight);
        }
    }


    /**
     * Lists files in a directory except implied '.' and '..'
     *
     * @param string Path of directory to list. Do not pass a URL.
     */

    public function ls($path)
    {
        $a = array();
        foreach (new DirectoryIterator($path) as $f) {
            if(!$f->isDot()) {
                $a[] = $f->getBasename();
            }
        }

        return $a;
    }
}

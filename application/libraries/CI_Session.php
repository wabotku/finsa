<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* Session class using native PHP session features and hardened against session fixation.
*
* @package     CodeIgniter
* @subpackage  Libraries
* @category    Sessions
* @author      Dariusz Debowczyk
* @link        http://www.codeigniter.com/user_guide/libraries/sessions.html
*/
class CI_Session {

 var $flash_key = 'flash'; // prefix for "flash" variables (eg. flash:new:message)

 function CI_Session()
 {
  $this->object =& get_instance();
  log_message('debug', "Native_session Class Initialized");
  $this->_sess_run();
 }

 /**
    * Regenerates session id
    */
 function regenerate_id()
 {
  // copy old session data, including its id
  $old_session_id = session_id();
  $old_session_data = $_SESSION;

  // regenerate session id and store it
  session_regenerate_id();
  $new_session_id = session_id();

  // switch to the old session and destroy its storage
  session_id($old_session_id);
  session_destroy();

  // switch back to the new session id and send the cookie
  session_id($new_session_id);
  session_start();

  // restore the old session data into the new session
  $_SESSION = $old_session_data;

  // update the session creation time
  $_SESSION['regenerated'] = time();

  // session_write_close() patch based on this thread
  // http://www.codeigniter.com/forums/viewthread/1624/
  // there is a question mark ?? as to side affects

  // end the current session and store session data.
  session_write_close();
 }

 /**
    * Destroys the session and erases session storage
    */
 function destroy()
 {
  unset($_SESSION);
  if ( isset( $_COOKIE[session_name()] ) )
  {
   setcookie(session_name(), '', time()-42000, '/');
  }
  session_destroy();
 }

 /**
    * Reads given session attribute value
    */    
 function userdata($item)
 {
  if($item == 'session_id'){ //added for backward-compatibility
   return session_id();
  }else{
   return ( ! isset($_SESSION[$item])) ? false : $_SESSION[$item];
  }
 }

 /**
    * Sets session attributes to the given values
    */
 function set_userdata($newdata = array(), $newval = '')
 {
  if (is_string($newdata))
  {
   $newdata = array($newdata => $newval);
  }

  if (count($newdata) > 0)
  {
   foreach ($newdata as $key => $val)
   {
    $_SESSION[$key] = $val;
   }
  }
 }

}
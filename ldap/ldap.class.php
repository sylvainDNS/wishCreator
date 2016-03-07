<?

class LDAP {
  var $basedn = "dc=univ-nantes,dc=fr";
  var $groupdn = "ou=groupes,dc=univ-nantes,dc=fr";
  var $groupfilter = "(memberUid=%u)";
  var $groupAttr = "cn";
  var $server = "ldapauth.ha.univ-nantes.prive";
  var $filter = "(&(uid=%u)(objectclass=posixaccount))";
  var $conn;
  var $bind;

  function LDAP() {
    $this->conn = ldap_connect($this->server);
    if(!$this->conn) return false;
    return true;
  }

  function __destruct(){
    ldap_close ($this->conn);
  }

  function authenticate($username,$password) {
     if(!$username || !$password) return false;
     $userinfo = $this->getuserinfo($username);
     $userdn = $userinfo[0]['dn'];
     if($userdn) {
       $this->bind = @ldap_bind($this->conn,$userdn,$password);
       if($this->bind) return true;
     }
     return false;
  }

  function getuserinfo($username) {
     $filter = str_replace("%u", $username, $this->filter);
     $bd=ldap_search($this->conn, $this->basedn, $filter);
     $info = ldap_get_entries($this->conn, $bd);
     if(!$info['count'] || $info['count']>1) return false;
     return $info;
  }


  function getusergroups($username) {
    $res = array();
    $filter =  str_replace("%u", $username, $this->groupfilter);
    $bd=ldap_search($this->conn, $this->groupdn, $filter,array("cn"));
    $info = ldap_get_entries($this->conn, $bd);
    if(!$info['count']) return false;
    foreach($info as $group) {
      if(isset($group['cn'][0])) array_push($res,$group['cn'][0]);
    }
    return $res;
  }


}

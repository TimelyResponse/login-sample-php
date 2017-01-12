<?php 
class profileData extends DbConn
{
    public static function pullUserFields($uid, $fieldarr) {

        $fields = implode (", ", $fieldarr);

        try {
            //Pull specific user data
            $db = new DbConn;
            $tbl_memberinfo = $db->tbl_memberinfo;

            // prepare sql and bind parameters
            $stmt = $db->conn->prepare("SELECT $fields from $tbl_memberinfo WHERE userid = :userid");
            $stmt->bindParam(':userid', $uid);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {

                $result = "Error: " . $e->getMessage();
        }
    }

    public static function pullAllUserInfo($uid) {

        //Pull user info into edit form
        $db = new DbConn;
        $tbl_memberinfo = $db->tbl_memberinfo;

        // prepare sql and bind parameters
        $stmt = $db->conn->prepare("SELECT firstname, lastname, phone, address1, address2, city, state, country, bio, userimage from $tbl_memberinfo WHERE userid = :userid");
        $stmt->bindParam(':userid', $uid);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;

    }

    public static function upsertUserInfo($uid, $dataarray) {

        $datafields = implode(', ', array_keys($dataarray));

        $insdata = implode('\', \'', $dataarray);
        
        foreach($dataarray as $key => $value){
            if (isset($updata)){
                $updata = $updata.$key.' = \''.$value.'\', ';
            } else {
                $updata = $key.' = \''.$value.'\', ';
            }
        }

        $updata = rtrim($updata, ", ");
        
        //Upsert user data
        $db = new DbConn;
        $tbl_memberinfo = $db->tbl_memberinfo;

        // prepare sql and bind parameters
        $stmt = $db->conn->prepare("INSERT INTO ".$tbl_memberinfo." (userid, $datafields) values ('$uid', '$insdata') ON DUPLICATE KEY UPDATE $updata");
        
        $status = $stmt->execute();

        return $status;
    }

}
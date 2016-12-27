<?php
/**
* Deletes user from `members` table.
*
* Trigger automatically inserts deleted user into `deletedMembers` table and saves them for 30 days until a database event removes them.
* Erasing from `deletedMembers` table will result in permanent deletion
**/
class Delete extends DbConn
{
    /**
    * Deletes user by `$userid`
    **/
    public static function deleteUser($userid)
    {
        try {

            $ddb = new DbConn;
            $tbl_members = $ddb->tbl_members;
            $derr = '';

            $ddb = new DbConn;
            $dstmt = $ddb->conn->prepare('delete from '.$tbl_members.' WHERE id = :uid');
            $dstmt->bindParam(':uid', $userid);
            $dstmt->execute();

        } catch (PDOException $d) {

            $derr = 'Error: ' . $d->getMessage();
        }

    $resp = ($derr == '') ? true : $derr;

        return $resp;
    }
}

<?php
require_once '../../login/autoload.php';

$role_db = new RoleHandler;

$user_id = $_POST['user_id'];

$user_roles = $role_db->listUserRoles($user_id);
$roles = $role_db->listAllRoles();

$combo_array = [];
$combo_array['all_roles'] = $combo_array['user_roles'] = $combo_array['diff_roles'] = [];

foreach ($roles as $rid => $role) {
    array_push($combo_array['all_roles'], array( 'id'=>$role['id'], 'name'=>$role['name'] ));
    array_push($combo_array['diff_roles'], array( 'id'=>$role['id'], 'name'=>$role['name'] ));
}

foreach ($user_roles as $urid => $user_role) {
    array_push($combo_array['user_roles'], array( 'id'=>$user_role['id'], 'name'=>$user_role['name']));
}

foreach ($combo_array['user_roles'] as $user_role) {
    if (($roleKey = array_search($user_role['name'], array_column($combo_array['all_roles'], 'name'))) !== false) {
        unset($combo_array['diff_roles'][$roleKey]);
    }
}

$combo_array['diff_roles'] = array_values($combo_array['diff_roles']);

echo json_encode($combo_array);

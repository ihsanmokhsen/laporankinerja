<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

// 1. Login
if($action == 'login'){
    $login = $crud->login();
    if($login)
        echo $login;
}

// 2. Logout
if($action == 'logout'){
    $logout = $crud->logout();
    if($logout)
        echo $logout;
}

// 3. Simpan Pengguna Baru
if($action == 'save_user'){
    $save = $crud->save_user();
    if($save)
        echo $save;
}

// 4. Perbarui Pengguna
if($action == 'update_user'){
    $save = $crud->update_user();
    if($save)
        echo $save;
}

// 5. Unggah File
if($action == 'upload_file'){
    $save = $crud->upload_file();
    if($save)
        echo $save;
}

// 6. Hapus File
if($action == 'remove_file'){
    $delete = $crud->remove_file();
    if($delete)
        echo $delete;
}

// 7. Simpan Unggahan Baru
if($action == 'save_upload'){
    $save = $crud->save_upload();
    if($save)
        echo $save;
}

// 8. Hapus Dokumen
if($action == 'delete_file'){
    $delete = $crud->delete_file();
    if($delete)
        echo $delete;
}

// 9. Hapus Pengguna
if($action == 'delete_user'){
    $save = $crud->delete_user();
    if($save)
        echo $save;
}

ob_end_flush();
?>

<?php

require_once 'models/media.php';
require_once 'config/view.php';

class ControllerMedia {

    public function sendRefreshPictures() {
        $flag = $_POST['flag'];
        $picture = $_POST['file'];
        $hologramClass = new Media();

        $hologramClass->setFlag($flag, $picture);
    }

    public function receiveRefreshPictures() {
        $hologramClass = new Media();
        $flag = $hologramClass->getFlag()->fetch();
        echo json_encode($flag);
    }

    public function uploadPicture() {
        $upload_directory = "pictures/";

        if (is_uploaded_file($_FILES['file']['tmp_name'])) {

            $upload_file = $upload_directory.basename($_FILES['file']['name']);
            echo "File ".$_FILES['file']['name']." uploaded successfully";

            if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                echo "File is valid and was moved successfully";
            } else {
                echo "Upload failed";
            }

        } else {
            echo "Upload failed";
        }
    }

    public function deletePicture() {
        $picture = $_POST['file'];
        unlink("pictures/".$picture);
        
    }

}


?>

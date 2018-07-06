<?php

require_once 'controllers/controller_user.php';
require_once 'controllers/controller_message.php';
require_once 'controllers/controller_hologram.php';
require_once 'controllers/controller_media.php';

class Router {

    private $controller_user;
    private $conctroller_message;
    private $controller_hologram;
    private $controller_media;

    public function __construct(){
        $this->controller_user = new ControllerUser();
        $this->controller_message = new ControllerMessage();
        $this->controller_hologram = new ControllerHologram();
        $this->controller_media = new ControllerMedia();
    }

    public function route_request(){
        $router = new Router();

        switch($_GET['page']){
            case 'login':
            $this->controller_user->loginUser();
            break;

            case 'logout':
            $this->controller_user->logoutUser();
            break;

            case 'receivemessages':
            $this->controller_message->getMessages();
            break;

            case 'sendmessage':
            $this->controller_message->sendMessage();
            break;

            case 'receiveholograms':
            $this->controller_hologram->getHolograms();
            break;

            case 'deletemessages':
            $this->controller_message->deleteMessages();
            break;

            case 'deleteholograms':
            $this->controller_hologram->deleteHolograms();

            case 'updateholograms':
            $this->controller_hologram->updateHolograms();
            break;

            case 'sendrefresh':
            $this->controller_hologram->sendRefreshHolograms();
            break;

            case 'receiverefresh':
            $this->controller_hologram->receiveRefreshHolograms();
            break;

            case 'sendrefreshpictures':
            $this->controller_media->sendRefreshPictures();
            break;

            case 'receiverefreshpictures':
            $this->controller_media->receiveRefreshPictures();
            break;

            case 'uploadpicture':
            $this->controller_media->uploadPicture();
            break;

            case 'deletepicture':
            $this->controller_media->deletePicture();
            break;

        }

    }

}

?>

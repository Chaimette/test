<?php
namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\UserModel ;


class ProfileController extends AbstractController {
    protected $userModel;
    protected $twig;

    public function __construct($userModel, $twig) {
        $this->userModel = $userModel;
        $this->twig = $twig;
    }

    public function showProfile($userId) {
        $user = $this->userModel->getUserById($userId);
        $messages = $this->userModel->getUserLastMessages($userId);

        echo $this->twig->render('profile.html.twig', [
            'user' => $user,
            'messages' => $messages
        ]);
    }
}

<?php
include("configs/DBConnection.php");
include("services/UserService.php");
class UserController {
    public function index() {
        if (isset($_GET['act'])) {
            if ($_GET['act'] == 'edit') {
                $userService = new UserService();
                $user = $userService->getUserById();
                include("views/user/edit_user.php");
            } else if ($_GET['act'] == 'add') {
                include("views/user/add_user.php");
            }
        } else {
            $userService = new UserService();
            $userList = $userService->getUsers();
            include("views/user/index.php");
        }
    }

    public function updateUser() {
        $userService = new UserService();
        if ($userService->updateUser()) {
            self::index();
        }
    }

    public function deleteUser() {
        $userService = new UserService();
        if ($userService->deleteUser()) {
            self::index();
        }
    }

    public function addUser() {
        $userService = new UserService();
        if ($userService->addUser()) {
            self::index();
        }
    }

}

<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\Database;

class Page extends BaseController
{

  public function contact()
  {
    $userModel = new UserModel();
    $db = Database::connect();

    echo view('contact_us');


    if (isset($_POST['submit'])) {

      $data = $this->request->getPost();

      $data = [
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'query' => $data['query']
      ];

      $result = $userModel->insert($data);

      if ($result == 0) {
        echo "<script> alert('Record Inserted')</script>";
      } else {
        echo "<script>alert('Failed')</script>";
      }
    }
  }
}

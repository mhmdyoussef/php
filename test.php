<?php
class Users {
    //properties
    private $firstName;
    private $lastName;
    private $userName;
    private $address;
    private $phone;
    private $email;

    //Methods
    public function __construct($firstName, $lastName, $userName, $address, $phone, $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userName = $userName;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
    }
    public function getUser()
    {
        $user = array(
            "First Name"  => $this->firstName,
            "Last Name"   => $this->lastName,
            "User Name"   => $this->userName,
            "Address"     => $this->address,
            "Phone"       => $this->phone,
            "E-mail"      => $this->email,
        );

        /*** if JSON is needed ;)
                echo json_encode($user);
        ***/

        foreach ($user as $item=>$value)
        {
            echo $item .": " . $value . " <br>";
        }
    }
}
// new User
$user1 = new Users("Mohamed", "Youssef", "valantino29", "Giza", "01124953916", "valantino29@yahoo.com");
$user1->getUser();

<?php session_start(); ?>
<?php
  $user1 = [
    "name"=>"Bleona",
    "surname"=>"Gerbavci",
    "email"=>"bg@ubt-uni.net",
    "username"=>"bleonagerbavci",
    "password" => "Bleona123",
    "role"=>"admin"
  ];
  
  $user2 = [
    "name"=>"Fat",
    "surname"=>"Sijarina",
    "email"=>"fs@gmail.com",
    "username"=>"fatsijarina",
    "password" => "fati321",
    "role"=>"user"
  ];

  $user3 = [
    "name"=>"Alma",
    "surname"=>"Novoberdaliu",
    "email"=>"an@ubt-uni.net",
    "username"=>"almanovoberdaliu",
    "password" => "alma123",
    "role"=>"user"
  ];

  $users = [$user1, $user2, $user3];
?>
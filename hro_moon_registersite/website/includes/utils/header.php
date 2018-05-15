<?php
$auth = new \moonconsultancy\Authentication\Authentication();
echo $auth->checkAuth();
if($auth->Authenticated === false) {
    echo "Please don't try that. That would suck, if you did that. Really. A lot.";
    exit;
}
?>

<ul class="navBar">
    <a href="http://moonconsultancy.nl"><li>Moon Consultancy</li></a>
    <a href="?page=4"><li>Home</li></a>
    <a href="?page=7"><li>Hulpvormen</li></a>
    <a href="?page=5"><li>Log uit</li></a>
</ul>
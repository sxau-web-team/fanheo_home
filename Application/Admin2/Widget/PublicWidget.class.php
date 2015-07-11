<?php
namespace Admin2\Widget;
use Think\Controller;
class PublicWidget extends Controller {
    public function index($name){
        $this->theme(mc_option('theme'))->display("Public:$name");
    }
}
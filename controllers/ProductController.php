<?php


namespace controllers;

use models\Product;
use vendor\myframe\Connection;
use vendor\myframe\Controller;
use vendor\myframe\Views;


class ProductController extends Controller
{
    public function list()
    {
        $product = new Product();
        $result = $product->getList();

        echo "<pre>";
        print_r($result);die();
        $pageCount = $product->getPageCount();
        $this->render("product/list",[
            "productList"=>$result
        ]);
    }
    public function add()
    {
        $this->render("product/add");
    }

}
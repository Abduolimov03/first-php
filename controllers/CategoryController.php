<?php


namespace controllers;


use models\Category;
use vendor\myframe\Model;
use vendor\myframe\Views;
use vendor\myframe\Controller;
use vendor\myframe\Connection;




class CategoryController extends Controller
{
    public function list()
    {
        $category = new Category();
        $result = $category->getList();
        $pageCount = $category->getPageCount();
        $this->render("category/list", [
            'list' => $result,
            'pageCount' => $pageCount,
        ]);
    }
    public function add()
    {
        if (isset($_POST["cat_add"])){
            $category = new Category();
            $category->save($_POST['name']);

        }
        $this->render("category/add");
    }
    public function update($id)
    {
        $category = new Category();
        if (isset($_POST["cat_update"])){
            $category->update($id, $_POST['name']);
            header("Location: /index.php/category/list");exit();
        }
        $result = $category->getRowById($id);
        $this->render("category/update", ["category"=>$result]);
    }

}
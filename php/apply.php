<?php
require_once('database.php');
require_once('queryBuilder.php');

if (isset($_POST['new_value'])){
    $postDataArray = explode("=", $_POST['post_data']);
    $id = $postDataArray[0];
    $column = $postDataArray[1];
    $data = $postDataArray[2];
    $newValue = $_POST['new_value'];

    $updateQuery = new QueryBuilder('update', 'flights', $column, "$newValue", "id='$id'");
    $db->query($updateQuery->getRequest());
    header('Location: index.php');
}

if(isset($_POST['insert'])){
    $id = $_POST['id'];
    $terminal = $_POST['terminal'];
    $gate = $_POST['gate'];
    $aircraft = $_POST['aircraft'];

    $insertQuery = new QueryBuilder('insert', 'flights', '(id, terminal, gate, aircraft)', "('$id', '$terminal', '$gate', '$aircraft')");
    $db->query($insertQuery->getRequest());
    header('Location: index.php');
}

if(isset($_POST['yes-delete'])){
    $postDataArray = explode("=", $_POST['post_data']);
    $column = $postDataArray[0];
    $data = $postDataArray[1];

    $deleteQuery = new QueryBuilder('delete', 'flights', NULL, NULL, "$column='$data'");
    $db->query($deleteQuery->getRequest());
    header('Location: index.php');

}elseif(isset($_POST['no-delete'])){
    header("Location: index.php");
}
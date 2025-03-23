<?php
require "../../classes/dbh.classes.php";

class Shop extends Dbh
{

    public function getItems()
    {
        $query = "SELECT id, name, description, path FROM item;";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../shop.php?error=cannot_get_items");
            exit();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkItem($userId, $itemId)
    {
        $query = 'SELECT * FROM owneditems WHERE student_id = ? AND item_id = ?;';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$userId, $itemId]);

        return $stmt->rowCount() > 0;
    }

    public function addItem($userId, $itemId)
    {
        if ($this->checkItem($userId, $itemId)) {
            $query = "UPDATE owneditems SET item_count = item_count + 1 WHERE student_id = ? AND item_id = ?;";
            $stmt = $this->connect()->prepare($query);
        } else {
           
            $query = "INSERT INTO owneditems (student_id, item_id, item_count) VALUES (?, ?, 1);";
            $stmt = $this->connect()->prepare($query);
        }

        if (!$stmt->execute([$userId, $itemId])) {
            header("location: ../shop.php?error=failedToUpdateItem");
            exit();
        }
    }
}

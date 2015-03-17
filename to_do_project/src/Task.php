<?php
    class Task

    {
      private $description;
      private $id;
      private $category_id;

//giving the id a default value of null
      function __construct($description, $id = null, $category_id)
      {
        $this->description = $description;
        $this->id = $id;
        $this->category_id = $category_id;
      }

      function setCategory($new_category_id)
      {
          $this->category_id = (int) $new_category_id;
      }

      function getCategory()
      {
          return $this->category_id;
      }

      function getId()
       {
           return $this->id;
       }

       function setId($new_id)
       {
           $this->id = (int) $new_id;
       }

      function setDescription($new_description)
      {
        $this->description = (string) $new_description;
      }

      function getDescription()
      {
        return $this->description;
      }

      function setCategoryId($new_category_id)
      {
          $this->category_id = (int) $new_category_id;
      }

      function getCategoryId()
      {
          return $this->category_id;
      }
//create new item into the database and return its id key
      function save()
      {
          $statement = $GLOBALS['DB']->query("INSERT INTO tasks (description, category_id) VALUES ('{$this->getDescription()}', {$this->getCategoryId()}) RETURNING id;");
          $result = $statement->fetch(PDO::FETCH_ASSOC);
          $this->setId($result['id']);
      }

//get all the data from the database (description and id).
      static function getAll()
      {

          $returned_tasks = $GLOBALS['DB']->query("SELECT * FROM tasks;");
      $tasks = array();
      foreach($returned_tasks as $task) {
          $description = $task['description'];
          $id = $task['id'];
          $category_id = $task['category_id'];
          $new_task = new Task($description, $id, $category_id);
          array_push($tasks, $new_task);
        }
        return $tasks;
        }

//delete all the data in the tasks table
      static function deleteAll()
      {
          $GLOBALS['DB']->exec("DELETE FROM tasks *;");
      }

//search by matching id
      static function find($search_id)
         {
             $found_task = null;
             $tasks = Task::getAll();
             foreach($tasks as $task) {
                 $task_id = $task->getId();
                 if ($task_id == $search_id) {
                     $found_task = $task;
                 }
             }
             return $found_task;
         }
    }
?>

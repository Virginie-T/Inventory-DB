<?php
    class Task

    {
      private $description;
      private $id;

//setting the id to null
      function __construct($description, $id = null)
      {
        $this->description = $description;
        $this->id = $id;
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

//create new item into the database and return its id key
      function save()
      {
          $statement = $GLOBALS['DB']->query("INSERT INTO tasks (description) VALUES ('{$this->getDescription()}') RETURNING id;");
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
          $new_task = new Task($description, $id);
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

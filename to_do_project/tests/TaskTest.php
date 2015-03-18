<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Task.php";
    require_once "src/Category.php";

//create our database, link with pgsql
    $DB = new PDO('pgsql:host=localhost;dbname=to_do_test');


    class TaskTest extends PHPUnit_Framework_TestCase
    {

        //deletes the values so that our database doesnt have duplicates.
            protected function tearDown()
           {
               Task::deleteAll();
               Category::deleteAll();
           }

        function test_save()
        {
            //Arrange
            $name = "Home stuff";
            $id = null;
            $test_category = new Category($name, $id);
            $test_category->save();

            $description = "mow lawn";
            $category_id = $test_category->getId();
            $test_task = new Task($description, $id, $category_id);

            //Act
            $test_task->save();

            //Assert
            $result = Task::getAll();
            $this->assertEquals($test_task, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = "Home stuff";
            $id= null;
            $test_category = new Category($name, $id);
            $test_category->save();

            $description = "Wash the dog";
            $category_id = $test_category->getId();
            $test_task = new Task($description, $id, $category_id);
            $test_task->save();

            $description2 = "Water the lawn";
            $test_task2 = new Task($description2, $id, $category_id);
            $test_task2->save();

            //Act
            $result = Task::getAll();

            //Assert
            $this->assertEquals([$test_task, $test_task2], $result);
        }


            function test_deleteAll()
            {
                //Arrange
                $name = "Home stuff";
                $id = null;
                $test_category = new Category($name, $id);
                $test_category->save();

                $description = "Wash the dog";
                $category_id = $test_category->getId();
                $test_task = new Task($description, $id, $category_id);
                $test_task->save();

                $description2 = "Water the lawn";
                $category_id = $test_category->getId();
                $test_task2 = new Task($description2, $id, $category_id);
                $test_task2->save();

                //Act
                Task::deleteAll();

                //Assert
                $result = Task::getAll();
                $this->assertEquals([], $result);
            }

//returns the primary serial key (testing if it return it)
            function test_getId()
            {
                //Arrange
                $name = "Home stuff";
                $id = null;
                $test_category = new Category($name, $id);
                $test_category->save();

                $description = "Wash the dog";
                $category_id = $test_category->getId();
                $test_task = new Task($description, $id, $category_id);
                $test_task->save();

                //Act
                $result = $test_task->getId();

                //Assert
                $this->assertEquals(true, is_numeric($result));
            }


            function test_getCategoryId()
            {

                //arrange
                $name = "Home stuff";
                $id = null;
                $test_category = new Category($name, $id);
                $test_category->save();

                $description = "Wash the dog";
                $category_id = $test_category->getId();
                $test_task = new Task($description, $id, $category_id);
                $test_task->save();

                //act
                $result = $test_task->getCategoryId();

                //assert
                $this->assertEquals(true, is_numeric($result));
            }

//testing if it set the id
            function test_setId()
            {
                //Arrange
                $name = "Home stuff";
                $id = null;
                $test_category = new Category($name, $id);
                $test_category->save();


                $description = "Wash the dog";
                $category_id = $test_category->getId();
                $test_task = new Task($description, $id, $category_id);
                $test_task->save();

                //Act
                $test_task->setId(2);

                //Assert
                $result = $test_task->getId();
                $this->assertEquals(2, $result);
            }

//testing ig we can find the description with the id
            function test_find()
                    {
                  //Arrange
                  $name = "Home stuff";
                  $id = null;
                  $test_category = new Category($name, $id);
                  $test_category->save();

                  $description = "Wash the dog";
                  $category_id = $test_category->getId();
                  $test_task = new Task($description, $id, $category_id);
                  $test_task->save();

                  $description2 = "Water the lawn";
                  $test_task2 = new Task($description2, $id, $category_id);
                  $test_task2->save();

                  //Act
                  $result = Task::find($test_task->getId());

                  //Assert
                  $this->assertEquals($test_task, $result);
                    }




    }
?>
